@extends('layouts.app')

@push('styles')
    <style>
        .swiper-button-next,
        .swiper-button-prev {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 44px;
            height: 44px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px;
            font-weight: bold;
            color: #1f2937;
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto px-6 py-16">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-gray-800 md:text-5xl">Semua Proyek Penanaman</h1>
            <p class="mt-4 text-lg text-gray-600">Jelajahi proyek kami yang sedang berjalan, lihat dampak yang telah selesai,
                dan nantikan program kami selanjutnya.</p>
        </div>

        <div class="mt-12 max-w-xl mx-auto">
            <form action="{{ route('projects.index') }}" method="GET"
                class="flex items-center shadow rounded-lg overflow-hidden">
                <input type="text" name="search" value="{{ $search ?? '' }}"
                    placeholder="Cari proyek berdasarkan judul atau lokasi..."
                    class="w-full px-5 py-4 text-gray-700 border-0 focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit"
                    class="px-6 py-4 bg-green-600 text-white font-bold hover:bg-green-700 focus:outline-none transition-colors">
                    Cari
                </button>
            </form>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Proyek Sedang Berjalan</h2>
            <div class="swiper active-projects-swiper relative">
                <div class="swiper-wrapper py-4">
                    @forelse ($activeProjects as $project)
                        <div class="swiper-slide">
                            @include('projects._project_card', ['project' => $project])
                        </div>
                    @empty
                        <p class="w-full text-center text-gray-500 py-12">Saat ini belum ada proyek yang aktif.</p>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Dampak Telah Tercipta</h2>
            <div class="swiper completed-projects-swiper relative">
                <div class="swiper-wrapper py-4">
                    @forelse ($completedProjects as $project)
                        <div class="swiper-slide">
                            @include('projects._project_card', ['project' => $project])
                        </div>
                    @empty
                        <p class="w-full text-center text-gray-500 py-12">Belum ada proyek yang selesai untuk ditampilkan.
                        </p>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Nantikan Proyek Berikutnya</h2>
            <div class="swiper pending-projects-swiper relative">
                <div class="swiper-wrapper py-4">
                    @forelse ($pendingProjects as $project)
                        <div class="swiper-slide">
                            @include('projects._project_card', ['project' => $project])
                        </div>
                    @empty
                        <p class="w-full text-center text-gray-500 py-12">Nantikan pembaruan proyek kami selanjutnya!</p>
                    @endforelse
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const swiperOptions = {
                loop: true,
                grabCursor: true,
                spaceBetween: 32,

                slidesPerView: 1,
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            };


            const activeSwiper = new Swiper('.active-projects-swiper', {
                ...swiperOptions,
                navigation: {
                    nextEl: '.active-projects-swiper .swiper-button-next',
                    prevEl: '.active-projects-swiper .swiper-button-prev',
                }
            });


            const completedSwiper = new Swiper('.completed-projects-swiper', {
                ...swiperOptions,
                navigation: {
                    nextEl: '.completed-projects-swiper .swiper-button-next',
                    prevEl: '.completed-projects-swiper .swiper-button-prev',
                }
            });


            const pendingSwiper = new Swiper('.pending-projects-swiper', {
                ...swiperOptions,
                navigation: {
                    nextEl: '.pending-projects-swiper .swiper-button-next',
                    prevEl: '.pending-projects-swiper .swiper-button-prev',
                }
            });
        });
    </script>
@endpush
