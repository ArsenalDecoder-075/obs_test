<?php

namespace App\Http\Controllers;

use App\Models\CloudFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CloudUploadController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function stage(Request $request) {
        $request->validate(['file' => 'required|file|max:10240']);

        // Stage file in a 'tmp' folder in Laravel Cloud
        $path = $request->file('file')->store('tmp', 'cloud_storage');

        session()->put('staged_file', [
            'path' => $path,
            'original_name' => $request->file('file')->getClientOriginalName(),
            'extension' => $request->file('file')->getClientOriginalExtension(),
            'size' => $request->file('file')->getSize(),
        ]);

        return redirect()->route('upload.create');
    }

    public function create() {
        if (!session()->has('staged_file')) return redirect()->route('welcome');
        return view('upload');
    }

    public function store(Request $request) {
        $request->validate([
            'custom_file_name' => 'required|string|max:255',
            'uploader_name' => 'required|string|max:255',
            'upload_date' => 'required|date',
        ]);

        $staged = session('staged_file');
        $permanentPath = 'uploads/' . uniqid() . '.' . $staged['extension'];

        // Move from tmp to permanent storage
        Storage::disk('cloud_storage')->move($staged['path'], $permanentPath);

        CloudFile::create([
            'custom_file_name' => $request->custom_file_name,
            'uploader_name' => $request->uploader_name,
            'description' => $request->description,
            'upload_date' => $request->upload_date,
            'file_path' => $permanentPath,
            'file_type' => $staged['extension'],
            'file_size' => $staged['size'],
        ]);

        session()->forget('staged_file');
        return redirect()->route('welcome')->with('success', 'File berhasil disimpan!');
    }

    // Add this to your existing CloudUploadController

    public function indexGallery()
    {
        // Fetch all files from the database, newest first
        $files = CloudFile::latest()->get();

        return view('gallery', compact('files'));
    }

    public function destroy($id)
    {
        $file = CloudFile::findOrFail($id);

        // 1. Delete the physical file from Laravel Cloud
        if (Storage::disk('cloud_storage')->exists($file->file_path)) {
            Storage::disk('cloud_storage')->delete($file->file_path);
        }

        // 2. Delete the record from the database
        $file->delete();

        return back()->with('success', 'File berhasil dihapus dari Cloud dan Database.');
    }
}
