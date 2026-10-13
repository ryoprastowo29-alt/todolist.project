```blade
@extends('layouts.app')

@section('title', 'Daftar Tugas')

@section('content')

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                Daftar Tugas
            </h1>
            <p class="mt-2 text-sm text-slate-500">
                Kelola aktivitas dan selesaikan tugasmu satu per satu.
            </p>
        </div>

        <a href="{{ route('todos.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 font-semibold text-white shadow-md transition hover:bg-indigo-700 hover:shadow-lg">
            <span class="text-xl">+</span>
            Tambah Tugas
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                <tr>
                    <th class="px-5 py-4">No.</th>
                    <th class="px-5 py-4">Nama Tugas</th>
                    <th class="px-5 py-4">Status</th>
                    <th class="px-5 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($todos as $todo)
                    <tr class="transition hover:bg-indigo-50/50">
                        <td class="px-5 py-4 text-slate-500">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-5 py-4 font-medium text-slate-800">
                            {{ $todo->title }}
                        </td>

                        <td class="px-5 py-4">
                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">
                                Belum selesai
                            </span>
                        </td>

                        <td class="px-5 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('todos.edit', $todo) }}"
                                   class="font-semibold text-indigo-600 hover:text-indigo-800">
                                    Edit
                                </a>

                                <form action="{{ route('todos.destroy', $todo) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="font-semibold text-red-500 hover:text-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-12 text-center">
                            <div class="text-4xl">📝</div>
                            <p class="mt-3 font-semibold text-slate-700">
                                Belum ada tugas
                            </p>
                            <p class="mt-1 text-sm text-slate-500">
                                Tambahkan tugas pertamamu untuk mulai menggunakan aplikasi.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
```
