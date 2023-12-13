@extends('layouts.app')

@section('meta')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$page->title}}</title>
<meta name="description" content="{{$page->meta_description}}" />
<meta name="keywords" content="{{$page->meta_keywords}}" />
@endsection

@section('content')
<!-- Blog Article -->
<div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
    <div class="max-w-2xl">
        <!-- Content -->
        <div class="space-y-5 md:space-y-8">
            <h2 class="text-2xl font-bold md:text-3xl dark:text-white">{{$page->title}}</h2>
            <figure>
                <img class="w-full object-cover rounded-xl"
                    src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                    alt="{{$page->title}}">
            </figure>
            {!!$page->content!!}
        </div>
        <!-- End Content -->
    </div>
</div>
<!-- End Blog Article -->
@endsection