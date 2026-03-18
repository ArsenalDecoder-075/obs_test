<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cloud-Sebelah | Titip File Doang</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">
        <div class="relative min-h-screen flex flex-col items-center justify-center">
            <div class="relative w-full max-w-2xl px-6">
                <header class="flex flex-col items-center py-10 text-center">
                    <div class="h-16 w-16 bg-red-500 rounded-2xl flex items-center justify-center shadow-lg mb-4">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold tracking-tight">Cloud-Sebelah</h1>
                    <p class="mt-2 text-[#706f6c]">"Tempat aman buat naruh file yang sebenernya nggak penting-penting amat."</p>
                </header>

                <main class="mt-6">
                    <div class="border-2 border-dashed border-[#e3e3e0] rounded-3xl p-12 text-center bg-white shadow-sm hover:border-red-400 transition-all cursor-pointer group">
                        <div class="space-y-4">
                            <div class="text-5xl group-hover:bounce">📂</div>
                            <h3 class="text-lg font-semibold">Lempar File ke Sini</h3>
                            <p class="text-sm text-gray-500">Maksimal 2GB (Kalo server kita nggak batuk). <br> Format apa aja boleh, asal bukan virus mantan.</p>
                            <button class="mt-4 px-6 py-2 bg-[#1b1b18] text-white rounded-full font-medium hover:bg-gray-800 transition">
                                Pilih Dokumen (Pencet Aja)
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                        <div class="p-6 bg-white border border-[#e3e3e0] rounded-2xl shadow-[0px_1px_2px_0px_rgba(0,0,0,0.06)]">
                            <h4 class="font-bold text-red-600">⚡ Speed Kayak Siput</h4>
                            <p class="text-sm text-gray-600 mt-1">Sengaja diperlambat biar kamu bisa sambil ngopi atau nyuci motor dulu.</p>
                        </div>
                        <div class="p-6 bg-white border border-[#e3e3e0] rounded-2xl shadow-[0px_1px_2px_0px_rgba(0,0,0,0.06)]">
                            <h4 class="font-bold text-red-600">🔒 Keamanan "Janji"</h4>
                            <p class="text-sm text-gray-600 mt-1">Data kamu aman di database kita. Tapi kalau adminnya kepo, ya kita liat dikit.</p>
                        </div>
                        <div class="p-6 bg-white border border-[#e3e3e0] rounded-2xl shadow-[0px_1px_2px_0px_rgba(0,0,0,0.06)]">
                            <h4 class="font-bold text-red-600">🗑️ Hapus Otomatis</h4>
                            <p class="text-sm text-gray-600 mt-1">File hilang dalam 24 jam. Bukan karena fitur, tapi karena server kita sering penuh.</p>
                        </div>
                        <div class="p-6 bg-white border border-[#e3e3e0] rounded-2xl shadow-[0px_1px_2px_0px_rgba(0,0,0,0.06)]">
                            <h4 class="font-bold text-red-600">💰 Gratis (Tapi...)</h4>
                            <p class="text-sm text-gray-600 mt-1">Beneran gratis, cuma nanti tiap klik ada iklan "Mama Minta Pulsa" dikit ya.</p>
                        </div>
                    </div>
                </main>

                <footer class="mt-16 pb-10 text-center text-xs text-gray-400 uppercase tracking-widest">
                    &copy; 2026 Cloud-Sebelah Corp. | Built with Laravel 12 & Hope.
                </footer>
            </div>
        </div>
    </body>
</html>
