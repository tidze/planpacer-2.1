@props([
    'color' => 'white'
])

<button
    {{ $attributes->merge([
        'class' => "cursor-pointer whitespace-nowrap rounded-lg border bg-slate-700 px-2 py-1 select-none border-l-4",
        'style' => "color:{$color};
                    border-color:{$color}"

    ]) }}
>
    {{ $slot }}
</button>
