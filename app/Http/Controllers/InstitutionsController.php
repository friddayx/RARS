<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_institutions = Institution::all();
        return view('admin.pages.institutions.index', compact('all_institutions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'institution_name'=>'required',
           'emergency_line'=>'required',
           'email'=>'required',
           'contact'=>'required',
        ]);

        $add_new_institution = new Institution();
        $add_new_institution->institution_name = $request->institution_name;
        $add_new_institution->emergency_line = $request->emergency_line;
        $add_new_institution->email = $request->email;
        $add_new_institution->contact = $request->contact;
        $add_new_institution->save();

        if ($add_new_institution->save()){
            return response()->json(['status' => 201, 'message' => 'Institution Added Successfully']);
        }
        return false;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fetch_institution = Institution::all()->where('id',$id)->first();

        return view('admin.pages.institutions.update', compact('fetch_institution'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'institution_name'=>'required',
            'emergency_line'=>'required',
            'email'=>'required',
            'contact'=>'required',
        ]);

        $admin_update_institution = Institution::find($request->id);
        $admin_update_institution->institution_name = $request->institution_name;
        $admin_update_institution->emergency_line = $request->emergency_line;
        $admin_update_institution->email = $request->email;
        $admin_update_institution->contact = $request->contact;

        if ($admin_update_institution->update()){

            return response()->json(['status' => 201, 'message' => 'Institution updated successfully.']);
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     */
//    TODO delete actions for institution
    public function destroy(string $id)
    {
        //
    }
}
