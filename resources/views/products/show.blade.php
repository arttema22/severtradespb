@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center">
    <x-moonshine::grid class="w-1/2">
        <x-moonshine::column colSpan="6">
            <x-moonshine::title>
                {{$product->title}}
            </x-moonshine::title>
            {{$product->description}}
            <div>Размер <x-moonshine::badge color="gray">{{$product->size}}</x-moonshine::badge>
            </div>
            <div>Марка <x-moonshine::badge color="gray">{{$product->mark}}</x-moonshine::badge>
            </div>
            <div>Длина <x-moonshine::badge color="gray">{{$product->length}}</x-moonshine::badge>
            </div>
        </x-moonshine::column>
        <x-moonshine::column colSpan="6">
            <x-moonshine::modal :title="$product->title">
                <div>
                    Content...
                    <x-moonshine::form.input name="title" placeholder="Title" value="" />
                    <x-moonshine::form.button>Отправить</x-moonshine::form.button>
                </div>
                <x-slot name="outerHtml">
                    <x-moonshine::link-button>
                        Сделать заказ
                    </x-moonshine::link-button>
                </x-slot>
            </x-moonshine::modal>

            <x-moonshine::offcanvas :title="$product->title" :left="false">
                <x-slot:toggler>
                    Open
                </x-slot:toggler>
                <x-moonshine::form.input name="title" placeholder="Title" value="" />
                <x-moonshine::form.button>Отправить</x-moonshine::form.button>
            </x-moonshine::offcanvas>
        </x-moonshine::column>
    </x-moonshine::grid>
</div>
@endsection