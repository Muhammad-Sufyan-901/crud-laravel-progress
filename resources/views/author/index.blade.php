<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authors — {{ config('app.name', 'Laravel') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen p-6 lg:p-8">

    <div class="max-w-4xl mx-auto">

        {{-- Page Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Authors</h1>
                <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    {{ $authors->count() }} {{ Str::plural('author', $authors->count()) }} total
                </p>
            </div>
            <a href="{{ route('author.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-white bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] rounded-md transition-colors">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1V13M1 7H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                Add Author
            </a>
        </div>

        {{-- Session Flash --}}
        @if (session('success'))
            <div class="mb-6 px-4 py-3 text-sm bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-400 border border-green-200 dark:border-green-800 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table Card --}}
        <div class="bg-white dark:bg-[#161615] rounded-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] overflow-hidden">

            @if ($authors->isEmpty())
                {{-- Empty State --}}
                <div class="flex flex-col items-center justify-center py-20 px-6 text-center">
                    <svg class="w-12 h-12 text-[#e3e3e0] dark:text-[#3E3E3A] mb-4" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24" cy="18" r="8" stroke="currentColor" stroke-width="2"/>
                        <path d="M8 42c0-8.837 7.163-16 16-16s16 7.163 16 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <p class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">No authors yet</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4">Get started by adding your first author.</p>
                    <a href="{{ route('author.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-md transition-colors">
                        Add Author
                    </a>
                </div>

            @else
                {{-- Table --}}
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                                #
                            </th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                                Full Name
                            </th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                                Pen Name
                            </th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                                Created At
                            </th>
                            <th class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                        @foreach ($authors as $author)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30 transition-colors">
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                                    {{ $author->name }}
                                </td>
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $author->pen_name }}
                                </td>
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $author->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        {{-- Edit --}}
                                        <a href="{{ route('author.edit', $author) }}"
                                           class="inline-block px-3 py-1.5 text-xs text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-md transition-colors">
                                            Edit
                                        </a>
                                        {{-- Delete --}}
                                        <form action="{{ route('author.destroy', $author) }}" method="POST" onsubmit="return confirm('Delete {{ addslashes($author->name) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-block px-3 py-1.5 text-xs text-[#f53003] dark:text-[#FF4433] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#f53003] dark:hover:border-[#FF4433] rounded-md transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>

    </div>

</body>
</html>
