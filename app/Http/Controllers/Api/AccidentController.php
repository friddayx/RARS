<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SMSController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\Accident;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AccidentResource;

class AccidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_reports = Accident::all()->where('reporter', auth()->id());

        return $this->sendResponse(AccidentResource::collection($my_reports), 'Accidents retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'accident_type' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $message = "A ".$request->accident_type." accident has occured at ".$request->location. " and it is ".$request->description.
            " please assign institution quickly to save lives.";
        $phone = "0544792829";
        $accident = Accident::create([
            'accident_type'=> $request->accident_type,
            'description'=> $request->description,
            'location'=> $request->location,
            'reporter'=> auth()->id(),
        ]);

        SMSController::sendSMS($phone, $message);

        return $this->sendResponse(new AccidentResource($accident), 'Accident Reported successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function sendResponse($result, $message): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }
}
