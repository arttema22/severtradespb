@extends('layouts.app')

@section('content')
<x-moonshine::grid>
    <x-moonshine::column colSpan="4">
        <x-moonshine::box :title="$category->name">
            @foreach ($categories as $category)
            <x-moonshine::title>
                <x-moonshine::link-native :href="route('categories.index', $category->slug)">
                    {{ $category->name }}
                </x-moonshine::link-native>
            </x-moonshine::title>
            @endforeach
        </x-moonshine::box>
    </x-moonshine::column>
    <x-moonshine::column colSpan="8">
        <x-moonshine::grid>
            @foreach ($categories as $category)
            <x-moonshine::column colSpan="4">
                <x-moonshine::card :url="route('categories.index', $category->slug)" :overlay="false"
                    :title="$category->name">
                    {{ $category->description }}
                    <x-slot:actions>
                        <x-moonshine::link-button :href="route('categories.index', $category->slug)">Подробно
                        </x-moonshine::link-button>
                    </x-slot:actions>
                </x-moonshine::card>
            </x-moonshine::column>
            @endforeach
        </x-moonshine::grid>

        <x-moonshine::divider />

        <x-moonshine::grid>
            @foreach ($category->products as $product)
            <x-moonshine::column colSpan="4">
                <x-moonshine::card :url="route('products.index', $product->slug)" :overlay="false"
                    :title="$product->title">
                    {{ $product->description }}
                    <x-slot:actions>
                        <x-moonshine::link-button :href="route('products.index', $product->slug)">Подробно
                        </x-moonshine::link-button>
                    </x-slot:actions>
                </x-moonshine::card>
            </x-moonshine::column>
            @endforeach
        </x-moonshine::grid>
    </x-moonshine::column>
</x-moonshine::grid>
@endsection