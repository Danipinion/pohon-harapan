<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PohonHarapan</title>
    <link rel="icon" type="image/jpg" href="{{ asset('images/logo.jpg') }}">

    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.19/src/index.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .navbar-scrolled {
            background-color: white;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        }

        .nav-link-active {
            color: #16a34a;
            font-weight: 600;
        }
    </style>

    @push('styles')
        <style>
            #page-loader {
                opacity: 1;
                filter: blur(0px);
                transition: opacity 0.5s cubic-bezier(0.4, 0, 0.2, 1), filter 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 100;
            }

            #page-loader.is-loaded {
                opacity: 0;
                filter: blur(30px);
                pointer-events: none;
            }

            #page-loader.is-leaving {
                transition: none;
                opacity: 0;
                filter: blur(30px);
            }

            #progress-bar {}
        </style>
    @endpush
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-800 antialiased">
    <div id="page-loader" class="fixed inset-0 z-[100] flex items-center justify-center bg-green-600">
        <div class="w-full max-w-xs text-center">
            <div id="progress-text" class="text-4xl font-bold text-white mb-3" style="font-family: monospace;">0%</div>
            <div id="progress-bar-container" class="w-full bg-white/20 rounded-full h-2.5">
                <div id="progress-bar" class="bg-white h-2.5 rounded-full" style="width: 0%"></div>
            </div>
        </div>
    </div>
    <nav x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = (window.scrollY > 50)"
        :class="{ 'navbar-scrolled text-gray-800': scrolled, 'text-white': !scrolled }"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="font-bold text-2xl flex items-center gap-2">
                <img src="{{ asset('images/logo.jpg') }}" alt="logo"
                    :class="{ 'w-12 h-12': scrolled, 'hidden': !scrolled }">
                <span :class="{ 'text-green-700': scrolled, 'text-white': !scrolled }">PohonHarapan</span>
            </a>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ url('/') }}"
                    class="py-2 transition-colors duration-300 hover:text-green-500 {{ request()->is('/') ? 'nav-link-active' : '' }}">Beranda</a>
                <a href="{{ route('projects.index') }}"
                    class="py-2 transition-colors duration-300 hover:text-green-500 {{ request()->routeIs('projects.*') ? 'nav-link-active' : '' }}">Proyek</a>
                <a href="{{ route('about') }}" class="py-2 transition-colors duration-300 hover:text-green-500">Tentang
                    Kami</a>
                <a href="{{ route('donations.random') }}"
                    :class="{
                        'bg-white text-green-700 hover:bg-gray-200': scrolled,
                        'bg-green-500 hover:bg-green-400': !
                            scrolled
                    }"
                    class="ml-4 font-bold py-2 px-5 rounded-full transition-all duration-300">
                    Donasi
                </a>
            </div>

            <div class="md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="md:hidden bg-white shadow-lg text-gray-800">
            <a href="{{ url('/') }}"
                class="block px-6 py-3 hover:bg-gray-100 {{ request()->is('/') ? 'nav-link-active' : '' }}">Beranda</a>
            <a href="{{ route('projects.index') }}"
                class="block px-6 py-3 hover:bg-gray-100 {{ request()->routeIs('projects.*') ? 'nav-link-active' : '' }}">Proyek</a>
            <a href="{{ route('about') }}" class="block px-6 py-3 hover:bg-gray-100">Tentang Kami</a>
            <div class="px-6 py-4">
                <a href="{{ route('donations.random') }}"
                    class="block text-center w-full bg-green-600 text-white font-bold py-2 px-5 rounded-full hover:bg-green-700 transition duration-300">
                    Donasi Sekarang
                </a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>


    <footer class="bg-gray-900 text-gray-300 pt-16 pb-8">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="font-bold text-2xl text-white mb-4">PohonHarapan</h3>
                    <p class="text-gray-400 max-w-md">
                        Sebuah gerakan kolektif untuk restorasi hutan dan pemberdayaan komunitas melalui donasi pohon,
                        sejalan dengan Tujuan Pembangunan Berkelanjutan.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4">Tautan</h4>
                    <ul>
                        <li class="mb-2"><a href="{{ route('projects.index') }}"
                                class="hover:text-green-400 transition-colors">Proyek Penanaman</a></li>
                        <li class="mb-2"><a href="{{ route('about') }}"
                                class="hover:text-green-400 transition-colors">Tentang
                                Kami</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-green-400 transition-colors">FAQ</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-green-400 transition-colors">Kontak</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-white mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.08 2.525c.636-.247 1.363-.416 2.427-.465C9.53 2.013 9.884 2 12.315 2zM12 7a5 5 0 100 10 5 5 0 000-10zm0-2a7 7 0 110 14 7 7 0 010-14zm6.406-2.186a1.2 1.2 0 100 2.4 1.2 1.2 0 000-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-gray-700 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} PohonHarapan. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('page-loader');
            const progressText = document.getElementById('progress-text');
            const progressBar = document.getElementById('progress-bar');

            const animationHalfDuration = 250;
            const fadeDuration = 500;
            const pauseBeforeAction = 100;
            const progressTransition = 'width 0.05s linear';


            function runProgressAnimation(startPercent, endPercent, onComplete) {
                let progress = startPercent;
                const totalSteps = endPercent - startPercent;
                if (totalSteps <= 0) {
                    if (onComplete) onComplete();
                    return;
                }

                const intervalTime = animationHalfDuration / totalSteps;


                if (progressText) progressText.innerText = `${progress}%`;
                if (progressBar) {
                    progressBar.style.transition = progressTransition;
                    progressBar.style.width = `${progress}%`;
                }

                const interval = setInterval(() => {
                    progress++;
                    if (progressText) progressText.innerText = `${progress}%`;
                    if (progressBar) progressBar.style.width = `${progress}%`;

                    if (progress >= endPercent) {
                        clearInterval(interval);
                        if (onComplete) {
                            setTimeout(onComplete, pauseBeforeAction);
                        }
                    }
                }, intervalTime);
            }

            if (progressText) progressText.innerText = `50%`;
            if (progressBar) {
                progressBar.style.transition = 'none';
                progressBar.style.width = `50%`;
            }


            progressBar.offsetHeight;

            runProgressAnimation(50, 100, () => {
                if (loader) loader.classList.add('is-loaded');
            });

            document.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    const target = this.getAttribute('target');

                    if (href && !href.startsWith('#') && !href.startsWith('mailto:') && !href
                        .startsWith('tel:') && target !== '_blank' && !href.startsWith(
                            'javascript:')) {

                        e.preventDefault();

                        if (progressText) progressText.innerText = '0%';
                        if (progressBar) {
                            progressBar.style.transition = 'none';
                            progressBar.style.width = '0%';
                        }

                        if (loader) {
                            loader.classList.add('is-leaving');
                            loader.classList.remove('is-loaded');

                            loader.offsetHeight;


                            loader.style.transition =
                                `opacity ${fadeDuration}ms cubic-bezier(0.4, 0, 0.2, 1), filter ${fadeDuration}ms cubic-bezier(0.4, 0, 0.2, 1)`;


                            loader.classList.remove('is-leaving');
                        }


                        runProgressAnimation(0, 50, () => {
                            window.location.href = href;
                        });
                    }
                });
            });
        });


        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                const loader = document.getElementById('page-loader');
                const progressText = document.getElementById('progress-text');
                const progressBar = document.getElementById('progress-bar');


                if (loader) {
                    loader.style.transition = 'none';
                    loader.classList.add('is-loaded');
                }

                if (progressText) progressText.innerText = '100%';
                if (progressBar) {
                    progressBar.style.transition = 'none';
                    progressBar.style.width = '100%';
                }
            }
        });
    </script>
</body>

</html>
