@extends('layouts.app')

@section('content')
    <div>
        <div class="relative h-64 md:h-80 bg-gray-800">
            <img src="https://picsum.photos/seed/{{ $project->id }}/1200/400" alt="Banner Proyek {{ $project->title }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-6">
                    <a href="{{ $project->location }}" target="_blank" rel="noopener noreferrer"
                        class="bg-green-600 px-3 py-1 text-sm font-semibold rounded-full hover:bg-green-500 transition-colors inline-flex items-center gap-1">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        Lihat Lokasi
                    </a>
                    <h1 class="text-3xl md:text-5xl font-extrabold mt-4">{{ $project->title }}</h1>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                <div class="lg:col-span-2">
                    <p class="text-gray-600 mb-8 border-b pb-4">
                        Bermitra dengan: <span class="font-semibold text-gray-800">{{ $project->partner_name }}</span>
                    </p>

                    <div class="prose max-w-none text-gray-700 leading-relaxed">
                        {!! \Filament\Forms\Components\RichEditor\RichContentRenderer::make($project->body)->toHtml() !!}
                    </div>

                    <h2 class="text-3xl font-bold mt-16 mb-6 text-gray-800">Pahlawan Penghijauan</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <ol class="space-y-4">
                            @forelse($topDonors as $donor)
                                <li
                                    class="flex items-center justify-between gap-4 p-3 rounded-md {{ $loop->first ? 'bg-yellow-50' : '' }}">
                                    <div class="flex items-center gap-4">
                                        <span class="font-bold text-lg text-gray-400 w-6">
                                            @if ($loop->iteration == 1)
                                                🥇
                                            @elseif($loop->iteration == 2)
                                                🥈
                                            @elseif($loop->iteration == 3)
                                                🥉
                                            @else
                                                {{ $loop->iteration }}.
                                            @endif
                                        </span>
                                        <span class="font-semibold text-gray-800">{{ $donor->donor_name }}</span>
                                    </div>
                                    <span class="font-bold text-green-600">Rp
                                        {{ number_format($donor->total_donation, 0, ',', '.') }}</span>
                                </li>
                            @empty
                                <p class="text-center text-gray-500 py-4">Jadilah donatur pertama untuk proyek ini!</p>
                            @endforelse
                        </ol>
                    </div>

                    <div x-data="{
                        showModal: false,
                        modalTitle: '',
                        modalDate: '',
                        modalDescription: ''
                    }" class="mt-16">

                        <h3 class="text-3xl font-bold mb-6 text-gray-800">Pembaruan Proyek</h3>

                        <div class="mt-6 space-y-4">
                            @forelse($project->projectUpdates as $update)
                                <div
                                    class="flex items-center justify-between p-5 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <div>
                                        <h4 class="text-lg font-bold text-gray-900">{{ $update->title }}</h4>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $update->created_at->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                    <button
                                        @click="
                                            showModal = true;
                                            modalTitle = @js($update->title);
                                            modalDate = @js($update->created_at->translatedFormat('d F Y \p\u\k\u\l H:i'));
                                            modalDescription = @js($update->content);
                                        "
                                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
                                        Lihat
                                    </button>
                                </div>
                            @empty
                                <div class="p-6 text-center bg-white border border-gray-200 rounded-lg">
                                    <p class="text-gray-500">Belum ada pembaruan untuk proyek ini.</p>
                                </div>
                            @endforelse
                        </div>

                        <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-60"
                            style="display: none;">

                            <div @click.outside="showModal = false"
                                class="w-full max-w-2xl bg-white rounded-lg shadow-xl flex flex-col max-h-[90vh]">

                                <div class="p-5 border-b flex-shrink-0">
                                    <h3 class="text-xl font-semibold text-gray-900 text-center" x-text="modalTitle">
                                    </h3>
                                </div>
                                <div class="p-6 overflow-y-auto">
                                    <p class="mb-4 text-sm text-gray-500" x-text="'Dipublikasikan pada ' + modalDate"></p>
                                    <div class="prose prose-lg text-gray-600 max-w-none" x-html="modalDescription"></div>
                                </div>

                                <div class="px-6 py-4 bg-gray-50 text-right flex-shrink-0">
                                    <button @click="showModal = false"
                                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-xl p-6 sticky top-28">
                        <div class="mb-6">
                            <div class="flex justify-between mb-1">
                                <span class="text-base font-medium text-green-700">Terkumpul</span>
                                <span
                                    class="text-sm font-medium text-green-700">{{ min(round($progressPercentage), 100) }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-green-600 h-3 rounded-full"
                                    style="width: {{ min(round($progressPercentage), 100) }}%">
                                </div>
                            </div>
                            <div class="flex justify-between text-sm mt-2 font-semibold">
                                <span>{{ number_format($totalTrees, 0, ',', '.') }} Pohon</span>
                                <span class="text-gray-500">Target:
                                    {{ number_format($project->target_trees, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 text-sm">
                            <h4 class="font-bold text-green-800">Dampak Iklim</h4>
                            <p class="text-green-700">Donasi terkumpul berpotensi menyerap <strong
                                    class="font-extrabold">{{ number_format($co2AbsorptionPerYear, 0, ',', '.') }} kg
                                    CO₂</strong> per tahun.</p>
                        </div>
                        @if ($project->status == 'active')
                            <h3 class="text-xl font-bold mb-4 text-gray-800">Dukung Proyek Ini</h3>
                            @if (session('error'))
                                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">{{ session('error') }}</div>
                            @endif

                            <form action="{{ route('donations.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">

                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" id="name" required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Alamat
                                        Email</label>
                                    <input type="email" name="email" id="email" required
                                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                                </div>

                                <div class="mb-4">
                                    <label for="amount_display" class="block text-sm font-medium text-gray-700">Jumlah
                                        Donasi</label>
                                    <div class="relative mt-1">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">Rp</span>
                                        <input type="text" id="amount_display"
                                            class="block w-full pl-9 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500"
                                            placeholder="50.000">
                                    </div>
                                    <input type="hidden" name="amount" id="amount" required>
                                </div>

                                <div class="grid grid-cols-3 gap-2 mb-6">
                                    <button type="button"
                                        class="donation-preset border rounded-md py-2 text-sm hover:bg-green-100"
                                        data-amount="25000">25rb</button>
                                    <button type="button"
                                        class="donation-preset border rounded-md py-2 text-sm hover:bg-green-100"
                                        data-amount="50000">50rb</button>
                                    <button type="button"
                                        class="donation-preset border rounded-md py-2 text-sm hover:bg-green-100"
                                        data-amount="100000">100rb</button>
                                </div>

                                <button type="submit"
                                    class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-lg">
                                    Lanjutkan Pembayaran
                                </button>
                            </form>
                        @else
                            <div class="bg-green-50 text-center p-6 rounded-lg">
                                <svg class="w-16 h-16 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="font-semibold text-green-800">Proyek Telah Selesai!</h3>
                                <p class="text-sm text-green-700 mt-1">Terima kasih atas dukungan Anda. Lihat proyek aktif
                                    lainnya untuk terus berkontribusi.</p>
                                <a href="{{ route('projects.index') }}"
                                    class="mt-4 inline-block bg-green-600 text-white font-semibold py-2 px-4 rounded-lg text-sm hover:bg-green-700">Lihat
                                    Proyek Lain</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/imask"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const amountDisplay = document.getElementById('amount_display');
            const amountHidden = document.getElementById('amount');


            const currencyMask = IMask(amountDisplay, {
                mask: Number,
                min: 10000,
                max: 100000000,
                thousandsSeparator: '.'
            });


            currencyMask.on('accept', function() {
                amountHidden.value = currencyMask.unmaskedValue;
            });


            const presetButtons = document.querySelectorAll('.donation-preset');
            presetButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const amount = this.dataset.amount;

                    currencyMask.value = amount;
                });
            });
        });
    </script>
@endpush
