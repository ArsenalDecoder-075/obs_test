<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        // Simpan file ke S3
        $path = $request->file('file')->store('uploads', 's3');

        // Ambil URL file
        $url = Storage::disk('s3')->url($path);

        return back()->with('success', 'File berhasil diupload');
    }
}
