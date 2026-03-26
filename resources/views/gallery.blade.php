<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Gallery - Laravel Cloud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #1F2E35; color: white; font-family: 'Inter', sans-serif; }
        .card { background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); color: white; border-radius: 20px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); border-color: #BE1E3C; }
        .file-preview { height: 180px; display: flex; align-items: center; justify-content: center; background: #162126; border-radius: 15px 15px 0 0; overflow: hidden; }
        .file-preview img { width: 100%; height: 100%; object-fit: cover; }
        .btn-red { background-color: #BE1E3C; color: white; border-radius: 50px; border: none; }
        .btn-red:hover { background-color: #a01932; color: white; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="fw-bold">Cloud Gallery</h1>
            <p class="text-white-50">Daftar file yang berhasil disimpan di Laravel Cloud Storage</p>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-outline-light px-4" style="border-radius: 50px;">
            <i class="bi bi-plus-lg me-2"></i> Upload Baru
        </a>
    </div>

    <div class="row g-4">
        @forelse($files as $file)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100">
                    <div class="file-preview">
                        @php
                            $isImage = in_array(strtolower($file->file_type), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            // Generate the URL from the 'cloud_storage' disk
                            $fileUrl = Storage::disk('cloud_storage')->url($file->file_path);
                        @endphp

                        @if($isImage)
                            <img src="{{ $fileUrl }}" alt="{{ $file->custom_file_name }}">
                        @else
                            <i class="bi bi-file-earmark-text display-1 text-white-50"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6 class="fw-bold mb-1 text-truncate">{{ $file->custom_file_name }}</h6>
                        <p class="small text-white-50 mb-2">Oleh: {{ $file->uploader_name }}</p>

                        <div class="d-flex gap-2">
                            <a href="{{ Storage::disk('cloud_storage')->url($file->file_path) }}" target="_blank" class="btn btn-red btn-sm w-75">
                                <i class="bi bi-eye"></i> View
                            </a>

                            <form action="{{ route('upload.destroy', $file->id) }}" method="POST" class="w-25" onsubmit="return confirm('Hapus file ini permanently?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-folder2-open display-1 text-white-50"></i>
                <p class="mt-3">Belum ada file yang diupload.</p>
            </div>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
