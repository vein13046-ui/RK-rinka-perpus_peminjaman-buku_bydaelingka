<div class="space-y-8">
    <div class="rounded-[2rem] bg-white border border-slate-100 shadow-xl shadow-slate-200/60 p-8 sm:p-10 animate-fade-in-up hover-lift hover-glow">
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.24em] text-slate-400 animate-fade-in-left">Dashboard Admin</p>
                <h3 class="mt-3 text-3xl sm:text-4xl font-black tracking-tight text-slate-900 animate-fade-in-left animate-delay-1s">Kelola perpustakaan dengan tampilan yang bersih dan fokus.</h3>
                <p class="mt-4 text-slate-600 leading-relaxed animate-fade-in-left animate-delay-2s">
                    Semua ringkasan penting ditampilkan dengan hierarki visual yang jelas, sehingga lebih mudah dipantau dan lebih enak dipakai setiap hari.
                </p>
            </div>

            <div class="flex flex-wrap gap-3 animate-fade-in-right animate-delay-1s">
                <a href="{{ route('admin.books.index') }}" class="inline-flex items-center gap-2 rounded-2xl bg-slate-900 px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-slate-800 animate-bounce-in animate-delay-2s hover-lift hover-glow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    Lihat Data Buku
                </a>
                <a href="{{ route('admin.books.create') }}" class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3.5 text-sm font-semibold text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700 animate-bounce-in animate-delay-3s hover-lift hover-glow">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Buku
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">
        <div class="rounded-3xl bg-white p-6 border border-slate-100 shadow-lg shadow-slate-200/60 animate-fade-in-up animate-delay-1s hover-lift hover-glow">
            <p class="text-sm font-semibold text-slate-500">Total Buku</p>
            <div class="mt-3 flex items-end justify-between">
                <span class="text-3xl font-black text-slate-900 animate-zoom-in animate-delay-2s">{{ number_format($stats['bookCount'] ?? 0) }}</span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-blue-600 animate-pulse-custom animate-delay-3s">Koleksi</span>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-slate-100 shadow-lg shadow-slate-200/60 animate-fade-in-up animate-delay-2s hover-lift hover-glow">
            <p class="text-sm font-semibold text-slate-500">Stok Total</p>
            <div class="mt-3 flex items-end justify-between">
                <span class="text-3xl font-black text-slate-900 animate-zoom-in animate-delay-3s">{{ number_format($stats['stockCount'] ?? 0) }}</span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-emerald-600 animate-pulse-custom animate-delay-4s">Unit</span>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-slate-100 shadow-lg shadow-slate-200/60 animate-fade-in-up animate-delay-3s hover-lift hover-glow">
            <p class="text-sm font-semibold text-slate-500">Buku Siap</p>
            <div class="mt-3 flex items-end justify-between">
                <span class="text-3xl font-black text-slate-900 animate-zoom-in animate-delay-4s">{{ number_format($stats['availableCount'] ?? 0) }}</span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-indigo-600 animate-pulse-custom animate-delay-5s">Aktif</span>
            </div>
        </div>
        <div class="rounded-3xl bg-white p-6 border border-slate-100 shadow-lg shadow-slate-200/60 animate-fade-in-up animate-delay-4s hover-lift hover-glow">
            <p class="text-sm font-semibold text-slate-500">Anggota</p>
            <div class="mt-3 flex items-end justify-between">
                <span class="text-3xl font-black text-slate-900 animate-zoom-in animate-delay-5s">{{ number_format($stats['memberCount'] ?? 0) }}</span>
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-violet-600 animate-pulse-custom animate-delay-6s">User</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 rounded-[2rem] bg-white border border-slate-100 shadow-xl shadow-slate-200/60 p-6 sm:p-8 animate-fade-in-left animate-delay-1s">
            <div class="flex items-center justify-between gap-4 mb-6">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.24em] text-slate-400 animate-fade-in-up">Aktivitas Terbaru</p>
                    <h4 class="text-2xl font-black text-slate-900 mt-2 animate-fade-in-up animate-delay-1s">Buku Terakhir Ditambahkan</h4>
                </div>
                <a href="{{ route('admin.books.index') }}" class="text-sm font-semibold text-blue-700 hover:text-blue-800 animate-bounce-in animate-delay-2s">Kelola katalog</a>
            </div>

            <div class="overflow-hidden rounded-[1.5rem] border border-slate-100 animate-zoom-in animate-delay-2s">
                <table class="w-full text-left">
                    <thead class="bg-slate-50">
                        <tr class="text-[11px] uppercase tracking-[0.2em] text-slate-400">
                            <th class="px-5 py-4">Judul</th>
                            <th class="px-5 py-4">Penulis</th>
                            <th class="px-5 py-4 text-center">Tahun</th>
                            <th class="px-5 py-4 text-center">Stok</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse ($recentBooks as $book)
                            <tr class="hover:bg-slate-50/80 transition animate-fade-in-right hover-lift hover-glow" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                                <td class="px-5 py-4">
                                    <div class="font-semibold text-slate-900">{{ $book->judul }}</div>
                                    <div class="text-xs text-slate-500 mt-1">{{ $book->kategori }}</div>
                                </td>
                                <td class="px-5 py-4 text-slate-600">{{ $book->penulis }}</td>
                                <td class="px-5 py-4 text-center font-semibold text-slate-800">{{ $book->tahun_terbit }}</td>
                                <td class="px-5 py-4 text-center">
                                    <span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-bold {{ $book->stok > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }} animate-pulse-custom hover-rotate">
                                        {{ $book->stok }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-12 text-center text-slate-500 animate-fade-in">
                                    Belum ada buku yang tersimpan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-[2rem] bg-gradient-to-br from-slate-900 to-blue-900 text-white shadow-2xl shadow-slate-300/50 p-6 sm:p-8 animate-slide-in-up animate-delay-2s hover-lift hover-glow">
            <p class="text-xs font-bold uppercase tracking-[0.24em] text-blue-100/70 animate-fade-in-down">Panduan Cepat</p>
            <h4 class="text-2xl font-black mt-2 animate-fade-in-down animate-delay-1s">Jaga tampilan tetap rapi</h4>
            <div class="mt-6 space-y-4 text-sm text-blue-50/90 leading-relaxed">
                <div class="rounded-2xl bg-white/10 p-4 animate-slide-in-left animate-delay-2s hover-lift hover-glow">
                    Gunakan judul yang singkat, konsisten, dan mudah dipindai di daftar buku.
                </div>
                <div class="rounded-2xl bg-white/10 p-4 animate-slide-in-left animate-delay-3s hover-lift hover-glow">
                    Pastikan cover buku berukuran proporsional agar grid terlihat seragam.
                </div>
                <div class="rounded-2xl bg-white/10 p-4 animate-slide-in-left animate-delay-4s hover-lift hover-glow">
                    Pertahankan warna aksen biru dan slate supaya identitas visualnya tetap profesional.
                </div>
            </div>
        </div>
    </div>
</div>
