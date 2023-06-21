<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use App\Models\Admin;
use App\Models\Institution;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorDashboardController extends Controller
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
        $new_reports = Accident::all()->where('status', 'PENDING')->count();
        $completed_case = Accident::all()->where('status','COMPLETED')->count();
        $institutions = Institution::all()->count();
        $registrars = User::all()->count();

        return view('admin.home', compact('new_reports','completed_case','institutions',
        'registrars'));
    }

    public function new_accident()
    {
        $new_accidents = Accident::all()->where('status', 'PENDING');
        return view('admin.pages.accident.index', compact('new_accidents'));
    }

    public function pending_accident()
    {
        $new_accidents = Accident::all()->where('status', 'INSTITUTION ASSIGNED');
        return view('admin.pages.accident.pending', compact('new_accidents'));
    }

    public function completed_accident()
    {
        $new_accidents = Accident::all()->where('status', 'COMPLETED');
        return view('admin.pages.accident.completed', compact('new_accidents'));
    }

    public function assign_new($id)
    {
        $fetch_accident = Accident::all()->where('id', $id)->first();
        $fetch_institutions = Institution::all();
        return view('admin.pages.accident.assign_new',compact('fetch_accident','fetch_institutions'));
    }

    public function assignment_new(Request $request)
    {
        $this->validate($request,[
            'accident_type' => 'required',
            'description' => 'required',
            'location' => 'required',
            'institution' => 'required',
        ]);

        $message = "A ".$request->accident_type." accident has occured at ".$request->location. " and it is ".$request->description.
            " please respond quickly to save lives.";

        $fetch_data = Institution::all()->where('id', $request->institution)->first();
//        dd($fetch_data->emergency_line);
        $phone = $fetch_data->emergency_line;

        $admin_update_accident = Accident::find($request->id);
        $admin_update_accident->accident_type = $request->accident_type;
        $admin_update_accident->description = $request->description;
        $admin_update_accident->location = $request->location;
        $admin_update_accident->institution = $fetch_data->institution_name;
        $admin_update_accident->status = 'INSTITUTION ASSIGNED';

        if ($admin_update_accident->update()){

            SMSController::sendSMS($phone, $message);

            return response()->json(['status' => 201, 'message' => 'Institution Assigned successfully.']);
        }
        return false;
    }

    public function complete_report($id)
    {
        $fetch_accident = Accident::all()->where('id', $id)->first();
//        dd($fetch_accident);
        return view('admin.pages.accident.assign_complete',compact('fetch_accident'));
    }

    public function update_complete(Request $request)
    {
//        dd($request);
        $this->validate($request,[
            'accident_type' => 'required',
            'description' => 'required',
            'location' => 'required',
            'institution' => 'required',
        ]);


        $admin_update_accidents = Accident::find($request->id);
        $admin_update_accidents->accident_type = $request->accident_type;
        $admin_update_accidents->description = $request->description;
        $admin_update_accidents->location = $request->location;
        $admin_update_accidents->institution = $request->institution;
        $admin_update_accidents->status = $request->status;

        if ($admin_update_accidents->update()){

            return response()->json(['status' => 201, 'message' => 'Report updated successfully.']);
        }
        return false;
    }

//    Users sections

    public function display_users()
    {
        $fetch_users = User::all();

        return view('admin.pages.users.index', compact('fetch_users'));
    }

    public function view_user($id)
    {
        $fetch_user = User::all()->where('id',$id)->first();

        return view('admin.pages.users.view_users', compact('fetch_user'));

    }

    public function display_inactive_users()
    {
        $fetch_users = User::all()->where('active','INACTIVE');

        return view('admin.pages.users.inactive_users', compact('fetch_users'));
    }

    public function getuser_updates($id)
    {
        $fetch_user = User::all()->where('id',$id)->first();

        return view('admin.pages.users.update_users', compact('fetch_user'));
    }

    public function update_user(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'national_id' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'active' => 'required',
        ]);

        $admin_update_user = User::find($request->id);
        $admin_update_user->name = $request->name;
        $admin_update_user->username = $request->username;
        $admin_update_user->national_id = $request->national_id;
        $admin_update_user->address = $request->address;
        $admin_update_user->contact = $request->contact;
        $admin_update_user->passport = $request->passport;
        $admin_update_user->email = $request->email;
        $admin_update_user->active = $request->active;
        $admin_update_user->update();

        if ($admin_update_user->update()){
            return response()->json(['status' => 201, 'message' => 'User Updated Successfully']);
        }
        return false;
    }

    public function view_my_profile()
    {
        $my_data = Admin::all()->where('id', auth()->id())->first();

        return view('admin.pages.admin.admin_profile', compact('my_data'));
    }

    public function update_my_profile(Request $request)
    {
        $this->validate($request, [
            'contact' => 'required',
            'email' => 'required',
            'name' => 'required',
            'username' => 'required',
            'national_id' => 'required',
        ]);

        $update_my_profile = Admin::find(auth()->id());
        $update_my_profile->name = $request->name;
        $update_my_profile->username = $request->username;
        $update_my_profile->contact = $request->contact;
        $update_my_profile->email = $request->email;
        $update_my_profile->national_id = $request->national_id;
        $update_my_profile->update();

        if ($update_my_profile->update()){

            return response()->json(['status' => 201, 'message' => 'Profile Updated Successfully']);
        }
        return false;
    }
}
