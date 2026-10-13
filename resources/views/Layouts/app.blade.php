```html
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Daftar Tugas') — Todo</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-slate-100 text-slate-800 antialiased">

    <!-- Header -->
    <header class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white shadow-lg">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">

            <a href="{{ route('todos.index') }}"
               class="text-xl font-bold tracking-wide transition hover:text-indigo-200 sm:text-2xl">
                <span class="mr-2">✓</span> Todo
                <span class="font-medium text-indigo-200">/ Belajar Laravel</span>
            </a>

            <span class="hidden rounded-full bg-white/15 px-4 py-2 text-sm sm:inline-block">
                Task Manager
            </span>

        </div>
    </header>

    <!-- Main Content -->
    <main class="mx-auto max-w-5xl px-4 py-8 sm:px-6 sm:py-12">

        <!-- Success Message -->
        @if (session('success'))
            <div role="status"
                 class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800 shadow-sm">
                <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-100 font-bold">
                    ✓
                </span>
                <div>
                    <p class="font-semibold">Berhasil!</p>
                    <p class="mt-1 text-sm">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div role="alert"
                 class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5 text-red-800 shadow-sm">

                <div class="flex items-center gap-2">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-red-100 font-bold">
                        !
                    </span>
                    <strong class="text-base">Periksa kembali isianmu</strong>
                </div>

                <ul class="mt-3 list-inside list-disc space-y-1 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <!-- Page Content -->
        <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-md sm:p-8">

            @yield('content')

        </section>

    </main>

    <!-- Footer -->
    <footer class="mt-8 border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-5xl px-6 py-6 text-center">
            <p class="text-sm font-medium text-slate-600">
                Latihan CRUD
                <span class="mx-1 text-slate-300">•</span>
                Laravel 13
                <span class="mx-1 text-slate-300">•</span>
                Blade
                <span class="mx-1 text-slate-300">•</span>
                SQLite
            </p>
            <p class="mt-2 text-xs text-slate-400">
                Dibuat untuk belajar dan mengelola tugas dengan lebih mudah.
            </p>
        </div>
    </footer>

</body>
</html>
```
