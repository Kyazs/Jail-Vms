<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuditLogController extends Controller
{


    function logAudit($userId = null, $actionTypeId, $visitorId = null, $inmateId = null, $visitId = null, $details = null)
    {
        AuditLog::create([
            'user_id' => $userId,
            'action_type_id' => $actionTypeId,
            'visitor_id' => $visitorId,
            'inmate_id' => $inmateId,
            'visit_id' => $visitId,
            'details' => $details,
        ]);
    }

    function showAudit()
    {
        $logs = DB::table('audit_log')
            ->leftJoin('action_types', 'audit_log.action_type_id', '=', 'action_types.id')
            ->leftJoin('users', 'audit_log.user_id', '=', 'users.id')
            ->leftJoin('visitors', 'audit_log.visitor_id', '=', 'visitors.id')
            ->leftJoin('inmates', 'audit_log.inmate_id', '=', 'inmates.id')
            ->leftJoin('visits', 'audit_log.visit_id', '=', 'visits.id')
            ->select(
                'audit_log.*',
                'action_types.action_type_name',
                'users.username',
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                'visits.id as visit_id'
            )
            ->orderBy('audit_log.created_at', 'desc')
            ->paginate(10);
        return view('admins.audit', compact('logs'));
    }

    public function searchAudit(Request $request)
    {
        $input = $request->input('search');
        $logs = DB::table('audit_log')
            ->leftJoin('action_types', 'audit_log.action_type_id', '=', 'action_types.id')
            ->leftJoin('users', 'audit_log.user_id', '=', 'users.id')
            ->leftJoin('visitors', 'audit_log.visitor_id', '=', 'visitors.id')
            ->leftJoin('inmates', 'audit_log.inmate_id', '=', 'inmates.id')
            ->leftJoin('visits', 'audit_log.visit_id', '=', 'visits.id')
            ->where(function ($query) use ($input) {
                $query->where('users.username', 'like', '%' . $input . '%')
                    ->orWhere('users.id', 'like', '%' . $input . '%')
                    ->orWhere('action_types.action_type_name', 'like', '%' . $input . '%')
                    ->orWhere('action_types.id', 'like', '%' . $input . '%')
                    ->orWhere(DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name)"), 'like', '%' . $input . '%')
                    ->orWhere('visitors.id', 'like', '%' . $input . '%')
                    ->orWhere(DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name)"), 'like', '%' . $input . '%')
                    ->orWhere('inmates.id', 'like', '%' . $input . '%')
                    ->orWhere('audit_log.id', 'like', '%' . $input . '%')
                    ->orWhere('audit_log.details', 'like', '%' . $input . '%');
            })
            ->select(
                'audit_log.*',
                'action_types.action_type_name',
                'users.username',
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                'visits.id as visit_id'
            )
            ->orderBy('audit_log.created_at', 'desc')
            ->paginate(10);
        return view('admins.audit', compact('logs'));
    }

    public function sortAudit(Request $request)
    {
        $sortOrder = $request->input('sort-by', 'asc'); // Default to ascending if not provided
        $logs = DB::table('audit_log')
            ->leftJoin('action_types', 'audit_log.action_type_id', '=', 'action_types.id')
            ->leftJoin('users', 'audit_log.user_id', '=', 'users.id')
            ->leftJoin('visitors', 'audit_log.visitor_id', '=', 'visitors.id')
            ->leftJoin('inmates', 'audit_log.inmate_id', '=', 'inmates.id')
            ->leftJoin('visits', 'audit_log.visit_id', '=', 'visits.id')
            ->select(
                'audit_log.*',
                'action_types.action_type_name',
                'users.username',
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                'visits.id as visit_id'
            )
            ->orderBy('audit_log.created_at', $sortOrder)
            ->paginate(10);
        return view('admins.audit', compact('logs'));
    }
    public function filterByActionType(Request $request)
    {
        $actionTypeId = $request->input('action-type');
        $logs = DB::table('audit_log')
            ->leftJoin('action_types', 'audit_log.action_type_id', '=', 'action_types.id')
            ->leftJoin('users', 'audit_log.user_id', '=', 'users.id')
            ->leftJoin('visitors', 'audit_log.visitor_id', '=', 'visitors.id')
            ->leftJoin('inmates', 'audit_log.inmate_id', '=', 'inmates.id')
            ->leftJoin('visits', 'audit_log.visit_id', '=', 'visits.id')
            ->where('action_types.id', $actionTypeId)
            ->select(
                'audit_log.*',
                'action_types.action_type_name',
                'users.username',
                DB::raw("CONCAT(visitors.first_name, ' ', visitors.last_name) as visitor_name"),
                DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"),
                'visits.id as visit_id'
            )
            ->orderBy('audit_log.created_at', 'desc')
            ->paginate(10);
        return view('admins.audit', compact('logs'));
    }
}
