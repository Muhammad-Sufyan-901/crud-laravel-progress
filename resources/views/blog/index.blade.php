<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs — {{ config('app.name', 'Laravel') }}</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen p-6 lg:p-8">

    <div class="max-w-5xl mx-auto">

        {{-- Page Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Blogs</h1>
                <p class="mt-1 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                    {{ $blogs->count() }} {{ Str::plural('post', $blogs->count()) }} total
                </p>
            </div>
            <a href="{{ route('blog.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-white bg-[#1b1b18] dark:bg-[#eeeeec] dark:text-[#1C1C1A] hover:bg-black dark:hover:bg-white border border-black dark:border-[#eeeeec] rounded-md transition-colors">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1V13M1 7H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                Add Blog
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

            @if ($blogs->isEmpty())
                {{-- Empty State --}}
                <div class="flex flex-col items-center justify-center py-20 px-6 text-center">
                    <svg class="w-12 h-12 text-[#e3e3e0] dark:text-[#3E3E3A] mb-4" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="8" y="6" width="32" height="36" rx="3" stroke="currentColor" stroke-width="2"/>
                        <path d="M16 16h16M16 22h16M16 28h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <p class="text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC] mb-1">No blog posts yet</p>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mb-4">Get started by writing your first post.</p>
                    <a href="{{ route('blog.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 text-sm text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-md transition-colors">
                        Add Blog
                    </a>
                </div>

            @else
                {{-- Table --}}
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">#</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Title</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Author</th>
                            <th class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Published At</th>
                            <th class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-[#706f6c] dark:text-[#A1A09A]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e3e3e0] dark:divide-[#3E3E3A]">
                        @foreach ($blogs as $blog)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30 transition-colors">
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <p class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $blog->title }}</p>
                                    <p class="text-xs text-[#706f6c] dark:text-[#A1A09A] mt-0.5 line-clamp-1">{{ $blog->sysnopsis }}</p>
                                </td>
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ $blog->author?->pen_name ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-[#706f6c] dark:text-[#A1A09A]">
                                    {{ \Carbon\Carbon::parse($blog->published_at)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('blog.edit', $blog) }}"
                                           class="inline-block px-3 py-1.5 text-xs text-[#1b1b18] dark:text-[#EDEDEC] border border-[#e3e3e0] dark:border-[#3E3E3A] hover:border-[#1915014a] dark:hover:border-[#62605b] rounded-md transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('blog.destroy', $blog) }}" method="POST"
                                              onsubmit="return confirm('Delete \'{{ addslashes($blog->title) }}\'?')">
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
