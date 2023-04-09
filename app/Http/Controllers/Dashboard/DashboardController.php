<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Maintenance;
use App\Models\Product;
use App\Models\Project;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $products = Product::all();
        $features = Feature::all();
        $categories = Category::all();
        $visitsCount = Visit::count();


        // begin::Last Seven Days Visits Statistics
        $startDate = Carbon::now()->subDays(7);
        $lastSevenDaysVisits = Visit::whereBetween('created_at', [$startDate, Carbon::now()])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        $lastSevenDaysVisitsCount = Visit::whereBetween('created_at', [$startDate, Carbon::now()])
            ->count();
        $maxLastSevenDaysVisitsValue = 0;
        $minLastSevenDaysVisitsValue = 0;
        foreach ($lastSevenDaysVisits as $visit) {
            if ($maxLastSevenDaysVisitsValue < $visit->count) {
                $maxLastSevenDaysVisitsValue = $visit->count;
            }
            if ($minLastSevenDaysVisitsValue > $visit->count) {
                $minLastSevenDaysVisitsValue = $visit->count;
            }
        }
        // end::Last Seven Days Visits Statistics

        $mostVisitedCountries = Visit::selectRaw('countryName, COUNT(*) as count')
            ->groupBy('countryName')
            ->orderBy('count', 'DESC')
            ->limit(15)
            ->get();


        // dd($mostVisitedCountries);

        // dd(Carbon::parse($visitsThisWeek[1]->date)->format('l'));

        return response()->view('dashboard.index', compact(
            'projects',
            'products',
            'features',
            'categories',
            'visitsCount',
            'lastSevenDaysVisits',
            'lastSevenDaysVisitsCount',
            'maxLastSevenDaysVisitsValue',
            'minLastSevenDaysVisitsValue',
            'mostVisitedCountries',
        ));
    }

    public function contacts(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*')->where('status', 'pending')->with('admin');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 'pending') {
                        return '
                        <a href="' . route('contacts.show', $row->id) . '" class="btn btn-icon btn-warning" ><i class="fas fa-eye fs-4"></i></a>
                                                <button type="button" onclick="delContact(\'' . $row->id . '\',this)"
                                                    class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                        ';
                    }
                    return '
                    <a href="' . route('contacts.show', $row->id) . '" class="btn btn-icon btn-success" ><i class="fas fa-eye fs-4"></i></a>
                                            <button type="button" onclick="delContact(\'' . $row->id . '\',this)"
                                                class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                    ';
                })
                ->addColumn('message_raw', function ($row) {
                    return Str::limit($row->message, 10, '...');
                })
                ->addColumn('status_raw', function ($row) {
                    if ($row->reply) {
                        return '<span class="badge badge-light-success">' . __('contacts.answered') . '</span> (' . $row->admin->name . ')';
                    }
                    return '<span class="badge badge-light-warning">' . __('contacts.pending') . '</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action', 'status_raw'])
                ->make(true);
        }
        return abort(Response::HTTP_NOT_FOUND);
    }

    public function maintenances(Request $request)
    {
        if ($request->ajax()) {
            $data = Maintenance::select('*')->where('status', 'pending');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if ($row->status == 'pending') {
                        return '
                        <button type="button" onclick="getDescription(' . $row->id . ', this)" class="btn btn-icon btn-warning" ><i class="fas fa-eye fs-4"></i></button>
                                                <button type="button" onclick="delMaintenance(\'' . $row->id . '\',this)"
                                                    class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                        ';
                    }
                    return '
                    <button type="button" onclick="getDescription(' . $row->id . ', this)" class="btn btn-icon btn-success" ><i class="fas fa-eye fs-4"></i></button>
                                            <button type="button" onclick="delMaintenance(\'' . $row->id . '\',this)"
                                                class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                    ';
                })
                ->addColumn('message_raw', function ($row) {
                    return Str::limit($row->description, 10, '...');
                })
                ->addColumn('status_raw', function ($row) {
                    if ($row->status == 'completed') {
                        return '<span class="badge badge-light-success">' . __('maintenances.completed') . '</span>';
                    }
                    return '<span class="badge badge-light-warning">' . __('maintenances.pending') . '</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action', 'status_raw'])
                ->make(true);
        }
        return abort(Response::HTTP_NOT_FOUND);
    }

    public function changeLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) return abort(Response::HTTP_NOT_FOUND);

        Session::put('locale', $locale);
        return redirect()->back();
    }
}
