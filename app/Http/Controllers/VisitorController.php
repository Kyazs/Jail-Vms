<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{
    public function ShowDashboard()
    {
        $visitor = Auth::guard('visitor')->user();
        if (!$visitor) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        if (is_null($visitor->email_verified_at)) {
            return redirect()->route('verification.notice'); // Redirect to email notification if email is not verified
        }

        $visitorId = $visitor->id;
        // Log the visitor ID to the server's error log
        error_log('Visitor ID: ' . $visitorId);
        // Retrieve all visits for the authenticated visitor and paginate the results
        $visits = DB::table('visits')
            ->join('inmates', 'visits.inmate_id', '=', 'inmates.id')
            ->where('visits.visitor_id', $visitorId)
            ->select('visits.*', DB::raw("CONCAT(inmates.first_name, ' ', inmates.last_name) as inmate_name"))
            ->paginate(15);
        // Pass the data to the view
        return view('users.dashboard', ['visits' => $visits]);
    }

    public function ShowProfile()
    {
        $visitor = Auth::guard('visitor')->user();
        if (!$visitor) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
        $visitorId = $visitor->id;
        // Retrieve the visitor's profile
        $visitor = DB::table('visitors')
            ->join('genders', 'visitors.gender_id', '=', 'genders.id')
            ->join('visitor_credentials', 'visitors.id', '=', 'visitor_credentials.visitor_id')
            ->where('visitors.id', $visitorId)
            ->select('visitors.*', 'visitor_credentials.username', 'genders.gender_name')
            ->first();

        return view('users.profile', ['visitor' => $visitor]);
    }

    public function ShowQr()
    {
        $visitor = Auth::guard('visitor')->user();
        if (!$visitor) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }
        $visitorId = $visitor->id;
        // Retrieve the visitor's qr
        $visitor = DB::table('visitor_qr_code')
            ->where('visitor_id', $visitorId)
            ->first();
        return view('users.qr_code', ['visitor' => $visitor]);
    }

    public function getQrCode($filename)
    {
        $path = storage_path('app/private/qr_codes/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->file($path, [
            'Content-Type' => 'image/svg+xml',
        ]);
    }




    // public function ShowQr()
    // {
    //     return view('users.qr');
    // }
}
