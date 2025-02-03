<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nalozi') }}
        </h2>
    </x-slot>

    <h1>Document Content</h1>
    <div>{!! $content !!}</div>

</x-app-layout>
