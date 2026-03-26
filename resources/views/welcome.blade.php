<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Object Storage Website Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1F2E35;
        }

        .bg-red-custom {
            background-color: #BE1E3C;
        }

        .bg-dark-custom {
            background-color: #1F2E35;
        }

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

        .upload-container {
            width: 100%;
            max-width: 650px;
            background-color: #BE1E3C;
            border: 4px solid white;
            border-radius: 60px;
            padding: 80px 40px;
            text-align: center;
            color: white;
            position: relative;
        }

        /* Custom Success Alert */
        .alert-custom {
            background-color: #BE1E3C;
            color: white;
            border: 2px solid white;
            border-radius: 20px;
            font-weight: bold;
            padding: 15px;
            margin-bottom: 20px;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-pilih {
            background-color: #1F2E35;
            color: white;
            border: 2px solid white;
            border-radius: 50px;
            padding: 15px 80px;
            font-style: italic;
            font-size: 1.2rem;
            margin-top: 30px;
            transition: 0.3s;
        }

        .btn-pilih:hover {
            background-color: white;
            color: #BE1E3C;
            font-weight: bold;
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
                <div class="list-info mt-2">
                    <h5 class="fw-bold mb-2">Apa Saja yang Bisa Dititipkan?</h5>
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
            <div class="footer-text mt-2">
                <p class="fw-bold mb-0">@ 2026 Copyright Arsenal_Code.com</p>
            </div>
        </div>

        <div class="col-lg-7 bg-dark-custom right-panel">
            <h2 class="text-white fw-bold display-5 mb-5">Mulai Upload Disini!</h2>

            <div class="w-100 d-flex flex-column align-items-center">
                @if(session('success'))
                    <div id="success-alert" class="alert-custom w-100 text-center" style="max-width: 650px;">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('upload.stage') }}" method="POST" enctype="multipart/form-data" class="w-100 d-flex justify-content-center">
                    @csrf
                    <div class="upload-container">
                        <p class="fs-4 italic">Pilih file untuk memulai <br> (Proses upload otomatis)</p>
                        <input type="file" name="file" id="fileInput" class="d-none" onchange="this.form.submit()">
                        <button type="button" class="btn btn-pilih" onclick="document.getElementById('fileInput').click()">
                            Pilih file...
                        </button>
                    </div>
                </form>

                <div class="mt-4">
                    <a href="{{ route('upload.gallery') }}" class="btn btn-outline-light px-4 py-2" style="border-radius: 50px;">
                        <i class="bi bi-images me-2"></i> Lihat Gallery File
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Fungsi untuk menghilangkan alert otomatis setelah 5 detik (5000 ms)
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500); // Hapus elemen dari DOM setelah fade out
            }, 5000);
        }
    });
</script>

</body>
</html>
