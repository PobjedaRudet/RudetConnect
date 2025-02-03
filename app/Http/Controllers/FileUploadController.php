<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        Log::info('File upload request received.');
        // Validate that a file is provided and it is of the correct type
        $request->validate([
            'file' => 'required|file|mimes:png,jpg,jpeg,pdf,doc,docx|max:10240', // Example for image/PDF/Word files
        ]);
        Log::info('Validation pass...');
        $file = $request->file('file');

        // Check if the file is valid and readable
        if ($file && $file->isValid()) {
            // Store the file with the original name
            $path = $file->storeAs('uploads', $file->getClientOriginalName()); // 'uploads' is a directory within storage/app
            Log::info('File uploaded successfully to: ' . $path);

            return response()->json(['path' => $path]);
        } else {
            Log::error('Error uploading file: The file is invalid or cannot be read.');
            return response()->json(['error' => 'File upload failed.'], 400);
        }
    }

    public function show($filename)
    {
        $url = Storage::url("uploads/{$filename}");

        return view('file.show', ['url' => $url]);
    }
}
