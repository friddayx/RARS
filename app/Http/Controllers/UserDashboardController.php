<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_data = User::all()->where('id', auth()->id())->first();
//        dd($my_data);
        return view('pages.users.index', compact('my_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required',
        ]);

        $update_profile = User::find(auth()->id());
        $update_profile->address = $request->address;
        $update_profile->contact = $request->contact;
        $update_profile->email = $request->email;
        $update_profile->passport = $request->passport;
        $update_profile->update();

        if ($update_profile->update()){
            return response()->json(['status' => 201, 'message' => 'Profile Updated Successfully']);
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
