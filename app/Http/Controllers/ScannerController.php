<?php

namespace App\Http\Controllers;

use App\Models\Blacklist;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\VisitorQrCode;
use App\Models\Inmate;
use Illuminate\Support\Facades\Auth;

class ScannerController extends Controller
{
    public function landingpage()
    {
        return view('scanner.landing');
    }
    public function checkin()
    {
        return view('scanner.check-in');
    }
    public function checkout()
    {
        return view('scanner.check-out');
    }

    public function process_qr(Request $request)
    {
        $qrData = $request->input('qr_code'); // Retrieve the 'qr_code' input
        // Decode QR data and find the associated visitor
        $visit = VisitorQrCode::where('qr_code', $qrData)->first();
        if (!$visit) {
            return redirect()->back()->with('error', 'Invalid QR code.');
        }
        // Check if the visitor is blacklisted
        $blacklist = Blacklist::where('visitor_id', $visit->visitor_id)->first();
        if ($blacklist) {
            return redirect()->route('landingpage')->with('error', 'You have been blacklisted and cannot check in. Please contact the admin for more information.');
        }

        $record = Visit::where('visitor_id', $visit->visitor_id)->where('check_out_time', null)->first();
        if ($record) {
            return redirect()->route('landingpage')->with('error', 'Visitor already checked-in. Checkout or Proceed to the Officer for Verfication.');
        }
        // Validate inmate ID
        $inmateId = $request->input('inmate_id');
        $inmate = Inmate::where('id', $inmateId)->where('is_deleted', 0)->first();
        if (!$inmate) {
            return redirect()->route('checkin')->with('error', 'Invalid inmate ID.');
        }
        // Perform Check-In
        $newVisit = new Visit();
        $newVisit->visitor_id = $visit->visitor_id;
        $newVisit->inmate_id = $inmateId;
        $newVisit->relationship = $request->input('relationship');
        $newVisit->check_in_time = now();
        $newVisit->status_id = 4;
        $newVisit->save();

        $visitId = $newVisit->id; // Store the newly created visit_id in a variable
        // REGISTER ACTION IN AUDIT LOGS
        $actionTypeId = 10;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(null, $actionTypeId, Auth::id(), $inmateId, $visitId, 'Visitor Check In');
        return redirect()->route('landingpage')->with('success', 'Check-in successful! Proceed to the Officer for verification.');
    }

    public function check_out(Request $request)
    {
        $qrData = $request->input('qr_code'); // Retrieve the 'qr_code' input
        // Decode QR data and find the associated visitor
        $visit = VisitorQrCode::where('qr_code', $qrData)->first();
        if (!$visit) {
            return redirect()->back()->with('error', 'Invalid QR code.');
        }
        $record = Visit::where('visitor_id', $visit->visitor_id)->whereNull('check_out_time')->first();
        if (!$record) {
            return redirect()->route('landingpage')->with('error', 'No active visit found for this QR code.');
        }
        // Check if the visit status is pending
        if ($record->status_id == 4) { // Assuming 4 is the status for pending
            return redirect()->route('landingpage')->with('error', 'Visit is still pending. Go to the Officer for verification');
        }
        // Perform Check-Out
        $record->status_id = 2;
        $record->check_out_time = now();
        $checkInTime = \Carbon\Carbon::parse($record->check_in_time);
        $record->visit_duration = $checkInTime->diffInMinutes(now());
        $record->save();

        // REGISTER ACTION IN AUDIT LOGS
        $actionTypeId = 9;
        $auditLogController = new AuditLogController();
        $auditLogController->logAudit(null, $actionTypeId, Auth::id(), $record->inmate_id, $record->id, 'visitor checkout');
        return redirect()->route('landingpage')->with('success', 'Check-out successful!');
    }

    public function search_inmate(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $inmates = Inmate::where('is_deleted', 0)
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'LIKE', "%{$query}%")
                    ->orWhere('last_name', 'LIKE', "%{$query}%")
                    ->orWhere('id', 'LIKE', "%{$query}%")
                    ->orWhere('inmate_number', 'LIKE', "%{$query}%");
            })
            ->select('id', 'first_name', 'last_name', 'inmate_number')
            ->limit(10)
            ->get();
        return response()->json($inmates);
    }
}
