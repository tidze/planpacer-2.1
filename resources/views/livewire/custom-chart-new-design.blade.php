<div class="relative">

    {{-- Component Inspector --}}
    @env('local')
        <div class="bg-black p-2 border border-amber-800">
            {{-- A simple debugger. It's helping me remember, what component I am on. --}}
            <div class="flex flex-col border border-amber-700 px-1 text-[12px] text-yellow-500 bg-black">
                <span class="whitespace-nowrap">view: resources\views\livewire\custom-chart-new-design.blade.php</span>
                <span>controller: {{ get_class($this) }}.php</span>
            </div>

            <div class="text-amber-600 text-[12px]">
                const c_timezone=<span class="text-amber-100"> {{ isset($c_timezone) ? $c_timezone : 'Not Set' }} </span><br>
                $c_startingDatepoint_unix = <span
                    class="text-yellow-100">{{ isset($c_startingDatepoint_unix) ? substr($c_startingDatepoint_unix, 0, 10) + 12600 . ' ' . date('Y-m-d H:i', substr($c_startingDatepoint_unix, 0, 10) + 12600) : 'Not Set' }}</span><br>
                $c_endingDatepoint_unix = <span
                    class="text-yellow-100">{{ isset($c_endingDatepoint_unix) ? substr($c_endingDatepoint_unix, 0, 10) + 12600 . ' ' . date('Y-m-d H:i', substr($c_endingDatepoint_unix, 0, 10) + 12600) : 'Not Set' }}</span><br>
                $c_startingDate = <span class="text-yellow-100">{{ isset($c_startingDate) ? $c_startingDate : 'Not Set' }}</span><br>
                $c_endingDate = <span class="text-yellow-100">{{ isset($c_endingDate) ? $c_endingDate : 'Not Set' }}</span><br>
                $c_startingHourpoint = <span class="text-yellow-100">{{ isset($c_startingHourpoint) ? $c_startingHourpoint : 'Not Set' }}</span><br>
                $c_endingHourpoint = <span class="text-yellow-100">{{ isset($c_endingHourpoint) ? $c_endingHourpoint : 'Not Set' }}</span><br>
                $c_targetTaskIdForEdit = <span class="text-yellow-100">{{ isset($c_targetTaskIdForEdit) ? $c_targetTaskIdForEdit : 'Not Set' }}</span><br>
                $now =
                <pre class="text-yellow-100 text-xs">{{ var_dump($now) }}</pre>
                $taskSumOfDurations = <span class="text-yellow-100">{{ print_r($taskSumOfDurations) }}</span><br>
                $c_flattened --> =<span class="text-yellow-100">{{ isset($c_flattened) ? print_r($c_flattened) : 'Not Set' }}</span><br>
                {{-- $flattened = <span class="text-yellow-100">{{ var_dump($flattened) }}</span><br> --}}
                timezone= <span class="text-yellow-100">{{ $timezone ?? 'Not Set' }}</span><br>
                $is_date_different = <span class="text-yellow-100">{{ isset($is_date_different) ? $is_date_different : 'Not Set' }}</span><br>
                $dailyTasks =
                <pre class="text-yellow-100 text-[0.8rem] max-h-80 overflow-auto">{{ isset($dailyTasks) ? print_r($dailyTasks) : 'Not Set' }}</pre>
            </div>
        </div>
    @endenv

    <div class="m-0 grid grid-cols-1 border border-slate-700 gap-0 flex-col rounded-md overflow-hidden bg-slate-950 text-slate-100">

        {{-- Livewire pulsating background. Meaning it is still retrieving datas from the server.  --}}
        <div wire:loading class="bg-blue-400 bg-opacity-30 animate-pulse absolute w-full h-full z-0 -m-1"></div>

        <!-- Toolbar -->
        <div class="flex flex-wrap items-center gap-2 border-b border-slate-700 px-3 py-2">

            <!-- The previous button for main date -->
            <button class="rounded-md border border-slate-700 bg-slate-800 px-2 py-1 hover:bg-slate-700 transition-colors" aria-label="Previous day">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <input type="date" class="rounded-md border border-slate-700 bg-slate-800 px-3 py-1 text-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500" />

            <!-- The next button for main date -->
            <button class="rounded-md border border-slate-700 bg-slate-800 px-2 py-1 hover:bg-slate-700 transition-colors" aria-label="Next day">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div class="text-sm text-slate-400">
                <span class="font-medium text-amber-400">
                    07:00 → 03:00
                    <span class="text-xs text-slate-500">(+1 day)</span>
                    <span class="mx-1">•</span>
                    19:47
                </span>
            </div>

            <button wire:click="getTask" id="getTask" class="ml-auto rounded-md bg-amber-500 px-3 py-1 text-sm font-medium text-black hover:bg-amber-400 transition-colors">
                Daily Report
            </button>
        </div>

        <!-- Timeline -->
        <div class="flex-1 p-3">
            <div class="relative z-10 rounded-md border border-slate-700 bg-slate-900">
                <!-- Top Date -->
                <div class="border-b rounded-t-md border-slate-700 bg-slate-900/95 backdrop-blur-sm px-3 py-2 text-xs text-amber-400">
                    2026-06-27 07:00
                    <span class="rounded-md bg-amber-500/20 px-2 py-1 text-[11px] text-amber-400 font-medium">
                        Today
                    </span>
                </div>

                <!-- Entries Container -->
                <div
                    class="min-h-[20rem]
                    [&::-webkit-scrollbar]:w-2
                    [&::-webkit-scrollbar-track]:bg-slate-800
                    [&::-webkit-scrollbar-thumb]:bg-slate-600
                    [&::-webkit-scrollbar-thumb]:rounded-full
                    hover:[&::-webkit-scrollbar-thumb]:bg-slate-500">
                    <!-- Entries -->
                    @isset($dailyTasks)
                        @foreach ($dailyTasks as $_task)
                        {{-- Give each Livewire component a unique key:(e.g. entry-6) so its state isn't reused between loop iterations. --}}
                            <livewire:entry
                                :key="'entry-' . $_task['id']"
                                :_timezone="$c_timezone"
                                :starting_time="$_task['starting_time']"
                                :ending_time="$_task['ending_time']"
                                :description="$_task['description']"
                                :category="$_task['category']"
                                :color="$_task['color']" />
                        @endforeach
                    @endisset
                </div>

                <!-- Bottom Date -->
                <div class="border-t rounded-b-md border-slate-700 bg-slate-900/95 backdrop-blur-sm px-3 py-2 text-xs text-amber-400">
                    2026-06-28 03:00
                    <span class="rounded-md bg-amber-500/20 px-2 py-1 text-[11px] text-amber-400 font-medium">
                        Tomorrow
                    </span>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="border-t border-slate-700 bg-slate-900 px-4 py-3 ">
            <div class="mb-3 font-medium text-slate-300 text-sm">Today's Summary</div>
            <div class="space-y-3">
                <!-- Work Progress -->
                <div>
                    <div class="mb-1 flex justify-between text-sm">
                        <span class="text-slate-300">Work</span>
                        <span class="text-amber-400 font-medium">7.2 h · 35.8%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-700 overflow-hidden">
                        <div class="h-full w-[35.8%] rounded-full bg-amber-500 transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Personal Progress -->
                <div>
                    <div class="mb-1 flex justify-between text-sm">
                        <span class="text-slate-300">Personal</span>
                        <span class="text-blue-400 font-medium">4.5 h · 22.4%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-700 overflow-hidden">
                        <div class="h-full w-[22.4%] rounded-full bg-blue-500 transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Leisure Progress -->
                <div>
                    <div class="mb-1 flex justify-between text-sm">
                        <span class="text-slate-300">Leisure</span>
                        <span class="text-purple-400 font-medium">2.3 h · 11.2%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-700 overflow-hidden">
                        <div class="h-full w-[11.2%] rounded-full bg-purple-500 transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Health Progress -->
                <div>
                    <div class="mb-1 flex justify-between text-sm">
                        <span class="text-slate-300">Health</span>
                        <span class="text-emerald-400 font-medium">1.5 h · 7.5%</span>
                    </div>
                    <div class="h-2.5 rounded-full bg-slate-700 overflow-hidden">
                        <div class="h-full w-[7.5%] rounded-full bg-emerald-500 transition-all duration-500"></div>
                    </div>
                </div>

                <!-- Total Time -->
                <div class="pt-2 border-t border-slate-700/50 flex justify-between text-xs">
                    <span class="text-slate-500">Total tracked</span>
                    <span class="text-slate-300 font-medium">15.5 hours</span>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        {{-- Get the user's timezone from the browser(js) and set it to the Livewire component property 'c_timezone' --}}
        const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
        $wire.set('c_timezone', tz);
    </script>
@endscript
