<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Raw;

class VisitorController extends Controller
{
    public function ShowDashboard()
    {
        $visitor = Auth::guard('visitor')->user();
        if (!$visitor) {
            return redirect()->route('login'); // Redirect to login if not authenticated
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
            ->where('visitors.id', $visitorId)
            ->select('visitors.*', 'genders.gender_name')
            ->first();

        return view('users.profile', ['visitor' => $visitor]);
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
            ->select('visitors.*', 'visitor_credentials.*' ,'genders.gender_name', 'id_types.id_type_name as id_name')
            ->firstOrFail();
        error_log('VISITOR_LOG:' . $id);
        return view('admins.users.view-profile', compact('visitor'));
    }


    // public function ShowQr()
    // {
    //     return view('users.qr');
    // }
}
