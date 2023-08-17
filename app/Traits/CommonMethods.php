<?php

namespace App\Traits;

use Storage;
use DateTimeInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

trait CommonMethods
{
    /**
     * return unique name for files
     * @return string
     */
    public function uniqueName()
    {

        $uniqueness =   uniqid(microtime(), true);
        $replacement =  str_replace(' ', '_', $uniqueness);
        return uniqid($replacement, true);
    }

    public function apiJsonResponse($success = 1,  $message = null, $data = [], $exception_error_code = 400)
    {

        $response['success']         =   $success;
        $response['message']        =    $message;
        $response['data']           =    $data;

        return response()->json($response, 200, [], JSON_NUMERIC_CHECK);
    }

    public function FTPFileUpload($file, $path, $type = 'general')
    {
        //$file           = $request->file('attachment');
        $extension      = $file->getClientOriginalExtension();
        $originalName   = $file->getClientOriginalName();
        $filename       = unique_name($type) . "." . $extension;

        // return $filename;

        $upload_success = Storage::disk('ftp')->put($path . $filename, fopen($file, 'r+'));
        // return $upload_success;

        return ['upload_status' => $upload_success, 'filename' => $filename, 'original_name' => $originalName];
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }




    /**
     * Upload a single file in the server
     *
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename :  Str::Random(25);

        return $file->storeAs(
            $folder,
            $name . "." . $file->getClientOriginalExtension(),
            $disk
        );
    }

    /**
     * @param UploadedFile $file
     *
     * @param string $folder
     * @param string $disk
     *
     * @return false|string
     */
    public function storeFile(UploadedFile $file, $folder = 'products', $disk = 'public')
    {
        return $file->store($folder, ['disk' => $disk]);
    }




    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result = [], $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }



    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }
}
