@extends('layouts.app2')

@section('meta')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$product->title}}</title>
<meta name="description" content="{{$product->meta_description}}" />
<meta name="keywords" content="{{$product->meta_keywords}}" />
@endsection

@section('content')
<div>
    {{-- <ul class="relative"> --}}
        <ul>
            @foreach ($categories as $category)
            <li class="peer/{{$category->id}} hover:bg-slate-100">
                {{ $category->name }}
            </li>
            <ul class="absolute pl-4 hidden peer-hover/{{$category->id}}:block">
                @foreach ($category->childrenCategories as $childCategory)
                <li>
                    {{ $childCategory->name }}
                </li>
                {{-- @include('child_category', ['child_category' => $childCategory]) --}}
                @endforeach
            </ul>
            @endforeach
        </ul>
</div>


<h1 class="text-4xl">{{$product->name}}</h1>
{{$product->description}}
<div>
    <h3 class="text-2xl">Характеристики товара var1</h3>
    <dl class="grid sm:grid-cols-3 gap-1 sm:gap-3">
        <dt class="sm:col-span-1 font-semibold">Размер</dt>
        <dd class="sm:col-span-2 mb-3 sm:mb-0">{{$product->size}}</dd>
        <dt class="sm:col-span-1 font-semibold">Марка</dt>
        <dd class="sm:col-span-2 mb-3 sm:mb-0">{{$product->mark}}</dd>
        <dt class="sm:col-span-1 font-semibold">Длина</dt>
        <dd class="sm:col-span-2 mb-3 sm:mb-0">{{$product->length}}</dd>
    </dl>
</div>

<div>Категория
    {{$product->category->name}}
</div>
<div>Теги
    @foreach ($product->tags as $tag)
    <p><a class="text-blue-600 hover:text-blue-500 opacity-90" href="#">{{$tag->name}}</a></p>
    @endforeach
</div>
<div>
    <h3 class="text-2xl">Опции товара</h3>
    @foreach ($options as $option => $values)
    <h6 class="block text-sm font-medium mb-2">{{ $option }}</h6>
    @foreach ($values as $value)
    <span
        class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-md text-xs font-medium border border-gray-200 bg-white text-gray-800 shadow-sm dark:bg-slate-900 dark:border-gray-700 dark:text-white">
        {{ $value->title }}
    </span>
    @endforeach
    @endforeach
</div>

<x-slot name="outerHtml">
    Сделать заказ
</x-slot>

@endsection