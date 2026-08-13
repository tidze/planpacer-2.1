<div class="relative border-4 border-yellow-700 box-border flex-1 text-white text-[10px]">

    <div wire:loading class="bg-blue-400 bg-opacity-30 animate-pulse absolute w-full h-full"></div>

    @env('local')
        <div class="bg-black border border-yellow-500 p-2">

            {{-- A simple debugger. It's helping me remember what component I am on better. --}}
            <div class="flex flex-col border border-yellow-700 text-yellow-500 text-base bg-black text-xs">
                <span class="whitespace-nowrap">view: resources\views\livewire\custom-chart.blade.php</span>
                <span>controller: {{ get_class($this) }}.php</span>
            </div>

            {{-- Components Debugger Information (PHP side) --}}
            <div class="text-yellow-500 text-[11px] w-full">
                $c_timezone= <span class="text-yellow-100">{{ $c_timezone ?? 'Not Set' }}</span><br>
                $c_startingTimepoint_unix = <span class="text-yellow-100">{{ isset($c_startingTimepoint_unix) ? substr($c_startingTimepoint_unix, 0, 10) . ' ' . (new DateTime('@' . $c_startingTimepoint_unix))->setTimezone(new DateTimeZone($c_timezone))->format('Y-m-d H:i') : 'Not Set' }}</span> <br>
                $c_endingTimepoint_unix = <span class="text-yellow-100">{{ isset($c_endingTimepoint_unix) ? substr($c_endingTimepoint_unix, 0, 10) . ' ' . (new DateTime('@' . $c_endingTimepoint_unix))->setTimezone(new DateTimeZone($c_timezone))->format('Y-m-d H:i') : 'Not Set' }}</span><br>
                $c_startingDatepoint = <span class="text-yellow-100">{{ isset($c_startingDatepoint) ? $c_startingDatepoint : 'Not Set' }}</span><br>
                $c_endingDatepoint = <span class="text-yellow-100">{{ isset($c_endingDatepoint) ? $c_endingDatepoint : 'Not Set' }}</span><br>
                $c_startingTimepoint = <span class="text-yellow-100">{{ isset($c_startingTimepoint) ? $c_startingTimepoint : 'Not Set' }}</span><br>
                $c_endingTimepoint = <span class="text-yellow-100">{{ isset($c_endingTimepoint) ? $c_endingTimepoint : 'Not Set' }}</span><br>
                $c_targetTaskIdForEdit = <span class="text-yellow-100">{{ isset($c_targetTaskIdForEdit) ? $c_targetTaskIdForEdit : 'Not Set' }}</span><br>
                $now = <span class="text-yellow-100">{{ var_dump($now) }}</span><br>
                $dailyTasks --> = <pre class="text-yellow-100 max-h-64 overflow-auto">{{ isset($dailyTasks) ? print_r($dailyTasks) : 'Not Set' }}</pre><br>
                $taskSumOfDurations = <span class="text-yellow-100">{{ print_r($taskSumOfDurations) }}</span><br>
                $c_flattened --> =<span class="text-yellow-100">{{ isset($c_flattened) ? print_r($c_flattened) : 'Not Set' }}</span><br>
                {{-- $flattened = <span class="text-yellow-100">{{ var_dump($flattened) }}</span><br> --}}
                $is_date_different = <span class="text-yellow-100">{{ isset($is_date_different) ? $is_date_different : 'Not Set' }}</span><br>
            </div>

        </div>
    @endenv
    <div class="relative z-20 flex flex-col text-base">
        <div class="flex flex-row justify-center">

            <div class="flex items-center">
                <div class="border-2 flex items-center justify-center rounded-xl border-gray-500 mx-0 sm:mx-2 p-2 active:border-blue-500 active:border-2 cursor-default select-none" wire:click="prevPeriod">◄ ↺</div>
            </div>

            <div class="flex">
                {{-- Component c_startingTimepoint --}}
                <div class="flex flex-col">
                    {{-- for input date overlay to be clickable every where --}}
                    <label class="px-2 py-1 border border-slate-500 rounded-lg inline-block" for="c_startingTimepoint">Start</label>
                    <input id="c_startingDatepoint" class="w-36 border-2 rounded-xl border-gray-500 bg-gray-800" wire:model.defer="c_startingDatepoint" {{-- wire:ignore --}} type="date" value="">
                    <input id="c_startingTimepoint" class="w-36 bg-black text-center border-2 rounded-xl border-gray-500"wire:model.defer="c_startingTimepoint" type="text">
                    <input id="c_startingTimepoint_unix" name="c_startingTimepoint_unix" class="bg-black text-center text-[8px]" wire:model.defer="c_startingTimepoint_unix" type="hidden" value="">
                    {{-- <label for="c_startingTimepoint_unix">c_startingTimepoint_unix</label> --}}
                    {{-- @error('c_startingTimepoint_unix') --}}
                    {{-- <span class="text-red-500 text-[9px]">{{ $message }}</span> --}}
                    {{-- @enderror --}}
                </div>

                {{-- Component c_endingTimepoint --}}
                <div class="flex flex-col">
                    {{-- for input date overlay to be clickable every where --}}
                    <label class="px-2 py-1 border border-slate-500 rounded-lg inline-block" for="c_endingTimepoint">End</label>
                    <input id="c_endingDatepoint" class="w-36 border-2 rounded-xl border-gray-500 bg-gray-800" wire:model.defer="c_endingDatepoint" {{-- wire:ignore --}} type="date" value="">
                    <input id="c_endingTimepoint" class="w-36 bg-black text-center border-2 rounded-xl border-gray-500"wire:model.defer="c_endingTimepoint" type="text">
                    <input id="c_endingTimepoint_unix" name="c_endingTimepoint_unix" class="bg-black text-center text-[8px]" wire:model.defer="c_endingTimepoint_unix" type="hidden" value="">
                    {{-- <label for="c_endingTimepoint_unix">c_endingTimepoint_unix</label> --}}
                    {{-- @error('c_endingTimepoint_unix') --}}
                    {{-- <span class="text-red-500 text-[9px]">{{ $message }}</span> --}}
                    {{-- @enderror --}}
                </div>
            </div>

            <div class="flex items-center">
                <div class="border-2 flex items-center justify-center rounded-xl border-gray-500 mx-0 sm:mx-2 p-2 active:border-blue-500 active:border-2 cursor-default select-none" wire:click="nextPeriod">► ↻</div>
            </div>
        </div>

        <div class="flex flex-row">
            <button
                class="flex-1 px-3 py-2 m-1 text-center text-sm font-medium text-gray-900
                focus:outline-none bg-white border border-gray-200 rounded-xl
                hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4
                focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800
                dark:text-gray-400 dark:border-gray-600 dark:hover:text-white
                dark:hover:bg-gray-700"
                wire:click="getTask">
                Daily Report
            </button>
            {{-- <button id="c_flattenTasksGraph"
                class="flex-1 px-3 py-3 m-1 text-center text-sm font-medium text-gray-500
                bg-white border border-gray-200 rounded-xl
                dark:text-gray-400 dark:border-gray-600"
                wire:click="flattenTasksGraph">
                Flat
            </button> --}}
            {{-- <button id=""
                class="flex-1 px-3 py-3 m-1 text-center text-sm font-medium text-gray-500
                bg-white border border-gray-200 rounded-xl

              dark:text-gray-400 dark:border-gray-600" wire:click=""
                disabled>
                getTimeAndDate
            </button> --}}
        </div>

        {{-- Loading Animation For When Http Request is happening. --}}
        {{-- <div class="p-1" wire:loading> --}}
        {{-- <div class="text-blue-400 border-blue-700 border-l-8 p-2 bg-blue-400 bg-opacity-30 animate-pulse">Re-Rendering ...</div> --}}
        {{-- </div> --}}
        {{-- <div class="p-1" wire:loading wire:target="getTask"> --}}
        {{-- <div class="text-blue-400 border-blue-700 border-l-8 p-2 bg-blue-400 bg-opacity-30 animate-pulse">Loading Custom Graph ...</div> --}}
        {{-- </div> --}}
        {{-- <div class="p-1" wire:loading wire:target="flattenTasksGraph"> --}}
        {{-- <div class="text-blue-400 border-blue-700 border-l-8 p-2 bg-blue-400 bg-opacity-30 animate-pulse">Flattening Tasks ...</div> --}}
        {{-- </div> --}}
        {{-- <div class="p-1" wire:loading wire:target="prevPeriod"> --}}
        {{-- <div class="text-blue-400 border-blue-700 border-l-8 p-2 bg-blue-400 bg-opacity-30 animate-pulse">Going Previous Period ...</div> --}}
        {{-- </div> --}}
        {{-- <div class="p-1" wire:loading wire:target="nextPeriod"> --}}
        {{-- <div class="text-blue-400 border-blue-700 border-l-8 p-2 bg-blue-400 bg-opacity-30 animate-pulse">Going Next Period ...</div> --}}
        {{-- </div> --}}
    </div>

    {{-- Dayily Graph Chart --}}
    <div class="flex flex-col">
        <div class="flex justify-end">
            <div class="flex justify-end relative pt-11 pb-2 px-9 border-2 border-red-400 border-opacity-0 w-full">
                <div class="border-2 border-orange-800 border-opacity-50 w-[65%] h-[78vh] relative right-0 box-border">

                    {{-- startTimepointHandle --}}
                    <div class="w-[10%] h-[2px] bg-amber-700 border-t-2 border-t-amber-700 absolute right-full bottom-full">
                        <div class="relative flex flex-row justify-center items-center w-[45px] -translate-x-2/4 -translate-y-2/4 -rotate-90 h-10">
                            <div class="bg-amber-700 flex-[auto] h-px flex items-center justify-start invisible">
                            </div>
                            <div class="bg-amber-700 flex-[auto] h-px flex items-center justify-end ml-[2px]">
                                <div class="w-[1px] h-5 translate-x-full rotate-90 flex justify-end items-center">
                                    <div class="text-amber-200 text-[14px] inline-block pl-1 translate-x-full -translate-y-1/3 whitespace-nowrap">
                                        {{ (new DateTime('@' . $c_startingTimepoint_unix))->setTimezone(new DateTimeZone($c_timezone))->format('Y-m-d H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- endTimepointHandle --}}
                    <div class="w-[10%] h-px bg-amber-700 border-t-2 border-t-amber-700 absolute top-full left-full">
                        <div class="relative flex flex-row justify-center items-center w-[140px] -translate-x-2/4 -translate-y-2/4 -rotate-90 h-10 -right-full">
                            <div class="bg-amber-700 flex-[auto] h-px flex items-center justify-end invisible"></div>
                            <div class="bg-amber-700 flex-[auto] h-px ml-[3px] flex items-center justify-end">
                                <div class="w-[3px] h-5 translate-x-2/4 translate-y-0 rotate-0 flex justify-start items-center">
                                    <div class="text-amber-200 text-[14px] whitespace-nowrap mx-4">
                                        {{ (new DateTime('@' . $c_endingTimepoint_unix))->setTimezone(new DateTimeZone($c_timezone))->format('Y-m-d H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- Now Indicator --}}
                    <div class="box-border absolute flex border-t border-t-yellow-400 w-[125%] -translate-x-[20%] " style="{{ $now['top'] }};visibility:{{ $now['visible'] }}">
                        <div class="box-border flex justify-between bg-gray-500 bg-opacity-60 rounded-sm text-[12px]">
                            <div class="px-2">{{ (new DateTime('@' . $now['unix']))->setTimezone(new DateTimeZone($c_timezone))->format('H:i') }}</div>
                        </div>

                        <div class="box-border absolute flex flex-row -translate-x-full" style="{{ $now['top'] }};">
                            <div class="box-border -translate-y-[65%] mx-1 flex flex-col justify-center items-center">
                                <div class="text-white-500 text-[14px]">
                                    Now
                                </div>
                                {{-- Hour:Minute indicator --}}
                            </div>
                        </div>
                    </div>


                    @isset($dailyTasks)
                        @foreach ($dailyTasks as $_task)
                            <div wire:key="task-{{ $_task['id'] }}">

                                @if ($_task['done'])
                                    <div class="
                                        flex
                                        taskGraphItem
                                        box-border
                                        {{ $_task['translate'] ?? '' }}
                                        {{ $_task['position'] ?? '' }}
                                        w-full
                                        text-[9px]
                                        border-2
                                        border-opacity-70"
                                        style="
                                        {{ $_task['top'] ?? '' }} ;
                                        {{ $_task['height'] ?? '' }};
                                        background: repeating-linear-gradient(-45deg, {{ $_task['color'] }}, {{ $_task['color'] }} 2px, #ffffff00 0, #ffffff00 6px);
                                        border-color: {{ $_task['color'] }}"
                                        >
                                        @else
                                        <div class="flex
                                        taskGraphItem
                                        box-border
                                        {{ $_task['translate'] ?? '' }}
                                        {{ $_task['position'] ?? '' }}
                                        w-full
                                        text-[9px]
                                        border-2
                                        border-opacity-70"
                                            style="
                                        {{ $_task['top'] ?? '' }} ;
                                        {{ $_task['height'] ?? '' }};
                                        border-color: rgb(126, 126, 126)"
                                        >
                                @endif

                                        {{-- Close button next to each task for deleting them. --}}
                                        <div class="absolute right-0 translate-x-full border-t border-yellow-500">
                                            @if ($confirming === $_task['id'])
                                                <div class="text-xs w-6 h-6 -ml-4 translate-x-full -translate-y-1/2 border border-teal-600 bg-teal-500 bg-opacity-20 text-teal-500
                                                    rounded-full cursor-pointer inline-flex justify-center items-center hover:bg-opacity-40 hover:font-bold"
                                                    wire:click="deleteTask({{ $_task['id'] }})">
                                                    &#10003 ?
                                                </div>
                                            @else
                                                <div class="text-xs w-6 h-6 -ml-4 translate-x-full -translate-y-1/2 border border-yellow-600 bg-yellow-500 bg-opacity-20 text-yellow-500
                                                    rounded-full cursor-pointer inline-flex justify-center items-center hover:bg-opacity-40 hover:font-bold"
                                                    wire:click="confirmDelete({{ $_task['id'] }})">
                                                    &#10005
                                                </div>
                                            @endif
                                        </div>

                                        {{-- The Starting point is 100% off by Y Axis so i added translate transform --}}
                                        {{-- I don't know why, but the @class needs to be before the class="". (because the `if statement` not going to work otherwise) --}}
                                        <div @if ($c_targetTaskIdForEdit_ == $_task['id']) @class([
                                            'bg-white',
                                            'bg-opacity-50',
                                            'w-full',
                                            'h-full',
                                            'cursor-pointer',
                                            ]) @endif class="w-full h-full cursor-pointer" wire:click="edit({{ $_task['id'] }})">
                                        </div>

                                        <div class="absolute flex flex-row -translate-x-full">
                                            <div class=" -translate-y-[30%] mx-1 flex flex-col justify-center items-center">
                                                <div @if ($c_targetTaskIdForEdit_ == $_task['id']) @class(['text-teal-500', 'text-[14px]']) @endif class="text-white-500 text-[14px]">
                                                    {{ $_task['description'] }}
                                                </div>
                                                <div @if ($c_targetTaskIdForEdit_ == $_task['id']) @class([
                                                    'bg-teal-500',
                                                    'bg-opacity-40',
                                                    'text-teal-500',
                                                    'text-[12px]',
                                                    'inline-flex',
                                                    'font-medium',
                                                    'underline',
                                                    'cursor-pointer',
                                                    'relative',
                                                    'z-10',
                                                    ]) @endif
                                                    class="text-[12px] inline-flex font-medium text-blue-600 dark:text-gray-500 hover:underline cursor-pointer relative z-10" wire:click="edit({{ $_task['id'] }})"
                                                    >Edit
                                                </div>
                                            </div>

                                            {{-- time indicator --}}
                                            <div class="box-border border border-b-transparent border-r-transparent border-l-transparent border-t-yellow-400 pr-2">
                                                <div class="flex justify-between bg-gray-500 bg-opacity-60 rounded-sm text-[12px]">
                                                    <div class="mx-0.5">{{ (new DateTime('@' . $_task['starting_time']))->setTimezone(new DateTimeZone($c_timezone))->format('H:i') }}</div>
                                                    {{-- Add Additional Space ▼ --}}
                                                    &nbsp
                                                    <div class="mr-1">{{ (new DateTime('@' . $_task['ending_time']))->setTimezone(new DateTimeZone($c_timezone))->format('H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>

                        @endforeach

                    @endisset

            </div>
        </div>
    </div>

    {{-- TasksCategory Duration --}}
    @isset($taskSumOfDurations)
        <div class="text-sm text-amber-400">// Category Summary</div>
        @foreach ($taskSumOfDurations as $category => $duration)
            <div class="text-sm">{{ $category }} <span class="text-amber-400">{{ substr($duration / 3600, 0, 4) }}</span> h<span> &nbsp; | &nbsp; </span><span
                    class="text-amber-600">{{ (substr($duration / 3600, 0, 4) / (($c_endingTimepoint_unix - $c_startingTimepoint_unix) / 60 / 60)) * 100 }}</span> % </div>
        @endforeach
        {{-- This if statement needs fix. --}}
        <div class="text-sm text-amber-400">// Total Summary</div>
        @if ($now['visible'] == 'visible')
            <div class="text-sm">Used <span class="text-amber-400">{{ substr(array_sum($taskSumOfDurations) / 60 / 60, 0, 4) }}</span> h <span> &nbsp; | &nbsp; </span><span
                    class="text-amber-600">{{ substr((array_sum($taskSumOfDurations) / 60 / 60 / (($c_endingTimepoint_unix - $c_startingTimepoint_unix) / 60 / 60)) * 100, 0, 4) }}</span> % </div>
            <div class="text-sm">Remained <span class="text-amber-400">{{ substr(($c_endingTimepoint_unix - $now['unix']) / 60 / 60, 0, 4) }}</span> h <span> &nbsp; | &nbsp;
                </span><span
                    class="text-amber-600">{{ substr((($c_endingTimepoint_unix - $now['unix']) / ($c_endingTimepoint_unix - $c_startingTimepoint_unix)) * 100, 0, 4) }}</span>
                %
            </div>
            <div class="text-sm">Unknown <span
                    class="text-amber-400">{{ substr(($now['unix'] - $c_startingTimepoint_unix - array_sum($taskSumOfDurations)) / 60 / 60, 0, 4) }}</span>
                h <span> &nbsp; | &nbsp;
                </span><span class="text-amber-600">
                    {{ substr((($now['unix'] - $c_startingTimepoint_unix - array_sum($taskSumOfDurations)) / ($c_endingTimepoint_unix - $c_startingTimepoint_unix)) * 100, 0, 4) }}</span>
                %
            </div>
        @endif
    @endisset
    {{-- TasksCategory Description --}}
    @isset($tasksSortedByDescription_Sum)
        <div class="text-sm text-amber-400">// Detailed Summary</div>
        @foreach ($tasksSortedByDescription_Sum as $category => $duration_sum)
            <div class="text-sm text-gray-300">{{ $category }}<span class="text-orange-400">{{ $duration_sum / 60 }}</span><span> m </span><span
                    class="text-amber-400">{{ substr($duration_sum / 60 / 60, 0, 4) }}</span><span> h </span></div>
        @endforeach
    @endisset
</div>
</div>

@script('script')
    <script>
        // console.log('CustomChart Script Loaded.')

        $("#c_targetDate").on("change", () => {
            copyDate("#c_targetDate", "#c_startingDatepoint");
            copyDate("#c_targetDate", "#c_endingDatepoint");
            giveDateObject("#c_startingDatepoint", "#c_startingTimepoint", "#c_startingTimepoint_unix");
            giveDateObject("#c_endingDatepoint", "#c_endingTimepoint", "#c_endingTimepoint_unix");
            document.getElementById("c_startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_startingDatepoint").dispatchEvent(new Event('input'));
            document.getElementById("c_endingDatepoint").dispatchEvent(new Event('input'));
        });

        $("#c_startingTimepoint").on("change", () => {
            giveDateObject("#c_startingDatepoint", "#c_startingTimepoint", "#c_startingTimepoint_unix");
            document.getElementById("c_startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_startingTimepoint").dispatchEvent(new Event('input'));
        });

        $("#c_endingTimepoint").on("change", () => {
            giveDateObject("#c_endingDatepoint", "#c_endingTimepoint", "#c_endingTimepoint_unix");
            document.getElementById("c_endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_endingTimepoint").dispatchEvent(new Event('input'));
            // console.log('c_endingTimepoint on change');
        });
        $("#c_startingTimepoint_unix").on("change", () => {
            giveDateObject("#c_startingDatepoint", "#c_startingTimepoint", "#c_startingTimepoint_unix");
            document.getElementById("c_startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_startingTimepoint").dispatchEvent(new Event('input'));
        });
        $("#c_endingTimepoint_unix").on("change", () => {
            giveDateObject("#c_endingDatepoint", "#c_endingTimepoint", "#c_endingTimepoint_unix");
            document.getElementById("c_endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_endingTimepoint").dispatchEvent(new Event('input'));
            // console.log('c_endingTimepoint on change');
        });
        $('#c_flattenTasksGraph').on('click', function() {
            console.log('c_flattenTasksGraph');
        });

        $('#c_customDebug').on('click', function() {
            console.group("c_customDebug");
            let date = new Date(parseInt($('#c_startingTimepoint_unix').val()));
            let date2 = new Date(parseInt($('#c_endingTimepoint_unix').val()));
            //
            console.log('c_startingTimepoint_unix', date, $('#c_startingTimepoint_unix').val());
            console.log('c_endingTimepoint_unix', date2, $('#c_endingTimepoint_unix').val());
            console.groupEnd();
        });

        $("#c_startingDatepoint").on("change", () => {
            giveDateObject("#c_startingDatepoint", "#c_startingTimepoint", "#c_startingTimepoint_unix");
            document.getElementById("c_startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_startingTimepoint").dispatchEvent(new Event('input'));

        });

        $("#c_endingDatepoint").on("change", () => {
            giveDateObject("#c_endingDatepoint", "#c_endingTimepoint", "#c_endingTimepoint_unix");
            document.getElementById("c_endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("c_endingTimepoint").dispatchEvent(new Event('input'));

        });
        // for all input[date], to be selectable with just clicking anywhere on input. (not just date picker icon)
        $("#c_targetDate_Container").on("click", () => {
            document.querySelector("#c_targetDate").showPicker();
        });
        $("#c_startingDateContainer").on("click", () => {
            document.querySelector("#c_startingDatepoint").showPicker();
        });
        $("#c_endingDateContainer").on("click", () => {
            document.querySelector("#c_endingDatepoint").showPicker();
        });

        {{-- Get the user's timezone from the browser(js) and set it to the Livewire component property 'c_timezone' --}}
        const tz_c = Intl.DateTimeFormat().resolvedOptions().timeZone;
        // console.log('custom-chart_timezone:',tz);
        $wire.set('c_timezone', tz_c);

    </script>
@endscript
