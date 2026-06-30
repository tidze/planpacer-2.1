@props([
    'active' => false,
    'color' => 'white',
])

@php
$borderColor = [
    'white' => 'border-white',
    'amber' => 'border-amber-500',
    'blue' => 'border-blue-500',
    'green' => 'border-green-500',
][$color] ?? 'white';
@endphp

<button
    {{ $attributes->merge([
        'class' => "cursor-pointer
                    whitespace-nowrap
                    rounded-lg
                    border
                    {$borderColor}
                    bg-slate-700
                    px-2
                    py-1
                    select-none
                    border-l-4"
    ]) }}
>
    {{ $slot }}
</button>