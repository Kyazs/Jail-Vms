<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function pending_visit()
    {
        $records = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
            ->join('visit_status', 'visits.status_id', '=', 'visit_status.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->where('visits.status_id', '=', 4)
            ->select(
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address"),
                'visits.check_in_time',
                'visits.check_out_time',
                'visits.id as visit_id',
                'visits.relationship',
                'visit_status.status_name as status_name',
                'visitors.contact_number',
                'visitors.id as visitor_id',
                'visitor_credentials.username as username'
            )
            ->paginate(10);
        return view('/admins/logs/pending', compact('records'));
    }
    public function ongoing_visit()
    {
        $records = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
            ->join('visit_status', 'visits.status_id', '=', 'visit_status.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->where('visits.status_id', '=', 1)
            ->select(
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address"),
                DB::raw("DATE(visits.check_in_time) as date"),
                DB::raw("TIME(visits.check_in_time) as check_in_time"),
                DB::raw("TIME(visits.check_out_time) as check_out_time"),
                'visits.id as visit_id',
                'visits.relationship',
                'visit_status.status_name as status_name',
                'visitors.contact_number',
                'visitors.id as visitor_id',
                'visitor_credentials.username as username'
            )
            ->paginate(10);
        return view('/admins/logs/ongoing', compact('records'));
    }
    public function completed_visit()
    {
        $records = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
            ->join('visit_status', 'visits.status_id', '=', 'visit_status.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->where('visits.status_id', '=', 2)
            ->orWhere('visits.status_id', '=', 3)
            ->select(
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address"),
                DB::raw("DATE(visits.check_in_time) as date"),
                DB::raw("TIME(visits.check_in_time) as check_in_time"),
                DB::raw("TIME(visits.check_out_time) as check_out_time"),
                'visits.id as visit_id',
                'visits.relationship',
                'visits.visit_duration as duration',
                'visit_status.status_name as status_name',
                'visitors.contact_number',
                'visitors.id as visitor_id',
                'visitor_credentials.username as username'
            )
            ->orderBy('visits.id')
            ->paginate(10);
        return view('/admins/logs/completed', compact('records'));
    }

    public function confirm_visit($id)
    {
        DB::table('visits')
            ->where('id', $id)
            ->update(['status_id' => 1, 'check_in_time' => now()]);
        // Register the Action in the Auditlog
        $actionTypeId = 8;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'visit confirmed');
        return redirect()->back()->with('success', 'Visit confirmed successfully');
    }
    public function reject_visit($id)
    {
        DB::table('visits')
            ->where('id', $id)
            ->update([
                'status_id' => 5,
                'check_out_time' => now(),
                'visit_duration' => DB::raw('TIMESTAMPDIFF(MINUTE, check_in_time, now())')
            ]);

        $actionTypeId = 10;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'visit rejected');
        return redirect()->back()->with('success', 'Visit rejected successfully');
    }
    public function force_end_visit($id)
    {
        DB::table('visits')
            ->where('id', $id)
            ->update([
                'status_id' => 2,
                'check_out_time' => now(),
                'duration' => DB::raw('TIMESTAMPDIFF(MINUTE, check_in_time, now())')
            ]);
        $actionTypeId = 9;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'visit Force Ended');
        return redirect()->back()->with('info', 'Visit Force ended successfully');
    }

    public function search_visit(Request $request)
    {
        $input = $request->input('search');
        $records = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->join('visitors', 'visits.visitor_id', '=', 'visitors.id')
            ->join('visit_status', 'visits.status_id', '=', 'visit_status.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->where(function ($query) use ($input) {
                $query->where('visitors.first_name', 'like', '%' . $input . '%')
                    ->orWhere('visitors.last_name', 'like', '%' . $input . '%')
                    ->orWhere('inmates.first_name', 'like', '%' . $input . '%')
                    ->orWhere('inmates.last_name', 'like', '%' . $input . '%');
            })
            ->select(
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address"),
                DB::raw("DATE(visits.check_in_time) as date"),
                DB::raw("TIME(visits.check_in_time) as check_in_time"),
                DB::raw("TIME(visits.check_out_time) as check_out_time"),
                'visits.id as visit_id',
                'visits.relationship',
                'visit_status.status_name as status_name',
                'visitors.contact_number',
                'visitors.id as visitor_id',
                'visitor_credentials.username as username'
            )
            ->paginate(10);
        return view('/admins/logs/completed', compact('records'));
    }
}
