@extends('layouts.app')

@section('content')
<x-moonshine::grid>
    <x-moonshine::column colSpan="4">
        <x-moonshine::box :title="$tag->name">
            {{$tag->description}}
        </x-moonshine::box>
        <x-moonshine::divider />
        @foreach ($tags as $tag)
        <x-moonshine::link-native :href="route('tags.index', $tag->slug)">{{ $tag->name }}</x-moonshine::link-native>
        @endforeach

    </x-moonshine::column>
    <x-moonshine::column colSpan="8">
        <x-moonshine::grid>
            @foreach ($tag->products->where('is_publish', 1) as $tag)
            <x-moonshine::column colSpan="4">
                <x-moonshine::card :url="route('products.index', $tag->slug)" :overlay="false" :title="$tag->title">
                    {{ $tag->description }}
                    <x-slot:actions>
                        <x-moonshine::link-button :href="route('products.index', $tag->slug)">Подробно
                        </x-moonshine::link-button>
                    </x-slot:actions>
                </x-moonshine::card>
            </x-moonshine::column>
            @endforeach
        </x-moonshine::grid>
    </x-moonshine::column>
</x-moonshine::grid>
@endsection