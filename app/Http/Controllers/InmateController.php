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
            ->where('inmates.is_deleted', 0)
            ->paginate(10);
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

    public function search(Request $request)
    {
        $query = $request->input('search');
        $inmate = DB::table('inmates')
            ->join('genders', 'inmates.gender_id', '=', 'genders.id')
            ->where('inmates.first_name', 'LIKE', "%{$query}%")
            ->orWhere('inmates.last_name', 'LIKE', "%{$query}%")
            ->orWhere('inmates.inmate_number', 'LIKE', "%{$query}%")
            ->select('inmates.*', 'genders.gender_name as gender_name')
            ->paginate(10);
        return view('admins.inmate', compact('inmate'));
    }

    public function delete($id)
    {
        $inmate = Inmate::find($id);
        if ($inmate) {
            $inmate->is_deleted = 1;
            $inmate->updated_at = now();
            $inmate->save();
            return redirect()->route('admins.inmate')->with('success', 'Inmate deleted successfully');
        } else {
            return redirect()->route('admins.inmate')->with('error', 'Inmate not found');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'inmate_number' => ['required', 'string', 'max:255', 'unique:inmates,inmate_number,' . $id],
            'gender_id' => ['required', 'integer'],
            'cell_number' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $inmate = Inmate::find($id);
        if ($inmate) {
            $inmate->first_name = $request->input('first_name');
            $inmate->last_name = $request->input('last_name');
            $inmate->inmate_number = $request->input('inmate_number');
            $inmate->gender_id = $request->input('gender_id');
            $inmate->cell_number = $request->input('cell_number');
            $inmate->updated_at = now();
            $inmate->save();
            return redirect()->route('admins.inmate')->with('success', 'Inmate updated successfully');
        } else {
            return redirect()->route('admins.inmate')->with('error', 'Inmate not found');
        }
    }
}
