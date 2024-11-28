<?php

namespace App\Http\Controllers;

use App\Models\Blacklist;
use App\Models\Visit;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class analyticController extends Controller
{

    public function index()
    {
        $records = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
            ->select(
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                'visits.check_in_time',
                'visits.check_out_time',
                'visits.id as visit_id'
            )
            ->orderBy('visits.check_in_time', 'desc')
            ->orderBy('visits.check_out_time', 'desc')
            ->paginate(10);

        $totalCount = DB::table('visits')
            ->join('visit_status', 'visits.status_id', '=', 'visit_status.id')
            ->select('visit_status.status_name as status_name', DB::raw('COUNT(*) as count'))
            ->groupBy('visits.status_id', 'visit_status.status_name')
            ->get();

        $visitorStatusData = [
            'pending' => Visit::where('status_id', '4')->count(),
            'in_progress' => Visit::where('status_id', '1')->count(),
            'completed' => Visit::where('status_id', '2')->count(),
            'cancelled' => Visit::where('status_id', '3')->count(),
            'rejected' => Visit::where('status_id', '5')->count(),
            'blacklisted' => Blacklist::where('is_deleted', false)->count(),
        ];

        $todaysVisitors = Visit::whereDate('check_in_time', Carbon::today())->count();

        return view('admins.dashboard', compact('records', 'totalCount', 'visitorStatusData', 'todaysVisitors'));
    }

    public function daily()
    {
        // Fetch daily visitors
        $results = DB::table('visits')
            ->select(DB::raw('DAYNAME(check_in_time) as day'), DB::raw('COUNT(*) as visitor_count'))
            ->whereBetween('check_in_time', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('day')
            ->orderBy(DB::raw("FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')"))
            ->get();

        $labels = $results->pluck('day'); // Days (e.g., 'Monday', 'Tuesday', ...)
        $visitors = $results->pluck('visitor_count'); // Counts (e.g., 30, 50, ...)
        // Otherwise, return the view
        return view('admins.analytic.daily', compact('labels', 'visitors'));
    }

    public function weekly()
    {
        // Fetch weekly visitors
        $results = DB::table('visits')
            ->select(DB::raw('WEEK(check_in_time) as week'), DB::raw('COUNT(*) as visitor_count'))
            ->whereYear('check_in_time', now()->year)
            ->groupBy('week')
            ->orderBy('week')
            ->get();

        $labels = $results->map(function ($result) {
            $startOfWeek = Carbon::now()->setISODate(now()->year, $result->week)->startOfWeek()->format('M d');
            $endOfWeek = Carbon::now()->setISODate(now()->year, $result->week)->endOfWeek()->format('M d');
            return $startOfWeek . ' - ' . $endOfWeek;
        });

        $visitors = $results->pluck('visitor_count'); // Counts (e.g., 100, 150, ...)
        // Otherwise, return the view
        return view('admins.analytic.weekly', compact('labels', 'visitors'));
    }

    public function monthly()
    {
        // Fetch monthly visitors grouped by month and year
        $results = DB::table('visits')
            ->select(
                DB::raw('MONTHNAME(check_in_time) as month'), // Month name (e.g., January)
                DB::raw('YEAR(check_in_time) as year'), // Year (e.g., 2024)
                DB::raw('COUNT(*) as visitor_count') // Count of visitors
            )
            ->whereYear('check_in_time', now()->year) // Only for the current year
            ->groupBy('month', 'year')
            ->orderByRaw('MONTH(check_in_time)') // Ensure months are in chronological order
            ->get();

        // Extract labels and visitors
        $labels = $results->map(fn($result) => $result->month . " " . $result->year); // Combined "January 2024"
        $visitors = $results->pluck('visitor_count'); // Number of visitors per month

        // Return the view with labels and visitors
        return view('admins.analytic.monthly', compact('labels', 'visitors'));
    }
}
