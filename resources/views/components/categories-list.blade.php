<!-- Card Section -->
@if (count($categories) > 0)
<div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Каталог</h2>
    </div>
    <!-- End Title -->
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
        @foreach ($categories as $category)
        <!-- Card -->
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            href="{{route('categories.index', $category->slug)}}">
            <div class="p-4 md:p-5">
                <div class="flex">
                    {{-- <svg class="mt-1 flex-shrink-0 w-5 h-5 text-gray-800 dark:text-gray-200"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg> --}}

                    <div class="grow ms-5">
                        <h3
                            class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                            {{ $category->name }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ $category->description }}
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->
        @endforeach
    </div>
</div>
@endif
