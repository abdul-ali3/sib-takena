<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIB-TAKENA | Takena Photo Studio Kota Kupang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans antialiased">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 bg-black/80 backdrop-blur-md border-b border-red-900/30">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center font-bold text-white">T</div>
                <span class="text-xl font-bold tracking-tight">TAKENA<span class="text-red-600">.</span></span>
            </div>
            <div class="hidden md:flex space-x-8 text-sm">
                <a href="#beranda" class="hover:text-red-500 transition">Beranda</a>
                <a href="#paket" class="hover:text-red-500 transition">Paket</a>
                <a href="#tentang" class="hover:text-red-500 transition">Tentang</a>
                <a href="#kontak" class="hover:text-red-500 transition">Kontak</a>
            </div>
            <div class="flex space-x-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 text-sm font-medium border border-red-600 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium border border-red-900/50 rounded-lg hover:border-red-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium bg-red-600 rounded-lg hover:bg-red-700 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="beranda" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black via-red-950/20 to-black"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-red-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-red-900/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
            <div class="inline-block px-4 py-1 mb-6 text-xs font-medium text-red-500 border border-red-900/50 rounded-full bg-red-950/30">
                PHOTO STUDIO KOTA KUPANG
            </div>
            <h1 class="text-6xl md:text-8xl font-bold tracking-tight mb-6">
                Abadikan <span class="text-red-600">Momen</span><br>
                Berhargamu
            </h1>
            <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                Takena Photo Studio menyediakan layanan pemotretan profesional dengan booking online yang mudah, jadwal pasti, dan hasil yang tak terlupakan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow-lg shadow-red-600/30">
                    Booking Sekarang
                </a>
                <a href="#paket" class="px-8 py-4 border border-red-900/50 text-white font-semibold rounded-lg hover:border-red-600 hover:text-red-500 transition">
                    Lihat Paket
                </a>
            </div>
        </div>
    </section>

    <!-- STATISTIK -->
    <section class="py-20 border-y border-red-900/20 bg-gradient-to-b from-black to-red-950/10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl md:text-5xl font-bold text-red-600 mb-2">-</div>
                <div class="text-sm text-gray-400">Klien Puas</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-red-600 mb-2">-</div>
                <div class="text-sm text-gray-400">Tahun Pengalaman</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-red-600 mb-2">-</div>
                <div class="text-sm text-gray-400">Sesi Pemotretan</div>
            </div>
            <div>
                <div class="text-4xl md:text-5xl font-bold text-red-600 mb-2">24/7</div>
                <div class="text-sm text-gray-400">Booking Online</div>
            </div>
        </div>
    </section>

    <!-- PAKET LAYANAN -->
    <section id="paket" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-block px-4 py-1 mb-4 text-xs font-medium text-red-500 border border-red-900/50 rounded-full bg-red-950/30">
                    LAYANAN KAMI
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Paket <span class="text-red-600">Pemotretan</span></h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Pilih paket yang sesuai dengan kebutuhanmu. Semua paket sudah termasuk fotografer profesional dan peralatan studio.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Paket 1 -->
                <div class="group p-8 border border-red-900/30 rounded-2xl bg-gradient-to-b from-red-950/10 to-black hover:border-red-600 transition">
                    <div class="text-sm text-red-500 font-medium mb-2">POPULER</div>
                    <h3 class="text-2xl font-bold mb-2">Prewedding</h3>
                    <p class="text-gray-400 text-sm mb-6">Abadikan momen indah sebelum hari pernikahanmu.</p>
                    <div class="text-3xl font-bold mb-6">Harga</div>
                    <ul class="space-y-3 text-sm text-gray-300 mb-8">
                        <li class="flex items-center"><span class="text-red-600 mr-2">✓</span> 1 Album Premium</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full py-3 text-center border border-red-600 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition">Pilih Paket</a>
                </div>

                <!-- Paket 2 -->
                <div class="group p-8 border border-red-900/30 rounded-2xl bg-gradient-to-b from-red-950/10 to-black hover:border-red-600 transition">
                    <div class="text-sm text-red-500 font-medium mb-2">FAVORIT</div>
                    <h3 class="text-2xl font-bold mb-2">Wisuda</h3>
                    <p class="text-gray-400 text-sm mb-6">Rayakan pencapaianmu dengan foto wisuda profesional.</p>
                    <div class="text-3xl font-bold mb-6">Harga</div>
                    <ul class="space-y-3 text-sm text-gray-300 mb-8">
                        <li class="flex items-center"><span class="text-red-600 mr-2">✓</span> 50 Foto Edit</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full py-3 text-center border border-red-600 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition">Pilih Paket</a>
                </div>

                <!-- Paket 3 -->
                <div class="group p-8 border border-red-900/30 rounded-2xl bg-gradient-to-b from-red-950/10 to-black hover:border-red-600 transition">
                    <div class="text-sm text-red-500 font-medium mb-2">KELUARGA</div>
                    <h3 class="text-2xl font-bold mb-2">Keluarga</h3>
                    <p class="text-gray-400 text-sm mb-6">Momen kebersamaan keluarga yang tak terlupakan.</p>
                    <div class="text-3xl font-bold mb-6">harga</div>
                    <ul class="space-y-3 text-sm text-gray-300 mb-8">
                        <li class="flex items-center"><span class="text-red-600 mr-2">✓</span> Max 6 Orang</li>
                    </ul>
                    <a href="{{ route('register') }}" class="block w-full py-3 text-center border border-red-600 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition">Pilih Paket</a>
                </div>
            </div>
        </div>
    </section>

    <!-- TENTANG KAMI -->
    <section id="tentang" class="py-24 border-t border-red-900/20 bg-gradient-to-b from-black to-red-950/10">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="inline-block px-4 py-1 mb-4 text-xs font-medium text-red-500 border border-red-900/50 rounded-full bg-red-950/30">
                    TENTANG KAMI
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">Studio <span class="text-red-600">Foto</span> di Kupang</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Takena Photo Studio telah melayani ratusan klien di Kota Kupang dan sekitarnya. Dengan tim fotografer berpengalaman dan peralatan modern, kami berkomitmen menghasilkan foto berkualitas tinggi untuk setiap momen pentingmu.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-red-600 font-bold">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Fotografer Berpengalaman</h4>
                            <p class="text-sm text-gray-400">Tim profesional dengan spesialisasi berbagai jenis pemotretan.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-red-600 font-bold">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">-</h4>
                            <p class="text-sm text-gray-400">-</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 bg-red-600/20 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                            <span class="text-red-600 font-bold">✓</span>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Harga Transparan</h4>
                            <p class="text-sm text-gray-400">Tidak ada biaya tersembunyi, sistem DP & pelunasan jelas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-square rounded-2xl bg-gradient-to-br from-red-600/20 to-red-900/10 border border-red-900/30 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-8xl font-bold text-red-600 mb-2">T</div>
                        <div class="text-xl font-semibold">TAKENA</div>
                        <div class="text-sm text-gray-400">PHOTO STUDIO</div>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-red-600/20 rounded-full blur-2xl"></div>
            </div>
        </div>
    </section>

    <!-- KONTAK -->
    <section id="kontak" class="py-24">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="inline-block px-4 py-1 mb-4 text-xs font-medium text-red-500 border border-red-900/50 rounded-full bg-red-950/30">
                HUBUNGI KAMI
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Siap Mengabadikan <span class="text-red-600">Momenmu?</span></h2>
            <p class="text-gray-400 mb-10 max-w-2xl mx-auto">
                Kunjungi studio kami atau hubungi melalui kontak di bawah ini untuk konsultasi dan booking.
            </p>
            <div class="grid md:grid-cols-3 gap-6 mb-10">
                <div class="p-6 border border-red-900/30 rounded-xl bg-red-950/10">
                    <div class="text-red-600 text-2xl mb-3">📍</div>
                    <h4 class="font-semibold mb-1">Alamat</h4>
                    <p class="text-sm text-gray-400">Kota Kupang, NTT</p>
                </div>
                <div class="p-6 border border-red-900/30 rounded-xl bg-red-950/10">
                    <div class="text-red-600 text-2xl mb-3"></div>
                    <h4 class="font-semibold mb-1">Telepon</h4>
                    <p class="text-sm text-gray-400">+62 812-XXXX-XXXX</p>
                </div>
                <div class="p-6 border border-red-900/30 rounded-xl bg-red-950/10">
                    <div class="text-red-600 text-2xl mb-3">✉️</div>
                    <h4 class="font-semibold mb-1">Email</h4>
                    <p class="text-sm text-gray-400">info@takena.com</p>
                </div>
            </div>
            <a href="{{ route('register') }}" class="inline-block px-10 py-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition shadow-lg shadow-red-600/30">
                Daftar & Booking Sekarang
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-8 border-t border-red-900/20 bg-black">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <div class="flex items-center space-x-2 mb-4 md:mb-0">
                <div class="w-6 h-6 bg-red-600 rounded-full flex items-center justify-center text-xs font-bold">T</div>
                <span>© 2026 Takena Photo Studio. All rights reserved.</span>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-red-500 transition">Instagram</a>
                <a href="#" class="hover:text-red-500 transition">Facebook</a>
                <a href="#" class="hover:text-red-500 transition">TikTok</a>
            </div>
        </div>
    </footer>

</body>
</html>