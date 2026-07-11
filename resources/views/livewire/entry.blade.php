

<div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
        <div class="font-medium text-sm">{{ $e_category }}</div>
        <div class="text-xs text-slate-500">{{ $e_startingHourpoint }} → {{ $e_endingHourpoint }}</div>
        <div class="text-xs text-slate-500">{{ $e_timezone }}</div>
    </div>

    <div class="flex-1 p-2">
        <div class="group relative rounded-md border-l-4 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer"
        style="border-color: {{ $e_color }};">
            <div class="text-sm font-medium">{{ $e_description }}</div>
            <div class="text-xs text-slate-400">{{ $e_duration }} <span>minutes</span></div>

            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                <button
                    wire:click="edit"
                    class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors"
                    aria-label="Edit"
                >✎</button>

                <button
                    wire:click="delete"
                    class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors"
                    aria-label="Delete"
                >✕</button>
            </div>
        </div>
    </div>
</div>
