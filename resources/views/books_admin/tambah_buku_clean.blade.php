@extends('layouts.panel')

@section('page-title', 'Tambah Buku')
@section('page-description', 'Form input buku yang lebih rapi, fokus, dan mudah diisi.')

@section('content')
    <div class="max-w-5xl mx-auto">
        <div class="rounded-[2rem] bg-white border border-slate-100 shadow-xl shadow-slate-200/60 p-6 sm:p-8 lg:p-10">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-8">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-slate-400">Form Admin</p>
                    <h3 class="mt-2 text-3xl font-black text-slate-900">Tambah Buku Baru</h3>
                    <p class="mt-3 text-slate-600">Masukkan data buku dengan tampilan form yang lebih bersih dan profesional.</p>
                </div>
                <a href="{{ route('admin.books.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3.5 text-sm font-semibold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-emerald-800">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="judul" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Judul Buku
                        </label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Masukkan judul buku">
                        @error('judul') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="penulis" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Penulis
                        </label>
                        <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Nama penulis">
                        @error('penulis') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="kategori" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Kategori
                        </label>
                        <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Contoh: Fiksi, Teknologi">
                        @error('kategori') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="tahun_terbit" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Tahun Terbit
                        </label>
                        <input type="number" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}" min="1901" max="{{ date('Y') + 1 }}" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="2025">
                        @error('tahun_terbit') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="penerbit" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Penerbit
                        </label>
                        <input type="text" id="penerbit" name="penerbit" value="{{ old('penerbit') }}"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Opsional">
                    </div>

                    <div>
                        <label for="isbn" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            ISBN
                        </label>
                        <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Opsional">
                        @error('isbn') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="stok" class="flex items-center gap-2 text-sm font-semibold text-slate-700 mb-3">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Stok
                        </label>
                        <input type="number" id="stok" name="stok" value="{{ old('stok', 1) }}" min="0" max="1000" required
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50/70 px-4 py-3.5 text-slate-900 outline-none transition focus:border-blue-400 focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="10">
                        @error('stok') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="rounded-[2rem] border border-dashed border-slate-200 bg-slate-50/70 p-6 sm:p-8">
                    <label class="block text-sm font-semibold text-slate-700 mb-3">Foto Cover Buku</label>
                    <div class="rounded-[1.5rem] border border-slate-200 bg-white px-6 py-10 text-center">
                        <input type="file" id="foto" name="foto" accept="image/*" required class="hidden">
                        <label for="foto" class="cursor-pointer block">
                            <div id="uploadIcon" class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-50 text-blue-600">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p id="uploadText" class="text-lg font-bold text-slate-900">Pilih file untuk cover</p>
                            <p class="mt-2 text-sm text-slate-500">Format gambar (JPG, PNG, GIF), maksimal 100 MB</p>
                            <p id="fileName" class="mt-4 text-sm font-medium text-slate-600"></p>
                        </label>
                        <div id="imagePreview" class="mt-4 hidden">
                            <img id="previewImg" class="mx-auto max-h-32 rounded-lg shadow-md" alt="Preview">
                        </div>
                        @error('foto') <p class="mt-4 text-sm text-rose-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="submit" id="submitBtn" class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-slate-900 px-6 py-4 font-semibold text-white transition-all duration-200 hover:bg-slate-800 hover:shadow-lg hover:scale-[1.02] active:scale-[0.98]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"></path>
                        </svg>
                        <span id="submitText">Simpan Buku</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    const input = document.getElementById('foto');
    const fileName = document.getElementById('fileName');
    const uploadIcon = document.getElementById('uploadIcon');
    const uploadText = document.getElementById('uploadText');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');

    if (input && fileName) {
        input.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                fileName.textContent = file.name;

                // Check if file is an image
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                        uploadIcon.classList.add('hidden');
                        uploadText.textContent = 'Ganti gambar';
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.classList.add('hidden');
                    uploadIcon.classList.remove('hidden');
                    uploadText.textContent = 'Pilih file untuk cover';
                }
            } else {
                fileName.textContent = '';
                imagePreview.classList.add('hidden');
                uploadIcon.classList.remove('hidden');
                uploadText.textContent = 'Pilih file untuk cover';
            }
        });
    }

    // Form submission loading state
    const form = document.querySelector('form');
    if (form && submitBtn && submitText) {
        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitText.textContent = 'Menyimpan...';
            submitBtn.innerHTML = `
                <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span id="submitText">Menyimpan...</span>
            `;
        });
    }
</script>
@endpush
