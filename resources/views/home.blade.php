@extends('layouts.app')

@push('styles')
    <style>
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endpush


@section('content')
    <div class="relative bg-gray-800 text-white overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80"
                alt="Hutan yang rimbun dan hijau" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-black opacity-60"></div>
        </div>

        <div class="relative container mx-auto px-6 py-24 md:py-32 text-center">
            <div class="reveal-on-scroll">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight text-white">
                    Satu Pohon, Harapan untuk Bumi
                </h1>
                <p class="mt-4 text-lg md:text-xl text-green-100 max-w-3xl mx-auto">
                    Bergabunglah dalam aksi nyata untuk melawan perubahan iklim, memulihkan ekosistem, dan menciptakan masa
                    depan yang lebih hijau.
                </p>
                <a href="{{ route('projects.index') }}"
                    class="mt-8 inline-block bg-green-500 text-white font-bold py-3 px-10 rounded-full hover:bg-green-400 transition-transform duration-300 transform hover:scale-105 shadow-lg">
                    Donasi Sekarang
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white p-8 rounded-xl shadow-lg reveal-on-scroll">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-green-100 rounded-full mb-4">
                        <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>
                    <h3 class="text-5xl font-bold text-green-600" data-target="{{ $totalTreesPlanted }}">0</h3>
                    <p class="mt-2 text-gray-600 font-medium">Pohon Telah Tertanam</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg reveal-on-scroll" style="transition-delay: 150ms;">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-green-100 rounded-full mb-4">
                        <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-4.663l.001.109m-8.381 3.268a4.125 4.125 0 01-7.532-2.494" />
                        </svg>
                    </div>
                    <h3 class="text-5xl font-bold text-green-600" data-target="{{ $totalDonors }}">0</h3>
                    <p class="mt-2 text-gray-600 font-medium">Donatur Berpartisipasi</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg reveal-on-scroll" style="transition-delay: 300ms;">
                    <div class="flex items-center justify-center h-16 w-16 mx-auto bg-green-100 rounded-full mb-4">
                        <svg class="h-8 w-8 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 15a4.5 4.5 0 004.5 4.5H18a3.75 3.75 0 001.332-7.257 3 3 0 00-3.758-3.848 5.25 5.25 0 00-10.233 2.33A4.5 4.5 0 002.25 15z" />
                        </svg>
                    </div>
                    <h3 class="text-5xl font-bold text-green-600" data-target="{{ $totalTreesPlanted * 25 }}">0</h3>
                    <p class="mt-2 text-gray-600 font-medium">Estimasi CO₂ Terserap/Tahun (kg)</p>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white py-16 sm:py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Dukung Proyek Mendesak Kami</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Donasi Anda sangat berarti untuk keberhasilan proyek-proyek
                    yang sedang berjalan ini.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($activeProjects as $project)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300 reveal-on-scroll">
                        <a href="{{ route('projects.show', $project->slug) }}" class="block">
                            <img class="h-56 w-full object-cover"
                                src="https://picsum.photos/seed/{{ $project->id }}/600/400"
                                alt="Foto Proyek {{ $project->title }}">
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <a href="{{ $project->location }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-800 transition-colors">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                Lihat Lokasi
                            </a>
                            <h3 class="text-xl font-bold mt-2 mb-2 text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm h-16 flex-grow">
                                {{ Str::limit($project->short_description, 120) }}</p>
                            <div class="mt-6">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="inline-block bg-green-600 text-white font-semibold py-2 px-5 rounded-lg hover:bg-green-700 transition-colors duration-300">
                                    Dukung Proyek Ini
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 py-12">Saat ini belum ada proyek yang aktif.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 sm:py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Lihat Dampak yang Telah Kita Ciptakan</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Berkat dukungan Anda, proyek-proyek ini telah berhasil
                    diselesaikan dan memberikan manfaat nyata.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($completedProjects as $project)
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300 reveal-on-scroll">
                        <div class="relative">
                            <a href="{{ route('projects.show', $project->slug) }}" class="block">
                                <img class="h-56 w-full object-cover"
                                    src="https://picsum.photos/seed/{{ $project->id }}/600/400"
                                    alt="Foto Proyek {{ $project->title }}">
                            </a>
                            <span
                                class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                SELESAI
                            </span>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <a href="{{ $project->location }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center text-sm font-semibold text-green-600 hover:text-green-800 transition-colors">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                Lihat Lokasi
                            </a>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm h-16 flex-grow">
                                {{ Str::limit($project->short_description, 120) }}</p>
                            <div class="mt-6">
                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="inline-block bg-gray-800 text-white font-semibold py-2 px-5 rounded-lg hover:bg-gray-700 transition-colors duration-300">
                                    Lihat Hasil Proyek
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 py-12">Belum ada proyek yang selesai.</p>
                @endforelse
            </div>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 reveal-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Nantikan Proyek Berikutnya</h2>
                <p class="mt-2 text-gray-600 max-w-2xl mx-auto">Kami sedang mempersiapkan proyek penanaman baru di
                    lokasi-lokasi yang membutuhkan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($pendingProjects as $project)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col reveal-on-scroll">
                        <div class="relative">
                            <img class="h-56 w-full object-cover filter grayscale"
                                src="https://picsum.photos/seed/{{ $project->id }}/600/400"
                                alt="Foto Proyek {{ $project->title }}">
                            <div class="absolute inset-0 bg-gray-700/60 flex items-center justify-center">
                                <span class="text-white text-2xl font-bold tracking-widest">SEGERA HADIR</span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <span class="text-sm font-semibold text-gray-500">
                                Lokasi Segera Diumumkan
                            </span>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $project->title }}</h3>
                            <p class="text-gray-600 text-sm h-16 flex-grow">
                                {{ Str::limit($project->short_description, 120) }}</p>
                            <div class="mt-6">
                                <button disabled
                                    class="w-full inline-block bg-gray-300 text-gray-500 font-semibold py-2 px-5 rounded-lg cursor-not-allowed">
                                    Nantikan
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-3 text-center text-gray-500 py-12">Nantikan pembaruan proyek kami selanjutnya!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.reveal-on-scroll').forEach(el => {
                observer.observe(el);
            });

            const counters = document.querySelectorAll('h3[data-target]');
            const speed = 200;
            const animateCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const inc = Math.max(Math.floor(target / speed), 1);

                if (count < target) {
                    counter.innerText = Math.min(count + inc, target).toLocaleString('id-ID');
                    setTimeout(() => animateCounter(counter), 10);
                } else {
                    counter.innerText = target.toLocaleString('id-ID');
                }
            };

            const counterObserver = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        });
    </script>
@endpush
