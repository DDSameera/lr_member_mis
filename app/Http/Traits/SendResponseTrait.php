<?php


namespace App\Http\Traits;




use Illuminate\Http\Exceptions\HttpResponseException;

trait SendResponseTrait
{
    public static function sendSuccess( $message,$status_code)
    {

        $response = [
            'status' => true,
            'message' => $message
        ];


        return response()->json($response, $status_code);


    }

    public static function sendError( $message,$status_code)
    {

        $response = [
            'status' => false,
            'message' => $message,


        ];


        return response()->json($response,$status_code);

    }

    public static function validationErrors( $messages,$status_code)
    {

        throw new HttpResponseException(response()->json($messages, $status_code));

    }
}
