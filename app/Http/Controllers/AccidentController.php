<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'accident_type' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $new_accident = new Accident();
        $new_accident->accident_type = $request->accident_type;
        $new_accident->description = $request->description;
        $new_accident->location = $request->location;
        $new_accident->reporter = auth()->id();
        $new_accident->save();

        $message = "A ".$request->accident_type." accident has occured at ".$request->location. " and it is ".$request->description.
            " please assign institution quickly to save lives.";

        $phone = "0200617595";

        if ($new_accident->save()){

            SMSController::sendSMS($phone, $message);

            return response()->json(['status' => 201, 'message' => 'Accident Reported Successfully']);
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
