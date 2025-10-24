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
    <div class="relative bg-gray-800 text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1518837695005-2083093ee35b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                alt="Tim relawan menanam pohon bersama" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-black opacity-60"></div>
        </div>
        <div class="relative container mx-auto px-6 py-24 md:py-32 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                Menumbuhkan Harapan, Satu Pohon Sekaligus
            </h1>
            <p class="mt-4 text-lg md:text-xl text-green-100 max-w-3xl mx-auto">
                Mengenal lebih dekat misi, tim, dan cerita di balik gerakan PohonHarapan.
            </p>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="reveal-on-scroll">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Misi Kami</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Misi kami adalah memobilisasi aksi kolektif untuk restorasi ekosistem daratan, melawan perubahan
                        iklim, dan memberdayakan komunitas lokal melalui program penanaman pohon yang transparan dan
                        berkelanjutan.
                    </p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Visi Kami</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kami memimpikan sebuah dunia di mana hutan Indonesia kembali rimbun, keanekaragaman hayati
                        terlindungi, dan setiap individu memiliki kesadaran serta kesempatan untuk berkontribusi pada
                        kelestarian bumi untuk generasi mendatang.
                    </p>
                </div>
                <div class="reveal-on-scroll">
                    <img src="https://images.unsplash.com/photo-1724754413206-8592feff56dc?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1480"
                        alt="Tunas pohon di tanah" class="rounded-lg shadow-xl w-full h-auto">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-green-700">
        <div class="container mx-auto px-6 py-20 text-center text-white">
            <h2 class="text-3xl md:text-4xl font-bold leading-tight">Jadilah Bagian dari Perubahan</h2>
            <p class="mt-4 text-lg text-green-200 max-w-2xl mx-auto">Aksi sekecil apa pun akan berdampak besar jika
                dilakukan bersama. Dukung salah satu proyek kami dan jadilah pahlawan bagi bumi.</p>
            <a href="{{ route('projects.index') }}"
                class="mt-8 inline-block bg-white text-green-700 font-bold py-3 px-10 rounded-full hover:bg-gray-200 transition-transform duration-300 transform hover:scale-105 shadow-lg">
                Lihat Proyek Penanaman
            </a>
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
        });
    </script>
@endpush
