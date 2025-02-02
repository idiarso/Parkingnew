<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Parkir RSI Banjarnegara</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .animate-on-scroll {
            visibility: hidden;
        }
        .animate-on-scroll.animated {
            visibility: visible;
            animation: fadeInUp 0.6s ease-out forwards;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .bg-gradient {
            background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-lg sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-800">Sistem Parkir RSI</h1>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900 transition duration-150">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-150">Log in</a>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
<!-- Untuk background hero section -->
<style>
    .bg-gradient {
        background-image: linear-gradient(135deg, rgba(14, 165, 233, 0.9), rgba(3, 105, 161, 0.9)), url('{{ asset('assets/images/backgrounds/hospital.jpg') }}');
        background-size: cover;
        background-position: center;
    }
</style>
        <!-- Hero Section -->
        <div class="bg-gradient py-16 fade-in">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center text-white">
                    <h2 class="text-4xl font-extrabold sm:text-5xl">
                        Selamat Datang di Sistem Parkir RSI Banjarnegara
                    </h2>
                    <p class="mt-4 max-w-2xl text-xl opacity-90 lg:mx-auto">
                        Sistem manajemen parkir modern untuk kemudahan dan keamanan kendaraan Anda
                    </p>
                </div>
            </div>
        </div>

        <!-- Features Grid -->
        <div class="py-16 animate-on-scroll">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Features cards with hover effects -->
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition duration-300 hover:shadow-xl">
                        <div class="px-6 py-8">
                            <h3 class="text-xl font-semibold text-gray-900">Manajemen Parkir Real-time</h3>
                            <p class="mt-3 text-gray-500">
                                Monitoring kapasitas dan status parkir secara real-time
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition duration-300 hover:shadow-xl">
                        <div class="px-6 py-8">
                            <h3 class="text-xl font-semibold text-gray-900">Sistem Pembayaran Modern</h3>
                            <p class="mt-3 text-gray-500">
                                Pembayaran parkir yang cepat dan aman
                            </p>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-lg rounded-lg transition duration-300 hover:shadow-xl">
                        <div class="px-6 py-8">
                            <h3 class="text-xl font-semibold text-gray-900">Laporan & Analitik</h3>
                            <p class="mt-3 text-gray-500">
                                Laporan detail untuk analisis dan pengambilan keputusan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parking Areas Section -->
        <div class="py-16 bg-white animate-on-scroll">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">Area Parkir Rumah Sakit</h2>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Informasi lokasi dan kapasitas area parkir RSI
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Parking area cards with hover effects -->
                    <div class="bg-gray-50 rounded-lg p-8 shadow-md transition duration-300 hover:shadow-xl">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Area Parkir Utama</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center"><span class="mr-2">•</span> Kapasitas: 200 Mobil</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Lokasi: Depan Gedung Utama</li>
                            <li class="flex items-center"><span class="mr-2">•</span> 24 Jam Operasional</li>
                            <li class="flex items-center"><span class="mr-2">•</span> CCTV Security</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-8 shadow-md transition duration-300 hover:shadow-xl">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Area Parkir Motor</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center"><span class="mr-2">•</span> Kapasitas: 500 Motor</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Lokasi: Samping Gedung</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Atap Tertutup</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Petugas 24 Jam</li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-8 shadow-md transition duration-300 hover:shadow-xl">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Area Parkir VIP</h3>
                        <ul class="space-y-3 text-gray-600">
                            <li class="flex items-center"><span class="mr-2">•</span> Kapasitas: 50 Mobil</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Lokasi: Basement</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Valet Service</li>
                            <li class="flex items-center"><span class="mr-2">•</span> Premium Security</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-white border-t">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Sistem Parkir RSI Banjarnegara. All rights reserved.
                </p>
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initial animation for hero section
            setTimeout(() => {
                document.querySelector('.fade-in').classList.add('visible');
            }, 100);

            // Scroll animations
            const animateElements = document.querySelectorAll('.animate-on-scroll');
            
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            animateElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>