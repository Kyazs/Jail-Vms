<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    /**
     * Display a listing of the verified users.
     */
    public function user_reg()
    {
        $records = DB::table('visitors')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->select(
                'visitors.id as visitor_id',
                'visitors.first_name',
                'visitors.last_name',
                'visitors.email',
                'visitors.contact_number',
                'visitors.date_of_birth',
                'visitor_credentials.username',
                'visitors.created_at',
                'genders.gender_name',
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address")
            )
            ->where('visitors.is_verified', '=', '1')
            ->paginate(10);
        return view('admins.users.registered', ['records' => $records]);
    }

    public function user_pend()
    {
        $records = DB::table('visitors')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->select(
                'visitors.id as visitor_id',
                'visitors.first_name',
                'visitors.last_name',
                'visitors.email',
                'visitors.contact_number',
                'visitors.date_of_birth',
                'visitor_credentials.username',
                'visitors.created_at',
                'genders.gender_name',
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address")
            )
            ->where('visitors.is_verified', '=', '2')
            ->paginate(10);
        return view('admins.users.registered', ['records' => $records]);
        return view('admins.users.pending');
    }

    public function user_black()
    {
        return view('admins.users.blacklist');
    }
}
