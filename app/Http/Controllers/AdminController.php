<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('admins.dashboard', compact('records', 'totalCount'));
    }

    public function inmates()
    {
        return view('admins.inmate');
    }

    public function user_mod()
    {
        return view('admins.users.moderator');
    }

    public function user_reg()
    {
        return view('admins.users.registered');
    }

    public function user_pend()
    {
        return view('admins.users.pending');
    }

    public function user_black()
    {
        return view('admins.users.blacklist');
    }
}
