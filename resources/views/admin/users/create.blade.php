@extends('layouts.panel')

@section('page-title', 'Tambah Pengguna Baru - Admin')

@section('content')
{{-- Pembungkus Utama Putih Polos --}}
<div class="min-h-screen bg-white py-12">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">

        <div class="mb-16">
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('admin.users.index') }}" class="p-2 bg-slate-100 hover:bg-slate-200 rounded-full transition-colors">
                    <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                        Tambah <span class="text-blue-600">Pengguna Baru</span>
                    </h1>
                    <p class="text-slate-500 mt-1">Buat akun pengguna baru di sistem</p>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="flex items-start gap-3 text-rose-700 mb-10 p-4 border-l-4 border-rose-500 bg-rose-50/30">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                </svg>
                <div>
                    <p class="text-sm font-semibold tracking-wide mb-2">Ada kesalahan dalam form:</p>
                    <ul class="text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Name -->
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap <span class="text-rose-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('name') border-rose-500 @enderror">
                        @error('name')
                            <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="md:col-span-2">
                        <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Email <span class="text-rose-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('email') border-rose-500 @enderror">
                        @error('email')
                            <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Password <span class="text-rose-500">*</span></label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('password') border-rose-500 @enderror">
                        <p class="text-xs text-slate-500 mt-1">Minimal 8 karakter</p>
                        @error('password')
                            <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password <span class="text-rose-500">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    </div>

                    <!-- Role -->
                    <div class="md:col-span-2">
                        <label for="role" class="block text-sm font-bold text-slate-700 mb-2">Role <span class="text-rose-500">*</span></label>
                        <select id="role" name="role" required
                                class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all @error('role') border-rose-500 @enderror">
                            <option value="">-- Pilih Role --</option>
                            <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>User Biasa</option>
                            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                    Tambah Pengguna
                </button>
            </div>
        </form>

    </div>
</div>
@endsection