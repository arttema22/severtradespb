@extends('layouts.app')

@section('meta')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Теги</title>
<meta name="description" content="Теги товаров" />
<meta name="keywords" content="теги" />
@endsection

@section('content')
<x-moonshine::grid>
    <x-moonshine::column colSpan="4">
        <x-moonshine::box title="tags">
            @foreach ($tags as $tag)
            <x-moonshine::title>
                <x-moonshine::link-native :href="route('tags.index', $tag->slug)">
                    {{ $tag->name }}
                </x-moonshine::link-native>
            </x-moonshine::title>
            @endforeach
        </x-moonshine::box>
    </x-moonshine::column>
    <x-moonshine::column colSpan="8">
        <x-moonshine::grid>
            @foreach ($tags as $tag)
            <x-moonshine::column colSpan="4">
                <!-- Card -->
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    href="{{route('tags.index', $tag->slug)}}">
                    <div class="p-4 md:p-5">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3
                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                                    {{$tag->name}}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    {!! $tag->description !!}
                                </p>
                            </div>
                            <div class="ps-3">
                                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </x-moonshine::column>
            @endforeach
        </x-moonshine::grid>
    </x-moonshine::column>
</x-moonshine::grid>
@endsection