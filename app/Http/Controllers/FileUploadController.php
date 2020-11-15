<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function index(Request $request)
    {
        $upload_directory = public_path() . '/images/';

        $request->validate([
            'upload_file' => 'required|file|image|mimes:jpeg,jpg,png',
        ]);

        $upload_file_size = $request->file('upload_file')->getSize();
        if ($upload_file_size > 500000) {
            return response()->json(['code' => 500, 'msg' => 'upload file size is over.']);
        }

        $file_name = Str::random(64) . '.' . $request->file('upload_file')->extension();
        $request->file('upload_file')->move($upload_directory, $file_name);

        return response()->json(['code' => 200, 'msg' => 'upload success.', 'file_name' => $file_name]);
    }
}
