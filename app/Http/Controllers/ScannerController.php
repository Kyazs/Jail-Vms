<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\VisitorQrCode;
use App\Models\Inmate;

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
        $record = Visit::where('visitor_id', $visit->visitor_id)->where('check_out_time', null)->first();
        // Check if it's a check-in or check-out
        if (!$record) {
            // Validate inmate ID
            $inmateId = $request->input('inmate_id');
            $inmate = Inmate::find($inmateId);
            if (!$inmate) {
            return redirect()->route('checkin')->with('error', 'Invalid inmate ID.');
            }
            // Perform Check-In
            $newVisit = new Visit();
            $newVisit->visitor_id = $visit->visitor_id;
            $newVisit->inmate_id = $inmateId;
            $newVisit->relationship = $request->input('relationship');
            $newVisit->check_in_time = now();
            $newVisit->status_id = 1;
            $newVisit->save();
            return redirect()->route('landingpage')->with('success', 'Check-in successful! Proceed to the Officer for verification.');
        }
        return redirect()->back()->with('error', 'Visitor already checked-in.');
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
        if ($record->status_id == 1) { // Assuming 1 is the status for pending
            return redirect()->route('landingpage')->with('error', 'Visit is still pending. Go to the Officer for  verification');
        }
        // Perform Check-Out
        $record->check_out_time = now();
        $checkInTime = \Carbon\Carbon::parse($record->check_in_time);
        $record->visit_duration = $checkInTime->diffInMinutes(now());
        $record->save();
        return redirect()->route('landingpage')->with('success', 'Check-out successful!');
    }

    public function search_inmate(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $inmates = Inmate::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('id', 'LIKE', "%{$query}%")
            ->orWhere('inmate_number', 'LIKE', "%{$query}%")
            ->select('id', 'first_name', 'last_name', 'inmate_number')
            ->limit(10)
            ->get();
        return response()->json($inmates);
    }
}
