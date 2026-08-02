<x-app-layout>
    <x-slot name="header">

    </x-slot>

    @auth
        @include('layouts.navigation')
        <div class="bg-gray-800 text-white max-w-6xl mx-auto lg:px-0 mb-1">
            <div class="text-yellow-400 border-yellow-700 border-l-8 p-2 bg-yellow-400 bg-opacity-30">
                Welcome <span class="text-white font-semibold">{{ Auth::user()->name }}</span>!
            </div>
        </div>
    @endauth

    <div class="max-w-xl flex-1 mx-auto flex flex-wrap flex-col lg:max-w-6xl lg:flex-row ">

        <div class="w-full flex flex-col lg:flex-row">
            <div class="w-1/2 flex flex-col lg:flex-1 lg:w-1/2" id="task-container">
                <livewire:task />
                <div id="hashure-div" class="hidden lg:block border-4 border-gray-200 flex-auto" style="background: repeating-linear-gradient(-45deg, #ffffffaa, #ffffffaa 4px, #ffffffdd 0, #ffffff00 11px)"></div>
            </div>
            <div class="w-1/2" id="custom-chart-container">
                <livewire:custom-chart />
            </div>
        </div>

        <div class="w-full lg:w-full">
            <livewire:custom-graph-x />
        </div>

    </div>

    <div class="max-w-xl lg:max-w-6xl lg:flex-row mx-auto flex flex-wrap flex-col">
    </div>

    @include('layouts.footer')

    <input type="hidden" id="timezone-input" name="timezone" value="UTC">

</x-app-layout>

