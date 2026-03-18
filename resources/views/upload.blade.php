<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloud-Sebelah | Titip Nasib</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] antialiased min-h-screen flex items-center justify-center p-4 md:p-8">

    <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">

        <div class="flex flex-col justify-center space-y-8 p-6 lg:p-12 bg-gray-50 rounded-3xl border border-gray-100">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight mb-2 text-red-600">Panduan Titip File</h1>
                <p class="text-gray-500">Baca dulu biar nggak nanya-nanya lagi di grup WhatsApp.</p>
            </div>

            <div class="space-y-6">
                <div class="flex gap-4">
                    <div class="text-2xl">🖼️</div>
                    <div>
                        <h3 class="font-bold uppercase text-xs tracking-widest text-gray-400">Gambar / Foto</h3>
                        <p class="text-sm text-gray-700 font-medium">Menerima meme kualitas 144p sampai foto profil yang sudah di-filter habis-habisan.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-2xl">📄</div>
                    <div>
                        <h3 class="font-bold uppercase text-xs tracking-widest text-gray-400">Dokumen / PDF</h3>
                        <p class="text-sm text-gray-700 font-medium">Khusus file bernama <code>Skripsi_Final_Beneran_Final_V9.pdf</code>. File lain auto-hapus.</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="text-2xl">🎵</div>
                    <div>
                        <h3 class="font-bold uppercase text-xs tracking-widest text-gray-400">Audio / Musik</h3>
                        <p class="text-sm text-gray-700 font-medium">Voice note mantan yang durasinya 5 menit isinya cuma nangis? Gas, upload sini.</p>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-200">
                <p class="text-[11px] text-gray-400 leading-relaxed italic">
                    *Dengan mengupload, Anda setuju bahwa file Anda mungkin akan kami jadikan bahan ketawaan admin di jam istirahat.
                </p>
            </div>
        </div>

        <div class="bg-white border-2 border-black rounded-3xl p-8 md:p-12 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] flex flex-col justify-center">
            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="text-center space-y-2">
                    <h2 class="text-2xl font-bold italic text-black">ZONA BUANG FILE</h2>
                    <p class="text-sm text-gray-500 font-medium">Jangan dipikirin, langsung upload aja.</p>
                </div>

                <div class="relative group">
                    <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-300 rounded-2xl cursor-pointer bg-gray-50 hover:bg-red-50 hover:border-red-400 transition-all duration-300">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-12 h-12 mb-4 text-gray-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-bold">Klik buat milih</span> atau seret filenya ke sini</p>
                            <p class="text-xs text-gray-400">Format: PNG, JPG, PDF, MP3 (Gede file jangan ngerampok kuota kami)</p>
                        </div>
                        <input type="file" name="file" class="hidden" />
                    </label>
                </div>

                <button type="submit" class="w-full bg-[#1b1b18] text-white py-4 rounded-2xl font-bold text-lg hover:bg-red-600 hover:-translate-y-1 active:translate-y-0 transition-all shadow-lg">
                    AMANKAN FILE SEKARANG! 🚀
                </button>

                <div class="flex justify-between items-center px-2">
                    <span class="text-[10px] text-gray-400 flex items-center gap-1 uppercase tracking-tighter">
                        <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span> Server Lagi Mood
                    </span>
                    <a href="#" class="text-[10px] text-gray-400 underline hover:text-black uppercase">Butuh Bantuan? (Jangan)</a>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
