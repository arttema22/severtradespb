<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.darkMode.on && 'dark'">

<head>
    @yield('meta')
    @vite([
    'resources/css/app.css',
    'resources/js/app.js'
    ])
    {{-- @vite('resources/js/app.js') --}}
</head>

<body>

    <header
        class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white border-b border-gray-200 text-sm py-3 sm:py-0 dark:bg-gray-800 dark:border-gray-700">
        <nav class="relative max-w-7xl w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">
                    {{config('app.name');}}</a>
                <div class="sm:hidden">
                    <button type="button"
                        class="hs-collapse-toggle w-9 h-9 flex justify-center items-center text-sm font-semibold rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden w-4 h-4" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                        <svg class="hs-collapse-open:block flex-shrink-0 hidden w-4 h-4" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
                <div
                    class="flex flex-col gap-y-4 gap-x-0 mt-5 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-7 sm:mt-0 sm:ps-7">
                    {{-- @foreach(\App\Models\MenuItem::whereNull('parent_id')->get() as $menuItem) --}}
                    {{--
                    <x-menu-item :menuItem="$menuItem" /> --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 items-center gap-5 text-center">
            <div>
                <a class="flex-none text-xl font-semibold text-black dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="#" aria-label="Brand">Brand</a>
            </div>
            <!-- End Col -->

            <ul class="text-center">
                <li
                    class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        About
                    </a>
                </li>
                <li
                    class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        Services
                    </a>
                </li>
                <li
                    class="inline-block relative pe-8 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-3 before:-translate-y-1/2 before:content-['/'] before:text-gray-300 dark:before:text-gray-600">
                    <a class="inline-flex gap-x-2 text-sm text-gray-500 hover:text-gray-800 dark:text-gray-500 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        Blog
                    </a>
                </li>
            </ul>
            <!-- End Col -->

            <!-- Social Brands -->
            <div class="md:text-end space-x-2">
                <p
                    class="h-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    СеверТрейд — надежный поставщик металлопроката.
                </p>
            </div>
            <!-- End Social Brands -->
        </div>
        <!-- End Grid -->
    </footer>
</body>

</html>