<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SMSController extends Controller
{
    public static function sendSMS($send_to, $message)
    {
        $client = new Client();
        try {
            $client->get('https://deywuro.com/api/sms?', [
                'verify' => false,
                'query' => [
                    'username' => 'deliverInHo',
                    'password' => 'deliverInHo@2020',
                    'source' => 'TestProject',
                    'destination' => $send_to,
                    'message' => $message,
                ]
            ]);
        } catch (GuzzleException $e) {
            return response()->json($e);
        }
    }
}
