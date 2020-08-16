<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
 
    }

    public function create()
    {
        return view('admission_apply');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'enroll_in' => ['required', 'string', 'min:2', 'max:255'],
            'details' => ['required', 'string', 'min:2'],
        ]);
        $admission_apply = \App\AdmissionApply::create($validatedData);

        return view('admission_apply_success')->with('application_id', $admission_apply->id)->with('application_status', $admission_apply->status);
    }

    public function status()
    {
        return view('admission_apply_status');
    }
}
