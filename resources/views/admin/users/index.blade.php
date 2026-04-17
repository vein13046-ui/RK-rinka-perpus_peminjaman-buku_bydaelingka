@extends('layouts.panel')

@section('page-title', 'Daftar Pengguna - Admin')

@section('content')
{{-- Pembungkus Utama Putih Polos --}}
<div class="min-h-screen bg-white py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-16">
            <div class="space-y-1">
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">
                    Daftar <span class="text-blue-600">Pengguna</span>
                </h1>
                Manajemen pengguna terdaftar di sistem RinKa Perpus.
            </div>

            <a href="{{ route('admin.users.create') }}" class="group inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-bold text-sm tracking-tight transition-all">
                <div class="p-2 bg-blue-50 group-hover:bg-blue-100 rounded-full transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                Tambah Pengguna Baru
            </a>
        </div>

        @if (session('success'))
            <div class="flex items-center gap-3 text-emerald-700 mb-10 p-4 border-l-4 border-emerald-500 bg-emerald-50/30">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="text-sm font-semibold tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-center gap-3 text-rose-700 mb-10 p-4 border-l-4 border-rose-500 bg-rose-50/30">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <span class="text-sm font-semibold tracking-wide">{{ session('error') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Foto Profil</th>
                        <th class="px-6 pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Informasi Pengguna</th>
                        <th class="px-6 pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Email</th>
                        <th class="px-6 pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Role</th>
                        <th class="px-6 pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-center">Bergabung</th>
                        <th class="pb-5 text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($users as $user)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="py-8 pr-4">
                                <div class="relative w-16 h-16 bg-slate-100 rounded-full overflow-hidden ring-2 ring-slate-200 shadow-sm transition-transform group-hover:scale-[1.02]">
                                    <img src="{{ $user->profilePhotoUrl() }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                </div>
                            </td>

                            <td class="px-6 py-8 align-top">
                                <div class="max-w-xs">
                                    <h3 class="text-lg font-bold text-slate-900 leading-tight group-hover:text-blue-600 transition-colors">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="text-sm text-slate-500 mt-1">ID: {{ $user->id }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-8 align-top">
                                <span class="text-sm font-medium text-slate-700">{{ $user->email }}</span>
                            </td>

                            <td class="px-6 py-8 text-center align-top pt-10">
                                <span class="px-3 py-1 text-xs font-bold uppercase tracking-widest rounded-full
                                    {{ $user->role === 'admin' ? 'bg-violet-100 text-violet-700 ring-1 ring-violet-200' : 'bg-blue-100 text-blue-700 ring-1 ring-blue-200' }}">
                                    {{ $user->role }}
                                </span>
                            </td>

                            <td class="px-6 py-8 text-center align-top pt-10">
                                <span class="text-sm font-bold text-slate-700">{{ $user->created_at->format('d/m/Y') }}</span>
                            </td>

                            <td class="py-8 text-right align-top pt-10">
                                <div class="flex items-center justify-end gap-6">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-[10px] font-black uppercase tracking-widest text-blue-500 hover:text-blue-700 transition-all">
                                        Edit
                                    </a>

                                    @if ($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?');" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-[10px] font-black uppercase tracking-widest text-slate-400 hover:text-rose-600 transition-all">
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[10px] font-black uppercase tracking-widest text-slate-300 cursor-not-allowed">
                                            Hapus
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-32 text-center">
                                <div class="space-y-4">
                                    <p class="text-slate-300 font-bold text-xl tracking-tight uppercase">Tidak Ada Pengguna</p>
                                    <p class="text-slate-400 text-sm">Belum ada pengguna terdaftar di sistem.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection