<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visitor;
use App\Http\Controllers\AuditLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\VisitorQrCode as VisitorQrCode;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
            ->leftJoin('blacklist', function ($join) {
                $join->on('visitors.id', '=', 'blacklist.visitor_id')
                    ->where('blacklist.is_deleted', '=', 0);
            })
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
            ->whereNull('blacklist.id') // Exclude if there's any active blacklist entry
            ->paginate(10);

        return view('admins.users.registered', ['records' => $records]);
    }

    // show the pending visitor profile on admin side
    public function user_pend()
    {
        $records = DB::table('visitors')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->join('id_types', 'visitors.id_type', '=', 'id_types.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->select(
                'visitors.*',
                'visitor_credentials.username',
                'genders.gender_name',
                'id_types.id_type_name as id_name',
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address")
            )
            ->where('visitors.is_verified', '=', '0')
            ->paginate(10);
        return view('admins.users.pending', compact('records'));
    }
    // confirm the pending visitor
    // generate qr code for the visitor
    public function confirm_visitor($id)
    {
        $visitor = Visitor::find($id);

        if (!$visitor) {
            return redirect()->back()->with('error', 'Visitor not found.');
        }
        $qrData = 'visitor_' . $visitor->id . '_' . uniqid();
        $qrCodeFileName = $visitor->id . '_' . uniqid() . '_qr.svg';
        $qrCodePath = 'qr_codes/' . $qrCodeFileName;
        // Ensure the directory exists
        Storage::makeDirectory('qr_codes');
        QrCode::size(300)->generate($qrData, Storage::path($qrCodePath));
        VisitorQrCode::create([
            'visitor_id' => $visitor->id,
            'qr_code' => $qrData,
            'qr_path' => $qrCodeFileName,
        ]);
        $visitor->update(['is_verified' => 1]);
        // Register the Action in the Auditlog
        $actionTypeId = 1;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $visitor->id, null, null, 'Confirmed visitor');
        return redirect()->route('admins.users.pending')->with('success', 'Visitor has been confirmed & QR code has been generated');
    }
    // reject the pending visitor
    public function reject_visitor($id)
    {
        DB::table('visitors')
            ->where('id', $id)
            ->delete();
        // Register the Action in the Auditlog
        $actionTypeId = 14;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'Confirmed visitor');
        return redirect()->route('admins.users.pending')->with('success', 'Visitor has been rejected and removed  from the system');
    }

    // show the visitor profile on admin side
    public function get_profile($id)
    {
        // Retrieve the visitor's profile
        $visitor = DB::table('visitors')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->join('id_types', 'visitors.id_type', '=', 'id_types.id')
            ->where('visitors.id', $id)
            ->select('visitors.*', 'visitor_credentials.*', 'genders.gender_name', 'id_types.id_type_name as id_name')
            ->firstOrFail();
        error_log('VISITOR_LOG:' . $id);
        return view('admins.users.view-profile', compact('visitor'));
    }

    // add to blacklisted
    public function add_blacklist(Request $request, $id)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);
        DB::table('blacklist')->insert([
            'visitor_id' => $id,
            'reason' => $request->input('reason'),
            'created_at' => now(),
        ]);
        // Register the Action in the Auditlog
        $actionTypeId = 3;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'Blacklisted - ' . $request->input('reason'));
        return redirect()->route('admins.users.registered')->with('success', 'Visitor has been added to the blacklist');
    }
    // remove from blacklist
    public function remove_blacklist($id)
    {
        DB::table('blacklist')
            ->where('visitor_id', $id)
            ->update(['is_deleted' => 1, 'updated_at' => now()]);

        // Register the Action in the Auditlog
        $actionTypeId = 4;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(Auth::id(), $actionTypeId, $id, null, null, 'Undo Blacklist');
        return redirect()->route('admins.users.blacklist')->with('success', 'Visitor has been removed from the blacklist');
    }
    // show blacklisted persons
    public function user_black()
    {
        $records = DB::table('visitors')
            ->join('blacklist', 'visitors.id', '=', 'blacklist.visitor_id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->select(
                'blacklist.id as blacklist_id',
                'visitors.id as visitor_id',
                'visitors.first_name',
                'visitors.last_name',
                'visitors.email',
                'visitors.contact_number',
                'visitors.date_of_birth',
                'visitor_credentials.username',
                'visitors.created_at',
                'genders.gender_name',
                DB::raw("CONCAT(visitors.address_city, ' ', visitors.address_barangay, ' ', visitors.address_province, ' ', visitors.country, ' ', visitors.address_zip) as address"),
                'blacklist.reason',
                'blacklist.created_at as blacklisted_at'
            )
            ->where('blacklist.is_deleted', '=', '0')
            ->paginate(10);
        return view('admins.users.blacklist', compact('records'));
    }
}
