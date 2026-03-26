<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Storage Website Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1F2E35;
        }

        .bg-red-custom { background-color: #BE1E3C; }
        .bg-dark-custom { background-color: #1F2E35; }

        .left-panel {
            min-height: 100vh;
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .right-panel {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .upload-form-container {
            width: 100%;
            max-width: 650px;
            background-color: #BE1E3C;
            border: 4px solid white;
            border-radius: 40px;
            padding: 40px;
            color: white;
        }

        .form-control, .form-control:focus {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid white;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .btn-submit {
            background-color: #1F2E35;
            color: white;
            border: 2px solid white;
            border-radius: 50px;
            padding: 12px 60px;
            font-weight: bold;
            font-size: 1.1rem;
            margin-top: 20px;
            transition: 0.3s;
            width: 100%;
        }

        .btn-submit:hover {
            background-color: white;
            color: #BE1E3C;
        }

        /* Custom Button Hover Logic */
        .btn-outline-danger:hover,
        .btn-success:hover,
        .btn-outline-info:hover {
            color: #000 !important; /* Force text to black on hover */
            font-weight: bold;
        }

        /* Specific background colors on hover */
        .btn-outline-danger:hover { background-color: #dc3545 !important; border-color: #dc3545; }
        .btn-success:hover { background-color: #198754 !important; border-color: #198754; }
        .btn-outline-info:hover { background-color: #0dcaf0 !important; border-color: #0dcaf0; }

        /* Ensure Simpan starts as an outline like the others */
        .btn-save-custom {
            background-color: transparent;
            color: #198754;
            border: 2px solid #198754;
            transition: 0.3s;
        }

        .list-info ol { padding-left: 20px; }
        .list-info li { margin-bottom: 25px; font-weight: 400; }
        .list-info b { font-size: 1.1rem; }
        .format-text { display: block; font-size: 0.95rem; margin-top: 5px; }

        @media (max-width: 992px) {
            .left-panel, .right-panel { min-height: auto; padding: 40px 20px; }
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">

        <div class="col-lg-5 bg-red-custom left-panel">
            <div>
                <h1 class="fw-bolder display-4 mb-2">Object Storage <br> Website Test</h1>
                <div class="list-info mt-4">
                    <h5 class="fw-bold mb-3">Apa Saja yang Bisa Dititipkan?</h5>
                    <ol>
                        <li>
                            <b>Gambar & Foto</b>
                            <span class="format-text">Format: JPG, PNG, GIF, WebP.</span>
                        </li>
                        <li>
                            <b>Dokumen & PDF</b>
                            <span class="format-text">Format: PDF, DOCX, TXT, PPTX.</span>
                        </li>
                        <li>
                            <b>Audio & Musik</b>
                            <span class="format-text">Format: MP3, WAV, M4A.</span>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="footer-text mt-4">
                <p class="fw-bold mb-0">@ 2026 Copyright Arsenal_Code.com</p>
            </div>
        </div>

        <div class="col-lg-7 bg-dark-custom right-panel">
            <h2 class="text-white fw-bold display-5 mb-4">Mulai Upload Disini!</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show w-100" style="max-width: 650px;" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="upload-form-container">

                <div class="alert alert-info py-2" style="background: rgba(255,255,255,0.1); color: white; border: none;">
                    📄 File: <strong>{{ session('staged_file')['original_name'] }}</strong>
                </div>

                <form action="{{ route('upload.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama File Custom</label>
                        <input type="text" class="form-control" name="custom_file_name" required placeholder="Nama file custom">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Uploader</label>
                            <input type="text" class="form-control" name="uploader_name" required placeholder="Username / Nama Panggil">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Tanggal</label>
                            <input type="date" class="form-control" name="upload_date" required placeholder="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="2"></textarea>
                    </div>

                    <div class="d-flex gap-2 mb-4">
                        <a href="{{ route('welcome') }}"
                           class="btn btn-outline-danger w-50 d-flex align-items-center justify-content-center"
                           style="border-radius: 50px; font-size: 1rem; border-width: 2px;">
                           Batal
                        </a>

                        <button type="submit"
                                class="btn btn-outline-success w-50 m-0 d-flex align-items-center justify-content-center"
                                style="border-radius: 50px; font-size: 1rem; border-width: 2px;">
                                Simpan Ke Cloud
                        </button>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-2">
                        <a href="{{ route('upload.gallery') }}"
                           class="btn btn-outline-info w-50 d-flex align-items-center justify-content-center"
                           style="border-radius: 50px; font-size: 1rem; border-width: 2px;">
                           Kembali ke Galeri
                        </a>
                    </div>


                </form>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
