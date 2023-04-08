<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Project;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $products = Product::all();
        $features = Feature::all();
        $categories = Category::all();
        $visitsCount = Visit::count();

        $startDate = Carbon::now()->subDays(7);
        // Get all records created between $startDate and now
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
        ));
    }

    public function changeLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) return abort(Response::HTTP_NOT_FOUND);

        Session::put('locale', $locale);
        return redirect()->back();
    }
}
