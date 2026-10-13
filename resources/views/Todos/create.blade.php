@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')

<div class="border-b border-slate-100 px-6 py-6 sm:px-8">
    <div class="flex items-center gap-3">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-2xl text-indigo-600">
            +
        </div>

        <div>
            <p class="text-sm font-medium text-indigo-600">WORKSPACE / TASKS</p>
            <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">
                Tambah Tugas
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Buat tugas baru dan atur aktivitasmu dengan lebih mudah.
            </p>
        </div>
    </div>
</div>

<div class="max-w-3xl p-6 sm:p-8">

    <form action="{{ route('todos.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div>
            <label for="title" class="mb-2 block text-sm font-semibold text-slate-700">
                Judul Tugas
                <span class="text-red-500">*</span>
            </label>

            <input
                id="title"
                name="title"
                type="text"
                maxlength="255"
                value="{{ old('title') }}"
                placeholder="Contoh: Belajar Laravel"
                required
                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
            >

            @error('title')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <p class="mt-2 text-xs text-slate-400">
                Masukkan judul tugas yang singkat dan jelas.
            </p>
        </div>

        <!-- Deskripsi -->
        <div>
            <label for="description" class="mb-2 block text-sm font-semibold text-slate-700">
                Deskripsi
                <span class="font-normal text-slate-400">(Opsional)</span>
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                maxlength="5000"
                placeholder="Jelaskan detail tugas yang ingin kamu kerjakan..."
                class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100"
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror

            <p class="mt-2 text-xs text-slate-400">
                Maksimal 5.000 karakter.
            </p>
        </div>

        <!-- Status -->
        <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <label for="is_completed" class="flex cursor-pointer items-start gap-3">
                <input
                    id="is_completed"
                    type="checkbox"
                    name="is_completed"
                    value="1"
                    @checked(old('is_completed', false))
                    class="mt-1 h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-2 focus:ring-indigo-500"
                >

                <span>
                    <span class="block text-sm font-semibold text-slate-800">
                        Tandai sebagai selesai
                    </span>
                    <span class="mt-1 block text-sm text-slate-500">
                        Centang jika tugas ini sebenarnya sudah diselesaikan.
                    </span>
                </span>
            </label>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">

            <a
                href="{{ route('todos.index') }}"
                class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-md focus:outline-none focus:ring-4 focus:ring-indigo-200"
            >
                <span>✓</span>
                Simpan Tugas
            </button>

        </div>
    </form>

</div>

@endsection
