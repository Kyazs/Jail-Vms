<?php

namespace App\Http\Controllers;

use App\Models\Inmate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InmateController extends Controller
{
    public function show()
    {
        $inmate = DB::table('inmates')
            ->join('genders', 'inmates.gender_id', '=', 'genders.id')
            ->select('inmates.*', 'genders.gender_name as gender_name')
            ->get();

        return view('admins.inmate', compact('inmate'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'inmate_number' => ['required', 'string', 'max:255', 'unique:inmates'],
            'gender_id' => ['required', 'integer'],
            'cell_number' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Inmate::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender_id' => $request->input('gender_id'),
            'inmate_number' => $request->input('inmate_number'),
            'cell_number' => $request->input('cell_number'),
        ]);
        return redirect()->route('admins.inmate')->with('success', 'Inmate added successfully');
    }
}
