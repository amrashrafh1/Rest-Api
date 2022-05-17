<?php
namespace App\Contract;

trait ApiResponse
{
    /*
     * $message
     * $data
     * $errors
     * $status: true, false
     */
    protected function sendResult($message,$data,$errors = [],$status = true)
    {
        $errorCode = $status ? 200 : 422;
        $result = [
            "message" => $message,
            "status"  => $status,
            "data"    => $data,
            "errors"  => $errors
        ];
        return response()->json($result,$errorCode);
    }
}
