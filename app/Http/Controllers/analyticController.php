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
}
