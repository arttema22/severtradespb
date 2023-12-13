<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data :class="$store.darkMode.on && 'dark'">

<head>
    @yield('meta')

    <script src="https://cdn.tailwindcss.com"></script>

    @moonShineAssets

</head>

<x-moonshine::layout>
    <x-moonshine::layout.flash />
    <x-moonshine::layout.top-bar :home_route="route('home')">
        <x-moonshine::layout.menu />
    </x-moonshine::layout.top-bar>
    <main class="layout-page">
        <x-moonshine::grid>
            <x-moonshine::column>
                <x-moonshine::layout.header :notifications="false" :locales="false" />
                <x-moonshine::layout.content />
            </x-moonshine::column>
        </x-moonshine::grid>
    </main>
</x-moonshine::layout>

</html>