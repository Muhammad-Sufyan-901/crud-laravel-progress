<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Author — {{ config('app.name', 'Laravel') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center justify-center min-h-screen flex-col">

    <div class="w-full max-w-xl">

        {{-- Header --}}
        <div class="mb-8">
            <a href="{{ route('author.index') }}"
               class="inline-flex items-center gap-2 text-sm text-[#706f6c] dark:text-[#A1A09A] hover:text-[#1b1b18] dark:hover:text-[#EDEDEC] transition-colors mb-4">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12L6 8L10 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Authors
            </a>
            <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Edit Author</h1>
            <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">Update the details for <span class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $author->name }}</span>.</p>
        </div>

        {{-- Form Card --}}
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] p-8">

            <form action="{{ route('author.update', $author) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                {{-- Name Field --}}
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Full Name
                        <span class="text-[#f53003]">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $author->name) }}"
                        placeholder="e.g. John Doe"
                        required
                        autofocus
                        class="w-full px-4 py-2.5 text-sm bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-blue-300 dark:focus:border-blue-700 focus:ring transition placeholder-[#706f6c] dark:placeholder-[#A1A09A]"
                    >
                    @error('name')
                        <p class="mt-2 text-xs text-[#f53003] dark:text-[#FF4433]">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pen Name Field --}}
                <div class="mb-8">
                    <label for="pen_name" class="block text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-2">
                        Pen Name
                        <span class="text-[#f53003]">*</span>
                    </label>
                    <input
                        type="text"
                        id="pen_name"
                        name="pen_name"
                        value="{{ old('pen_name', $author->pen_name) }}"
                        placeholder="e.g. J. Doe"
                        required
                        class="w-full px-4 py-2.5 text-sm bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-md focus:outline-none focus:border-blue-300 dark:focus:border-blue-700 focus:ring transition placeholder-[#706f6c] dark:placeholder-[#A1A09A]"
                    >
                    @error('pen_name')
                        <p class="mt-2 text-xs text-[#f53003] dark:text-[#FF4433]">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center justify-end gap-3">
                    <a href="{{ route('author.index') }}"
                       class="inline-block px-5 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-md transition-colors">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="inline-block px-5 py-2 text-sm font-medium text-white bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] rounded-md transition-colors">
                        Update Author
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
