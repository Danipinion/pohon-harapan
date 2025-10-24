@extends('layouts.app')

@section('content')
    <div class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full bg-white shadow-2xl rounded-xl overflow-hidden">
            <div class="lg:grid lg:grid-cols-2">

                <div class="hidden lg:block relative">
                    <img class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1507041957456-9c397ce39c97?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=387"
                        alt="Tangan menangkup bibit pohon kecil">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 text-white">
                        <h2 class="text-3xl font-bold">Terima kasih, Donatur.</h2>
                        <p class="mt-2 text-gray-200">Satu langkah lagi untuk menumbuhkan harapan baru bagi bumi kita.</p>
                    </div>
                </div>

                <div class="p-8 md:p-12">
                    <h1 class="text-3xl font-bold text-gray-900 text-center lg:text-left">Instruksi Pembayaran</h1>
                    <p class="text-gray-600 mt-2 text-center lg:text-left">Selesaikan donasi Anda dalam 2 langkah mudah.</p>

                    @if (session('success'))
                        <div class="bg-green-100 text-green-800 p-4 rounded-lg my-6 text-sm flex items-start">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="mt-8">
                        <div class="flex items-center gap-3">
                            <span
                                class="bg-green-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">1</span>
                            <h2 class="text-xl font-semibold text-gray-800">Lakukan Transfer</h2>
                        </div>

                        <div class="mt-4 bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                            <p class="text-sm text-gray-600">Total donasi yang harus dibayar:</p>
                            <p class="text-4xl font-bold text-green-700 my-2 tracking-wider" id="donation-amount">
                                Rp {{ number_format($donation->amount, 0, ',', '.') }}
                            </p>
                            <p class="text-xs text-red-600 bg-red-50 p-2 rounded">
                                <strong>Penting:</strong> Mohon transfer sesuai nominal di atas untuk verifikasi otomatis.
                            </p>
                        </div>

                        <div class="mt-4 text-sm text-gray-700">
                            <p class="font-semibold text-center">Silakan transfer ke rekening berikut:</p>
                            <div class="mt-2 bg-gray-100 p-4 rounded-lg flex items-center justify-between">
                                <div>
                                    <p class="font-bold">Bank Central Asia (BCA)</p>
                                    <p>No. Rek: <span class="font-mono text-lg" id="account-number">1234567890</span></p>
                                    <p>a.n. Yayasan Pohon Harapan</p>
                                </div>
                                <button id="copy-btn"
                                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-bold py-2 px-3 rounded-md transition-colors">
                                    Salin
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="border-t my-8"></div>

                    @if ($donation->payment_proof)
                        <div class="bg-blue-50 p-6 rounded-lg text-center">
                            <svg class="w-16 h-16 text-blue-500 mx-auto mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="font-semibold text-blue-800">Bukti pembayaran telah diterima.</h3>
                            <p class="text-sm text-blue-700 mt-1">Tim kami akan segera melakukan verifikasi dalam 1x24 jam.
                                Terima kasih atas kebaikan Anda!</p>
                        </div>
                    @else
                        <div>
                            <div class="flex items-center gap-3">
                                <span
                                    class="bg-green-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold">2</span>
                                <h2 class="text-xl font-semibold text-gray-800">Unggah Bukti Pembayaran</h2>
                            </div>

                            <form action="{{ route('donations.uploadProof', $donation->id) }}" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                @csrf
                                <label for="payment_proof_input"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 relative overflow-hidden">

                                    <div id="placeholder-content"
                                        class="flex flex-col items-center justify-center pt-5 pb-6 text-center">
                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk
                                                memilih</span> atau seret file</p>
                                        <p class="text-xs text-gray-500">PNG atau JPG (MAX. 2MB)</p>
                                    </div>

                                    <img id="image-preview" src="" alt="Preview Bukti Pembayaran"
                                        class="absolute inset-0 w-full h-full object-cover hidden">

                                    <input id="payment_proof_input" name="payment_proof" type="file" class="hidden"
                                        required accept="image/png, image/jpeg" />
                                </label>
                                <p id="file-name" class="text-center text-sm mt-2 text-gray-600"></p>

                                <button type="submit"
                                    class="w-full mt-4 bg-green-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                                    Kirim & Selesaikan Donasi
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyBtn = document.getElementById('copy-btn');
            const accountNumber = document.getElementById('account-number').innerText;

            copyBtn.addEventListener('click', function() {
                navigator.clipboard.writeText(accountNumber).then(() => {
                    copyBtn.innerText = 'Disalin!';
                    setTimeout(() => {
                        copyBtn.innerText = 'Salin';
                    }, 2000);
                }).catch(err => {
                    console.error('Gagal menyalin:', err);
                });
            });

            const fileInput = document.getElementById('payment_proof_input');
            const fileNameDisplay = document.getElementById('file-name');
            const imagePreview = document.getElementById('image-preview');
            const placeholderContent = document.getElementById('placeholder-content');

            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    if (this.files && this.files.length > 0) {
                        const file = this.files[0];
                        fileNameDisplay.innerText = `File terpilih: ${file.name}`;

                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                imagePreview.classList.remove('hidden');
                                placeholderContent.classList.add('hidden');
                            }

                            reader.readAsDataURL(file);
                        } else {
                            imagePreview.src = '';
                            imagePreview.classList.add('hidden');
                            placeholderContent.classList.remove('hidden');
                            fileNameDisplay.innerText = 'File harus berupa gambar (PNG, JPG)';
                            fileInput.value = '';
                        }

                    } else {
                        fileNameDisplay.innerText = '';
                        imagePreview.src = '';
                        imagePreview.classList.add('hidden');
                        placeholderContent.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
@endpush
