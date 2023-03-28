<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Project\StoreProjectRequest;
use App\Http\Requests\Dashboard\Project\ToggleOptionRequest;
use App\Http\Requests\Dashboard\Project\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                <a href="' . route('projects.edit', $row->id) . '" class="btn btn-icon btn-primary"><i class="fas fa-edit fs-4"></i></a>
                                        <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                            class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                ';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' .  $row->image_url  . '" class="w-100">';
                })
                ->addColumn('active', function ($row) {
                    $input = '<input onclick="toggleOptions(' . $row->id . ', \'is_active\', this)" class="form-check-input" type="checkbox"';
                    if ($row->is_active) {
                        $input .= ' checked>';
                    } else {
                        $input .= ' >';
                    }
                    return $input;
                })
                ->rawColumns(['action', 'image', 'active'])
                ->make(true);
        }
        return response()->view('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] == 'true';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/projects', $imageName, ['disk' => 'public']);
            $data['image'] = $image;
        }
        $project = new Project($data);
        $isSaved = $project->save();
        return response()->json([
            'message' => $isSaved ? 'Project Created Successfully!' : 'Failed to create project, Please try again.',
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return response()->view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['is_active'] = $data['is_active'] == 'true';
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('' . $project->image);
            $file = $request->file('image');
            $imageName = time() . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/projects', $imageName, ['disk' => 'public']);
            $data['image'] = $image;
        }
        $updated = $project->update($data);
        return response()->json([
            'message' => $updated ? 'Project Updated Successfully!' : 'Failed to update project, Please try again.',
        ], $updated ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $deleted = $project->delete();
        if($deleted) Storage::disk('public')->delete('' . $project->image);
        return response()->json([
            'message' => $deleted ? 'Project Deleted Successfully!' : 'Failed to delete project, Please try again.',
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    public function toggleOption(Project $project, ToggleOptionRequest $request)
    {
        $project[$request->input('type')] = $request->input('value');
        $isSaved = $project->save();
        return response()->json([
            'message' => $isSaved ? 'Option Updated Successfully!' : 'Failed to update option, please try again.',
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
