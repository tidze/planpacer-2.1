<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <div class="max-w-xl flex-1 mx-auto flex flex-wrap flex-col lg:max-w-6xl lg:flex-row ">

        <div class="w-full flex flex-col lg:flex-row">
            <div class="w-full flex flex-col lg:flex-1 lg:w-1/2" id="task-container">
                @livewire('task')
                <div id="hashure-div" class="hidden lg:block border-4 border-gray-200 flex-auto" style="background: repeating-linear-gradient(-45deg, #ffffffaa, #ffffffaa 4px, #ffffffdd 0, #ffffff00 11px)"></div>
            </div>
            <div class="flex lg:flex-1" id="custom-chart-container">
                @livewire('custom-chart')
            </div>
        </div>

        <div class="w-full lg:w-full">
            @livewire('custom-graph-x')
        </div>
    </div>

    <div class="max-w-xl lg:max-w-6xl lg:flex-row mx-auto flex flex-wrap flex-col">
    </div>

    @include('layouts.footer')
</x-app-layout>

