<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreAdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Mail\AdminCreatedEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::orderBy('id', 'DESC')->when($request->search, function ($q) use ($request) {
            return $q->where('name', 'LIKE', "%$request->search%")->orWhere('email', 'LIKE', "%$request->search%");
        })->paginate(10);
        return response()->view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=';
        $password = substr(str_shuffle($chars), 0, 16);
        $admin->password = Hash::make($password);
        $isSaved = $admin->save();
        if ($isSaved) Mail::to($admin->email)->send(new AdminCreatedEmail($admin->name, $password));
        return response()->json([
            'message' => $isSaved ? 'Admin Created Successfully!' : 'Failed to create admin, Please try again.',
        ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        if (auth()->user()->id == $admin->id) return redirect()->route('account.profile');
        return response()->view('dashboard.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        if (auth()->user()->id == $admin->id) return redirect()->route('account.settings');
        return response()->view('dashboard.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        if ($request->hasFile('image')) {
            if ($admin->image != null) {
                Storage::disk('public')->delete('' . $admin->image);
            }
            $file = $request->file('image');
            $imageName = time() . '_' . $admin->id . '_' . rand(1, 1000000) . '.' . $file->getClientOriginalExtension();
            $image = $file->storePubliclyAs('files/admins', $imageName, ['disk' => 'public']);
            $admin->image = $image;
        }
        $isSaved = $admin->save();
        return response()->json([
            'message' => $isSaved ? 'Admin Updated Successfully!' : 'Failed to update admin, Please try again.',
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id == auth()->user()->id) return abort(Response::HTTP_FORBIDDEN, 'CANT DELETE YOURSELF');
        $deleted = $admin->delete();
        if ($deleted && $admin->image != null) {
            Storage::disk('public')->delete('' . $admin->image);
        }
        return response()->json([
            'message' => $deleted ? 'Admin Deleted Successfully!' : 'Failed to delete admin, Please try again.',
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
