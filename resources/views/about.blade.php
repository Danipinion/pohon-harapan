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

    <div class="bg-gray-50 py-16 sm:py-24">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Perjalanan Kami</h2>
                <p class="mt-4 text-gray-600">Dari sebuah ide kecil hingga menjadi gerakan yang berdampak, inilah beberapa
                    tonggak sejarah perjalanan PohonHarapan.</p>
            </div>
            <div class="relative border-l-2 border-green-500 space-y-12 pl-6 max-w-3xl mx-auto">
                <div class="relative reveal-on-scroll">
                    <div class="absolute -left-7 top-1 h-3 w-3 bg-green-500 rounded-full ring-8 ring-gray-50"></div>
                    <h3 class="font-bold text-xl text-gray-800">2023 - Lahirnya Ide</h3>
                    <p class="mt-1 text-gray-600">Berawal dari keprihatinan terhadap laju deforestasi, sekelompok pemuda
                        menggagas platform donasi pohon yang mudah diakses dan transparan.</p>
                </div>
                <div class="relative reveal-on-scroll">
                    <div class="absolute -left-7 top-1 h-3 w-3 bg-green-500 rounded-full ring-8 ring-gray-50"></div>
                    <h3 class="font-bold text-xl text-gray-800">2024 - Proyek Perdana</h3>
                    <p class="mt-1 text-gray-600">Proyek penanaman pertama berhasil diluncurkan di kawasan hutan
                        terdegradasi di Jawa Barat, menanam 1.000 pohon pertama berkat dukungan donatur awal.</p>
                </div>
                <div class="relative reveal-on-scroll">
                    <div class="absolute -left-7 top-1 h-3 w-3 bg-green-500 rounded-full ring-8 ring-gray-50"></div>
                    <h3 class="font-bold text-xl text-gray-800">2025 - Menjangkau 10.000 Pohon</h3>
                    <p class="mt-1 text-gray-600">Melalui berbagai kampanye dan kolaborasi, total 10.000 pohon berhasil
                        ditanam di 5 lokasi proyek berbeda di seluruh Indonesia.</p>
                </div>
                <div class="relative reveal-on-scroll">
                    <div class="absolute -left-7 top-1 h-3 w-3 bg-green-500 rounded-full ring-8 ring-gray-50"></div>
                    <h3 class="font-bold text-xl text-gray-800">Masa Depan - Hutan Harapan</h3>
                    <p class="mt-1 text-gray-600">Kami terus berkomitmen untuk memperluas dampak, berinovasi dalam teknologi
                        monitoring, dan memberdayakan lebih banyak komunitas penjaga hutan.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">Di Balik Gerakan Ini</h2>
                <p class="mt-4 text-gray-600">Kami adalah tim yang terdiri dari para pegiat lingkungan, teknolog, dan
                    kreator yang bersatu untuk satu tujuan: menghijaukan kembali Indonesia.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center reveal-on-scroll">
                    <img class="mx-auto h-32 w-32 rounded-full object-cover shadow-lg" src="https://i.pravatar.cc/150?img=1"
                        alt="Foto Anggota Tim 1">
                    <h3 class="mt-4 text-xl font-bold text-gray-800">Budi Santoso</h3>
                    <p class="text-green-600 font-semibold">Founder & Koordinator Program</p>
                    <p class="mt-2 text-sm text-gray-500">"Setiap pohon adalah warisan. Mari kita ciptakan warisan terbaik
                        untuk anak cucu kita."</p>
                </div>
                <div class="text-center reveal-on-scroll" style="transition-delay: 150ms;">
                    <img class="mx-auto h-32 w-32 rounded-full object-cover shadow-lg" src="https://i.pravatar.cc/150?img=2"
                        alt="Foto Anggota Tim 2">
                    <h3 class="mt-4 text-xl font-bold text-gray-800">Citra Lestari</h3>
                    <p class="text-green-600 font-semibold">Ahli Kehutanan & Mitra Komunitas</p>
                    <p class="mt-2 text-sm text-gray-500">"Menanam pohon bukan hanya soal lingkungan, tapi juga tentang
                        membangun kesejahteraan bersama masyarakat."</p>
                </div>
                <div class="text-center reveal-on-scroll" style="transition-delay: 300ms;">
                    <img class="mx-auto h-32 w-32 rounded-full object-cover shadow-lg" src="https://i.pravatar.cc/150?img=3"
                        alt="Foto Anggota Tim 3">
                    <h3 class="mt-4 text-xl font-bold text-gray-800">Ahmad Riyadi</h3>
                    <p class="text-green-600 font-semibold">Pengembang Teknologi</p>
                    <p class="mt-2 text-sm text-gray-500">"Kami menggunakan teknologi untuk memastikan setiap donasi Anda
                        benar-benar menjadi pohon yang tumbuh."</p>
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
