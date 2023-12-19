<div class="container mx-auto">
    <div class="grid lg:grid-cols-6 lg:gap-x-8 xl:gap-x-12 lg:items-center">
        <div class="lg:col-span-2">
            <h1>test 1 1</h1>
            <h1>test 1 2</h1>
        </div>
        <div class="lg:col-span-4 mt-10 lg:mt-0">
            <!-- Slider -->
            <div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": true
      }' class="relative">
                <div class="hs-carousel relative overflow-hidden w-full min-h-[350px] bg-white rounded-lg">
                    <div
                        class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        <div class="hs-carousel-slide">
                            <div class="flex justify-center h-full bg-gray-100 p-6">
                                <span class="self-center text-4xl transition duration-700">First slide</span>
                            </div>
                        </div>
                        <div class="hs-carousel-slide">
                            <div class="flex justify-center h-full bg-gray-200 p-6">
                                <span class="self-center text-4xl transition duration-700">Second slide</span>
                            </div>
                        </div>
                        <div class="hs-carousel-slide">
                            <div class="flex justify-center h-full bg-gray-300 p-6">
                                <span class="self-center text-4xl transition duration-700">Third slide</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-3 h-3 border border-gray-400 rounded-full cursor-pointer"></span>
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-3 h-3 border border-gray-400 rounded-full cursor-pointer"></span>
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 w-3 h-3 border border-gray-400 rounded-full cursor-pointer"></span>
                </div>
            </div>
            <!-- End Slider -->
        </div>
    </div>
</div>



<!-- Card Section -->
@if (count($tags) > 0)
<div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Теги</h2>
    </div>
    <!-- End Title -->
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
        @foreach ($tags as $tag)
        <!-- Card -->
        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            href="{{route('tags.index', $tag->slug)}}">
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
                            {{ $tag->name }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            {!! $tag->description !!}
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