@extends('layouts.app')

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
                <x-moonshine::card :url="route('tags.index', $tag->slug)" :overlay="false" :title="$tag->name">
                    {{ $tag->description }}
                    <x-slot:actions>
                        <x-moonshine::link-button :href="route('tags.index', $tag->slug)">Подробно
                        </x-moonshine::link-button>
                    </x-slot:actions>
                </x-moonshine::card>
            </x-moonshine::column>
            @endforeach
        </x-moonshine::grid>
    </x-moonshine::column>
</x-moonshine::grid>
@endsection