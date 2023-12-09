@extends('layouts.app')

@section('content')
<x-moonshine::grid>
    @foreach ($categories as $category)
    <x-moonshine::column colSpan="2">
        <x-moonshine::title>
            {{ $category->name }}
        </x-moonshine::title>

        <x-moonshine::card url="#" title="{{ $category->name }}">
        </x-moonshine::card>
    </x-moonshine::column>
    @endforeach
</x-moonshine::grid>

<x-moonshine::divider />

<x-moonshine::grid>
    @foreach ($products as $product)
    <x-moonshine::column colSpan="4">
        <x-moonshine::card :url="route('products.index', $product->slug)" :overlay="true"
            thumbnail="$product->makeImage('500x300')" :title="$product->title" :subtitle="date('d.m.Y')"
            :values="['Author' => 'rrr']">
            <x-slot:header>
                <x-moonshine::badge color="green"></x-moonshine::badge>
            </x-slot:header>
            {{ $product->description }}
            <x-slot:actions>
                <x-moonshine::link-button href="#">Read more</x-moonshine::link-button>
            </x-slot:actions>
        </x-moonshine::card>
    </x-moonshine::column>
    @endforeach
</x-moonshine::grid>
@endsection