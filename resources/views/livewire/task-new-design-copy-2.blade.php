<div class="min-h-screen bg-slate-900 px-4 text-white relative">

    {{-- Component Inspector --}}
    @env('local')
    <div class="bg-black p-2 border border-amber-800">
        {{-- A simple debugger. It's helping me remember, what component I am on. --}}
        <div class="flex flex-col border border-amber-700 px-1 text-[12px] text-yellow-500 bg-black">
            <span class="whitespace-nowrap">view: resources\views\livewire\task-new-design.blade.php</span>
            <span>controller: {{ get_class($this) }}.php</span>
        </div>

        {{-- Components Debugger Information (PHP side) --}}
        <div class="text-amber-600 text-[12px]">
            $timezone= <span class="text-amber-100">{{ $timezone ?? 'Not Set' }}</span><br>
            $taskCategory= <span class='text-amber-100'>{{ $taskCategory ?? 'Not Set' }}</span> <br>
            $taskDescription= <span class="text-amber-100">{{ $taskDescription ?? 'Not Set' }}</span><br>
            $startingTimepoint_unix= <span class="text-amber-100">{{ $startingTimepoint_unix ?? 'Not Set' }}</span><br>
            $endingTimepoint_unix= <span class="text-amber-100">{{ $endingTimepoint_unix ?? 'Not Set' }}</span><br>
            $startingTimepoint= <span class="text-amber-100">{{ $startingTimepoint ?? 'Not Set' }}</span><br>
            $endingTimepoint= <span class="text-amber-100">{{ $endingTimepoint ?? 'Not Set' }}</span><br>
            $startingDatepoint= <span class="text-amber-100">{{ $startingDatepoint ?? 'Not set' }}</span><br>
            $endingDatepoint= <span class="text-amber-100">{{ $endingDatepoint ?? 'Not set' }}</span><br>
            $targetTaskIdEdit= <span class="text-amber-100">{{ $targetTaskIdEdit ?? 'Not set' }}</span><br>
            ${{-- TODO: rename these variables later. $category_distinct_desc, $category_description_distinct_desc  --}}
            $category_distinct_desc= <span class="text-amber-100">{{ isset($category_distinct_desc) ? 'Set' : 'Not Set' }}</span><br>
            $category_description_distinct_desc= <span class="text-amber-100">{{ isset($category_description_distinct_desc) ? $category_description_distinct_desc : 'Not Set' }}</span><br>
            $taskDone= <span class="text-amber-100">{{ isset($taskDone) ? ($taskDone ? 'true' : 'false') : 'Not set' }}</span><br>
            $sortedCategoriesByCategory=
            <pre class="text-amber-100 text-[12px] overflow-auto max-h-36">{{ json_encode($sortedCategoriesByCategory, JSON_PRETTY_PRINT) }}</pre>
            <span class="text-red-400 text-[12px]">errors:</span>
            <pre class="text-red-300 text-[12px] overflow-auto max-h-36">{{ print_r($errors->toArray(), true) }}</pre>
            {{-- Errors Begin --}}
            {{-- Returns true if there is at least one validation error in the error bag. --}}
            @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    {{-- $errors->all() Returns a flat array of all error messages as strings. --}}
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

    {{-- Components Debugger Information (JS side) --}}
    <div class="bg-black p-2 border border-fuchsia-900">
        {{-- Title --}}
        <div class="flex flex-col border border-fuchsia-700 px-1 text-[12px] text-fuchsia-400 bg-black">
            <span class="whitespace-nowrap flex justify-center">@for($i=0;$i<40;$i++)-@endfor JavaScript @for($i=0;$i<40;$i++)-@endfor</span>
        </div>

        {{-- JS Info --}}
        <div id="" class="text-fuchsia-500 text-[11px] w-full">
            #targetDate= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="targetDateDebugger">{{ $startingDatepoint }}</span><br>
            #taskCategory= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="taskCategoryDebugger">{{ $taskCategory ?? 'Not Set' }}</span><br>
            #taskDescription= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="taskDescriptionDebugger">{{ $taskDescription ?? 'Not Set' }}</span><br>

            startingTimepoint_unix= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="startingTimepoint_unixDebugger">{{ $startingTimepoint_unix ?? 'Not Set' }}</span><br>
            endingTimepoint_unix= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="endingTimepoint_unixDebugger">{{ $endingTimepoint_unix ?? 'Not Set' }}</span><br>

            startingTimepoint= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="startingTimepointDebugger">{{ $startingTimepoint ?? 'Not Set' }}</span><br>
            endingTimepoint= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="endingTimepointDebugger">{{ $endingTimepoint ?? 'Not Set' }}</span><br>
            startingDatepoint= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="startingDatepointDebugger">{{ $startingDatepoint ?? 'Not Set' }}</span><br>
            endingDatepoint= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="endingDatepointDebugger">{{ $endingDatepoint ?? 'Not Set' }}</span><br>
            targetTaskIdEdit= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="targetTaskIdEditDebugger">{{ $targetTaskIdEdit ?? 'Not Set' }}</span><br>
            category_distinct_desc= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="category_distinct_descDebugger">{{ $category_distinct_desc ?? 'Not Set' }}</span><br>
            category_description_distinct_desc= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="category_description_distinct_descDebugger">{{ $category_description_distinct_desc ?? 'Not Set' }}</span><br>
            taskDone= <span class="text-fuchsia-200 [animation-duration:500ms] animate-none" id="taskDoneDebugger">{{ $taskDone ?? 'Not Set' }}</span><br>
        </div>
    </div>

    @endenv
    {{-- There is this hidden input for editing a given task. When the user edits a task, the data gets into this input from backend. --}}
    <input type="hidden" id="targetTaskIdEdit" name="targetTaskIdEdit" wire:model.defer="targetTaskIdEdit" class="w-32 border-2 border-indigo-500" value="{{ $targetTaskIdEdit }}" readonly>

    <div class="relative mx-auto max-w-md rounded-md border border-slate-700 bg-slate-800 p-0">
        {{-- Livewire pulsating background. Meaning it is still retrieving datas from the server.  --}}
        <div wire:loading class="absolute w-full h-full z-20 rounded-md bg-yellow-400 animate-pulse bg-opacity-30 border border-yellow-600"></div>

    {{-- Log Activity Modal 🤪--}}
        <div class="p-6">
            <h2 class="mb-2 text-xl font-semibold">Log Activity</h2>

            {{-- The Current Date --}}
            <div class="flex flex-wrap items-center gap-1">
                <label class="text-sm text-slate-400" for="targetDate"> Date </label>

                <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                <div class="w-full m-0 p-0"></div>

                <button class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 active:border active:border-amber-500" id="taskPrevPeriod" {{--wire:click="prevPeriod"--}}>↺</button>
                <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" type="date" id="targetDate" value="{{ $startingDatepoint }}">
                <button class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 active:border active:border-amber-500" id="taskNextPeriod" {{--wire:click="nextPeriod"--}}>↻</button>

                <button class="rounded-lg border border-slate-600 bg-slate-700 px-3 py-2 m-0" disabled id="setNowTime">Now</button>
                <button class="rounded-lg border border-slate-600 bg-slate-700 px-3 py-2 m-0" disabled id="switchHours">Switch</button>
            </div>

            {{-- Starting and Ending Date & Time points Container --}}
            <div class="space-y-1" x-data="{ isRotated: false, isOpen: false}">
                {{-- Starting and Ending Date & Time points --}}
                <div class="grid grid-cols-2 gap-0">
                    {{-- Starting Date & Time --}}
                    <div class="flex items-start flex-wrap gap-1 py-1">
                        <label class="text-sm text-slate-400 px-0 py-1"> Start </label>

                        <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" id="startingDatepoint" type="date" value="{{ $startingDatepoint }}" >

                        <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="startingTimepoint" type="time" value="{{ $startingTimepoint }}" wire:model.defer="startingTimepoint" />

                        <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-2 inline-flex hover:bg-gray-700 active:border active:border-amber-500" id="setNowTimeForStartingHourAndMinute">Now</button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="startingTimepoint_unix" wire:model.defer="startingTimepoint_unix" name="startingTimepoint_unix" type="hidden" value="{{ $startingTimepoint_unix }}" />
                    </div>

                    {{-- Ending Date & Time --}}
                    <div class="flex items-start flex-wrap gap-1 py-1">
                        <label class="text-sm text-slate-400 px-0 py-1"> End </label>

                        <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" id="endingDatepoint" type="date" value="{{ $endingDatepoint }}" >

                        <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="endingTimepoint" type="time" value="{{ $endingTimepoint }}" wire:model.defer="endingTimepoint"/>

                        <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-2 inline-flex hover:bg-gray-700 active:border active:border-amber-500" id="setNowTimeForEndingHourAndMinute">Now</button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="endingTimepoint_unix" wire:model.defer="endingTimepoint_unix" name="endingTimepoint_unix" type="hidden" value="{{ $endingTimepoint_unix }}" />
                    </div>
                </div>

                {{-- Ready Time Blocks --}}
                <div class="my-2 pb-2 flex gap-1 overflow-auto">

                    <x-suggestion-chip class="flex flex-row" color="amber" active="true" id="customDuration" x-on:click="isRotated = !isRotated; isOpen = !isOpen">
                        Custom
                        <div class="transition-transform duration-300 cursor-pointer"
                            :class="{ 'rotate-180': isRotated }">
                            ▼
                        </div>
                    </x-suggestion-chip>

                    <x-suggestion-chip class="timeBlockAutoSetter" minute="10">10m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="15">15m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="30">30m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="45">45m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="60">1h</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="75">1h15m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="90">1h30m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="105">1h45m</x-suggestion-chip>
                    <x-suggestion-chip class="timeBlockAutoSetter" minute="120">2h</x-suggestion-chip>
                </div>

                {{-- TimeRangePicker --}}
                <div class="border border-amber-800 rounded-md p-1"
                     id="timeRangePicker"
                     x-show="isOpen"
                     x-transition:enter="transition-colors duration-500"
                     x-transition:enter-start="bg-amber-400"
                     x-transition:enter-end="bg-transparent"
                     x-data="{ minuteTimeRangePicker: 0 , hourTimeRangePicker: 0 }"
                     >

                     {{-- Minute 0~59 --}}
                    <div class="text-sm text-slate-400 inline-block"> Minute 0~59 </div>
                    <div id="minuteTimeRangeShower" class="inline text-sm border border-amber-600 rounded-md bg-slate-800 px-2 py-0 text-amber-600" x-text="minuteTimeRangePicker"></div>

                    <div class="flex">
                        <button id="minuteTimeRangePicker_prev" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400" x-on:click="minuteTimeRangePicker = Math.max(0, minuteTimeRangePicker - 1);updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)">◁</button>
                        <input  id="minuteTimeRangePicker" type="range" min="0" max="59" step="1" class="w-full" value="0" x-model.number="minuteTimeRangePicker" x-on:change="updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)"/>
                        <button id="minuteTimeRangePicker_next" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400" x-on:click="minuteTimeRangePicker = Math.min(59, minuteTimeRangePicker + 1);updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)">▷</button>
                    </div>

                    {{-- Hour 0~23 --}}
                    <div class="text-sm text-slate-400 inline-block"> Hour 0~23 </div>
                    <div id="hourTimeRangeShower" class="inline text-sm border border-amber-600 rounded-md bg-slate-800 px-2 py-0 text-amber-600" x-text="hourTimeRangePicker"></div>

                    <div class="flex">
                        <button id="hourTimeRangePicker_prev" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400" x-on:click="hourTimeRangePicker = Math.max(0, hourTimeRangePicker - 1);updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)">◁</button>
                        <input  id="hourTimeRangePicker" type="range" min="0" max="23" step="1" class="w-full" value="0" x-model.number="hourTimeRangePicker" x-on:change="updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)"/>
                        <button id="hourTimeRangePicker_next" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400" x-on:click="hourTimeRangePicker = Math.min(23, hourTimeRangePicker + 1);updateEndingTimePointViaTimeRangePicker(hourTimeRangePicker, minuteTimeRangePicker)">▷</button>
                    </div>
                </div>

                {{-- Duration --}}
                <div class="p-0">
                    <label class="text-sm text-slate-400" for="Duration">Duration</label>
                    <br>
                    <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="Duration" type="text" value="0" readonly />
                </div>

                {{-- Category (taskCategory) --}}
                <div>
                    <label class="mb-1 block text-sm text-slate-400" for="taskCategory"> Category </label>

                    @error('taskCategory')
                        <div class="flex-auto w-full text-center">
                            <div class="text-red-500 text-[1rem]">{{ $message }}</div>
                        </div>
                    @enderror

                    <input id="taskCategory" wire:model.defer="taskCategory" name="taskCategory" type="text" placeholder="Coding, Breakfast, YouTube..."
                        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 focus:outline-none" />

                    <div class="my-1 pb-2 flex overflow-auto gap-1 ">
                        @for ($i = 0; $i < count($sortedCategoriesByCategory_ArrayKeys); $i++)
                            <x-suggestion-chip class="categoryAutoSetter">{{ $sortedCategoriesByCategory_ArrayKeys[$i] }}</x-suggestion-chip>
                        @endfor
                    </div>
                </div>

                {{-- Description --}}
                <div>
                    <label class="mb-1 block text-sm text-slate-400" for="taskDescription"> Details (optional) </label>

                    @error('taskDescription')
                        <div class="flex-auto w-full text-center">
                            <div class="text-red-500 text-[1rem]">{{ $message }}</div>
                        </div>
                    @enderror

                    <textarea id="taskDescription" wire:model.defer="taskDescription" name="taskDescription" type="text" rows="3" placeholder="Played Elden Ring and had fun"
                        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-3 py-2"></textarea>

                    <div id="descriptionAutoSetterContainer" class="flex w-full gap-1 overflow-auto pb-2">
                        @foreach ($categories as $category)
                            <x-suggestion-chip color="{{$category['color']}}" class="descriptionAutoSetter">{{ $category['description'] }}</x-suggestion-chip>
                        @endforeach
                    </div>
                </div>

                <div>
                    @if (session()->has('store_validator_fail'))
                        <div class="bg-yellow-500 bg-opacity-50 border-l-8 border-yellow-600 text-yellow-500 p-2 mb-1">
                            {{ session('store_validator_fail') }} <div class="text-yellow-500 inline-flex justify-center items-center border-2 border-yellow-500 rounded-full w-5 h-5 mx-1"><b>!</b></div>
                        </div>
                    @endif
                    @if (session()->has('update_validator_fail'))
                        <div class="bg-yellow-500 bg-opacity-50 border-l-8 border-yellow-600 text-yellow-500 p-2 mb-1">
                            {{ session('update_validator_fail') }} <div class="text-yellow-500 inline-flex justify-center items-center border-2 border-yellow-500 rounded-full w-5 h-5 mx-1"><b>!</b></div>
                        </div>
                    @endif
                    @if (session()->has('successfull_message'))
                        <div class="bg-green-500 bg-opacity-50 border-l-8 border-green-600 text-green-500 p-2 mb-1">
                            {{ session('successfull_message') }} <span class="text-green-500">&#10003</span>
                        </div>
                    @endif
                    @if (session()->has('unsuccessfull_message'))
                        <div class="bg-red-500 bg-opacity-50 border-l-8 border-red-700 border-opacity-90 text-red-600 text-opacity-80 p-2 mb-1">
                            {{ session('unsuccessfull_message') }} <span class="text-red-600">&#10005</span>
                        </div>
                    @endif
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 pt-2">
                    <button wire:click="store" class="flex-1 rounded-lg bg-amber-500 py-3 font-medium text-black">Done <span class="font-bold">✓</span></button>

                    <button class="rounded-lg border border-slate-600 px-5 py-3">Close X</button>
                </div>
            </div>
        </div>

    </div>

</div>

@script
    {{-- Get the user's timezone from the browser(js) and set it to the Livewire component property 'timezone' --}}
    <script>
        const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
        // console.log('task-new-design_timezone:',tz);
        $wire.set('timezone', tz);
    </script>
@endscript

@push('script')
<script>















        $('#taskNextPeriod').on('click', function() {
            let currentDate = new Date($('#targetDate').val());
            currentDate.setDate(currentDate.getDate() + 1);
            let nextDate = currentDate.toISOString().split('T')[0];
            let nextDate_unix = (newDate.getTime()).toString().substring(0, 10); // 1721053800000 -> "1721053800"
            $('#targetDate').val(nextDate);
            $('#startingDatepoint').val(nextDate);
            $('#endingDatepoint').val(nextDate);
            // $('#endingTimepoint_unix').val(nextDate_unix);
            document.getElementById("targetDate").dispatchEvent(new Event('input'));
            // console.log( '#' + $(this).attr('id') + ' : ' + nextDate);
            $('#targetDateDebugger').text(nextDate);
            pulseTargetDebugger('#targetDateDebugger');

        });

        $('#taskPrevPeriod').on('click', function() {
            let currentDate = new Date($('#targetDate').val());
            currentDate.setDate(currentDate.getDate() - 1);
            let nextDate = currentDate.toISOString().split('T')[0];
            $('#targetDate').val(nextDate);
            $('#startingDatepoint').val(nextDate);
            $('#endingDatepoint').val(nextDate);
            document.getElementById("targetDate").dispatchEvent(new Event('input'));
            // console.log( '#' + $(this).attr('id') + ' : ' + nextDate);
            $('#targetDateDebugger').text(nextDate);
            pulseTargetDebugger('#targetDateDebugger');
        });

        /*
        * Temporarily applies a pulse animation to a given element.
        * Each element maintains its own timeout so multiple elements can be animated independently.
        * If the same element is triggered again before the timer finishes, the previous timer is reset.
        */
        function pulseTargetDebugger(element) {
            var $element = $(element);
            // Cancel previous animation reset timer for this element
            clearTimeout($element.data('pulseTimeout'));
            // First, enables the animation
            $element.removeClass('animate-none').addClass('animate-pulse');
            // Then after some miliseconds, gets back to the idle state
            var timeout = setTimeout(function () {
                $element.removeClass('animate-pulse').addClass('animate-none');
            }, 800);
            // storing the timeout inside the element
            $element.data('pulseTimeout', timeout);
        }

        /* This function for the time range picker when you want to go alpine route */
        function updateEndingTimePointViaTimeRangePicker(hour, minute) {
            let staringTimepoint_unix_js = parseInt($("#startingTimepoint_unix").val());
            let timeRangeDuration = (hour * 60 * 60) + (minute * 60);
            let newEndingTimePoint_unix_js = staringTimepoint_unix_js + timeRangeDuration;
            $("#endingTimepoint_unix").val(newEndingTimePoint_unix_js);
            let date = new Date(newEndingTimePoint_unix_js * 1000);
            let hours   = String(date.getHours()).padStart(2, '0');
            let minutes = String(date.getMinutes()).padStart(2, '0');
            let time = `${hours}:${minutes}`;
            $('#endingTimepoint').val(time.toString());
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            updtateDuration();
        }

        // The variables for category on click, shows each description for that specific category
        let sortedCategoriesByCategory_ENCODED = @json($sortedCategoriesByCategory_ENCODED);
        var sortedCategoriesByCategory_ENCODED_Parsed = (JSON.parse(sortedCategoriesByCategory_ENCODED));

        // For all the input[date], to be selectable with just clicking anywhere on input. (not just date picker icon). Ignoring "Power Users" >:D | Wait, that's me :(
        $("#startingDateContainer").on("click", () => {
            // document.querySelector("#startingDate").showPicker();
        });

        $("#startingTimepoint").on("change", () => {
            giveDateObject("#startingDatepoint", "#startingTimepoint", "#startingTimepoint_unix");
            document.getElementById("startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("startingTimepoint").dispatchEvent(new Event('input'));
        });

        $("#endingTimepoint").on("change", () => {
            giveDateObject("#endingDatepoint", "#endingTimepoint", "#endingTimepoint_unix");
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("endingTimepoint").dispatchEvent(new Event('input'));
            // console.log('endingTimepoint is changing');
        });

        /*
         * Creates a new date from given date(dateInput param) and hour(input param) input and puts it in output(output param).
         * Parameters: dateInput - input[type=date] 2023-06-09
         *             timeInput - input[type=text] 02:00
         *             output    - input[type=text] 1654889000 unix
         */
        function giveDateObject(dateInput, timeInput, output) {
            timeInput = String(timeInput);
            output = String(output);

            // Getting the day, month, year from targetDate input and creating a date
            let purifiedDate = $(dateInput).val().replaceAll('-', ''); // 2023-06-09 => 20230609
            let year = purifiedDate.slice(0, 4); // 20230609 => 2023

            // And do not forget that js month is starting from '0'
            let month = purifiedDate.slice(4, 6) - 1; // 20230609 => 06 - 1 = 5
            let day = purifiedDate.slice(6, 8); // 20230609 => 09

            // Creates a new date from seperated parameters.(year, month, day)
            let date = new Date(year, month, day);

            // And no miliseconds in parameter :)
            date.setSeconds(0);

            // Gets hours and minutes from given input and uses them to set the new date's hours and minutes.
            let hours = $(timeInput).val().replace(':', '').slice(0, 2); // 02:14 => 0214 => 02
            let minutes = $(timeInput).val().replace(':', '').slice(2, 4); // 02:14 => 0214 => 14
            date.setHours(hours);
            date.setMinutes(minutes);

            let unixTenDigits = date.getTime().toString();
            $(output).val(unixTenDigits.slice(0, 10));

            updtateDuration();
        }

        /**
         * Formats a duration in seconds into a string of Days, Hours, Minutes, Seconds, and Milliseconds.
         * * @param {number} duration - The total duration in seconds (can include fractional decimals).
         * @returns {string} : "D HH:MM:SS.m" (ex: 1 03:55:23.6)
         */
        function formatSecondsToDaysHMS(duration) {

            // Isolates the decimal remainder and divides | duration = 262865.75 -> (262865.75 % 1) / 100 = 0.0075 -> parseInt(0.0075) => 0
            // NOTE: Milliseconds are currently returned as a single digit (0-9).
            // For 3-digit milliseconds (e.g., "500"), use:
            // milliseconds = Math.round((duration % 1) * 1000).toString().padStart(3, '0');
            var milliseconds = parseInt((duration % 1) / 100);

            // Extracts remaining seconds (0-59) | duration = 262865.75 -> (262865.75 / 1) % 60 = 5.75 -> Math.floor(5.75) => 5
            var seconds = Math.floor((duration / 1) % 60);

            // Converts to total minutes and extracts the remainder (0-59) | duration = 262865.75 -> (262865.75 / 60) % 60 = 4381.09 % 60 = 1.095 -> Math.floor(1.095) => 1
            var minutes = Math.floor((duration / (1 * 60)) % 60);

            // Converts to total hours and extracts the remainder (0-23) | duration = 262865.75 -> (262865.75 / 3600) % 24 = 73.018 % 24 = 1.018 -> Math.floor(1.018) => 1
            var hours = Math.floor((duration / (1 * 60 * 60)) % 24);

            // Divides by total seconds in a day (86400) to get full days | duration = 262865.75 -> 262865.75 / 86400 = 3.042 -> Math.floor(3.042) => 3
            var day = Math.floor(duration / (1 * 60 * 60 * 24));

            // Pads hours with a leading zero if under 10 | 1 < 10 -> "0" + 1 => "01"
            var hours = hours < 10 ? "0" + hours : hours;

            // Pads minutes with a leading zero if under 10 | 1 < 10 -> "0" + 1 => "01"
            minutes = minutes < 10 ? "0" + minutes : minutes;

            // Pads seconds with a leading zero if under 10 | 5 < 10 -> "0" + 5 => "05"
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Combines all calculated units into the final format | 3 + " " + "01" + ":" + "01" + ":" + "05" + "." + 0 => "3 01:01:05.0"
            return day + " " + hours + ":" + minutes + ":" + seconds + "." + milliseconds;
        }

        /**
         * abs(startingTimePoint - endingTimePoint)
         * @returns {void} Updates the DOM element with ID "Duration" directly.
         */
        function updtateDuration() {
            let new_startingTimePoint = document.getElementById("startingTimepoint_unix").value; // "startingTimepoint_unix" => "1719878400"
            let new_endingTimePoint = document.getElementById("endingTimepoint_unix").value;     // "endingTimepoint_unix" => "1720141265"
            let difference = Math.abs(new_startingTimePoint - new_endingTimePoint);                  // Math.abs(1719878400 - 1720141265) => 262865
            document.getElementById("Duration").value = formatSecondsToDaysHMS(difference);  // formatSecondsToDaysHMS(262865) => "3 01:01:05.0"
        }

        // updtateDuration();

        // duration=546 sec: 546/60= 9.1 min => Math.floor(9.1)= 9 min
        function secToMin(duration) {
            return Math.floor(duration / (60));
        }

        /**
         * Click event handler that captures the current local time, updates both human-readable
         * and Unix timestamp starting timepoint fields, and triggers a duration update.
         * * @returns {void} Updates DOM elements directly via jQuery and native events.
         */
        $('#setNowTimeForStartingHourAndMinute').on('click', function() {
            let newDate = new Date();
            newDate.setSeconds(0);
            // Fixes when the clock becomes one digit number, and makes them 2 digits.
            // "0" + newDate.getHours() | 9 -> "09" / 14 -> "014" | "09" .slice(-2) -> "09" / "014" .slice(-2) -> "14"
            $('#startingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));
            let newDateUnixTimestamp = (newDate.getTime()).toString().substring(0, 10); // 1721053800000 -> "1721053800"
            $('#startingTimepoint_unix').val(newDateUnixTimestamp);
            $('#startingTimepoint_unixDebugger').text(newDateUnixTimestamp);
            pulseTargetDebugger('#startingTimepoint_unixDebugger');
            pulseTargetDebugger('#startingTimepointDebugger');
            pulseTargetDebugger('#startingDatepointDebugger');
            // console.log($('#startingTimepoint_unix').val());
            // Dispatches a native input event to alert listeners of programmatic changes
            document.getElementById("startingTimepoint_unix").dispatchEvent(new Event('input'));
            updtateDuration();
        });

        $('#setNowTimeForEndingHourAndMinute').on('click', function() {
            let newDate = new Date(); // Wed Jul 15 2026 21:04:19 GMT+0330 (Iran Standard Time) | 2026-07-15T18:27:23.925Z ( toISOString() )
            newDate.setSeconds(0); // 21:04:19 -> 21:04:00
            // newDate.getHours() => 21 | ("0")+(21) -> (021).slice(-2) -> "21" | newDate.getMinutes() => ("0")+(5) -> (05).slice(-2) -> "05" ==> "21:05"
            $('#endingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));
            /*
             * Key note: Unix timestamp (seconds): 1721053800 (10 digits)
             * JavaScript timestamp (milliseconds): 1721053800000 (13 digits)
             */
            let newDateUnixTimestamp = (newDate.getTime()).toString().substring(0, 10); // 1721053800000 -> "1721053800"
            $('#endingTimepoint_unix').val(newDateUnixTimestamp);
            // console.log('endingTimepoint',typeof $('#endingTimepoint').val(), $('#endingTimepoint').val());
            // console.log('endingTimepoint_unix:',typeof $('#endingTimepoint_unix').val(), $('#endingTimepoint_unix').val());
            $('#endingTimepoint_unixDebugger').text(newDateUnixTimestamp);
            pulseTargetDebugger('#endingTimepoint_unixDebugger');
            pulseTargetDebugger('#endingTimepointDebugger');
            pulseTargetDebugger('#endingDatepointDebugger');
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input')); //
            updtateDuration();
            // $('#endingTimepoint').trigger('change');

        });

        $('.categoryAutoSetter').on('click', function() {
            $('#taskCategory').val($(this).text().trim());
            $('#taskCategoryDebugger').text($(this).text().trim());
            pulseTargetDebugger('#taskCategoryDebugger');
            let arr = sortedCategoriesByCategory_ENCODED_Parsed[$(this).text().trim()];
            $("#descriptionAutoSetterContainer").html('');

            $.each(arr, function(index, value) {
                $("#descriptionAutoSetterContainer").append(
                    '<div class="cursor-pointer whitespace-nowrap rounded-lg border bg-slate-700 px-2 py-1 select-none border-l-4 descriptionAutoSetter" style="border-color: ' + value.color +
                    '; color: ' + value.color + ';">' + value.description + '</div>');
            });

            $('.descriptionAutoSetter').on('click', function() {
                $('#taskDescription').val($(this).text().trim());
                document.getElementById("taskDescription").dispatchEvent(new Event('input'));
                $('#taskDescriptionDebugger').text($(this).text().trim());
                pulseTargetDebugger('#taskDescriptionDebugger');
            });

            document.getElementById("taskCategory").dispatchEvent(new Event('input'));
        });

        // Because the first time, 'onclick' hasn't being set when the page load. So I added this part to cover the first time :)
        $('.descriptionAutoSetter').on('click', function() {
            $('#taskDescription').val($(this).text().trim());
            $('#taskDescriptionDebugger').text($(this).text().trim());
            pulseTargetDebugger('#taskDescriptionDebugger');
            document.getElementById("taskDescription").dispatchEvent(new Event('input'));
        });

        $(".timeBlockAutoSetter").on("click", function() {
            let staringTimepoint_unix_js = parseInt($("#startingTimepoint_unix").val());
            // console.log('staringTimepoint_unix_js:',typeof staringTimepoint_unix_js, staringTimepoint_unix_js);
            let blockTimeDuration = ($(this).attr('minute') * 60);
            // console.log('blockTimeDuration:',typeof blockTimeDuration, blockTimeDuration);
            let newEndingTimePoint_unix_js = staringTimepoint_unix_js + blockTimeDuration;
            // console.log('newEndingTimePoint_unix_js:',typeof newEndingTimePoint_unix_js, newEndingTimePoint_unix_js);
            // console.log("#endingTimepoint_unix before:",typeof $("#endingTimepoint_unix").val(), $("#endingTimepoint_unix").val());
            $("#endingTimepoint_unix").val(newEndingTimePoint_unix_js);
            // let dick = $("#endingTimepoint_unix").val();
            // console.log("$(\"#endingTimepoint_unix\").val():",typeof dick, dick);
            // JavaScript's Date constructor expects a Unix timestamp in milliseconds *1000
            // console.log(':',typeof , );
            let date = new Date(newEndingTimePoint_unix_js * 1000);
            let hours   = String(date.getHours()).padStart(2, '0');
            let minutes = String(date.getMinutes()).padStart(2, '0');
            let time = `${hours}:${minutes}`;
            $('#endingTimepoint').val(time.toString());
            // console.log('endingTimepoint',typeof $('#endingTimepoint').attr('value'),$('#endingTimepoint').attr('value'));
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            updtateDuration();
        });

        /* This function for the time range picker when you have built with JQuery*/

        /*
        $('#minuteTimeRangePicker_prev').on('click', function () {
            let minute = $('#minuteTimeRangePicker').val();
            let newMinute = Math.max(0 , parseInt(minute)-1 );
            $('#minuteTimeRangePicker').val(newMinute);
            $('#minuteTimeRangeShower').html($('#minuteTimeRangePicker').val());
            updateEndingTimePointViaTimeRangePicker();
        });

        $('#minuteTimeRangePicker_next').on('click', function () {
            let minute = $('#minuteTimeRangePicker').val();
            let newMinute = Math.min(59 , parseInt(minute) + 1);
            $('#minuteTimeRangePicker').val(newMinute);
            $('#minuteTimeRangeShower').html($('#minuteTimeRangePicker').val());
            updateEndingTimePointViaTimeRangePicker();
        });

        $('#hourTimeRangePicker_prev').on('click', function () {
            let hour = $('#hourTimeRangePicker').val();
            let newHour = Math.max(0 , parseInt(hour)-1 );
            $('#hourTimeRangePicker').val(newHour);
            $('#hourTimeRangeShower').html($('#hourTimeRangePicker').val());
            updateEndingTimePointViaTimeRangePicker();
        });

        $('#hourTimeRangePicker_next').on('click', function () {
            let hour = $('#hourTimeRangePicker').val();
            let newHour = Math.min(23 , parseInt(hour) + 1);
            $('#hourTimeRangePicker').val(newHour);
            $('#hourTimeRangeShower').html($('#hourTimeRangePicker').val());
            updateEndingTimePointViaTimeRangePicker();
        });

        $('#minuteTimeRangePicker, #hourTimeRangePicker').on('change', function () {
            console.log('changing...');
            $('#minuteTimeRangeShower').html($('#minuteTimeRangePicker').val());
            $('#hourTimeRangeShower').html($('#hourTimeRangePicker').val());
            updateEndingTimePointViaTimeRangePicker();
        });

        function updateEndingTimePointViaTimeRangePicker(){
            let hour = $('#hourTimeRangePicker').val();
            let minute = $('#minuteTimeRangePicker').val();
            // console.log('hour:',hour ,typeof hour,'minute:', typeof minute, minute);
            // console.log('hourToSeconds:',(hour * 60 * 60) ,typeof (hour * 60 * 60),'minuteToSeconds:', typeof (minute * 60), (minute * 60));
            let staringTimepoint_unix_js = parseInt($("#startingTimepoint_unix").val());
            let timeRangeDuration = (hour * 60 * 60) + (minute * 60);
            // console.log('timeRangeDuration:',timeRangeDuration,typeof timeRangeDuration);
            let newEndingTimePoint_unix_js = staringTimepoint_unix_js + timeRangeDuration;
            $("#endingTimepoint_unix").val(newEndingTimePoint_unix_js);
            let date = new Date(newEndingTimePoint_unix_js * 1000);
            let hours   = String(date.getHours()).padStart(2, '0');
            let minutes = String(date.getMinutes()).padStart(2, '0');
            let time = `${hours}:${minutes}`;
            $('#endingTimepoint').val(time.toString());
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            updtateDuration();
        }
        */
    </script>
@endpush
