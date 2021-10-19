<?php


namespace App\Http\Traits;




use Illuminate\Http\Exceptions\HttpResponseException;

trait SendResponseTrait
{
    public static function sendSuccess( $message,$status_code)
    {

        $response = [
            'success' => true,
            'message' => $message
        ];


        return response()->json($response, $status_code);


    }

    public static function sendError($errors, $message,$status_code)
    {

        $response = [
            'success' => false,
            'message' => $message,
            'errors' => $errors,

        ];


        return response()->json($response,$status_code);

    }

    public static function validationErrors( $messages,$status_code)
    {

        throw new HttpResponseException(response()->json($messages, $status_code));

    }
}
