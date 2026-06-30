<div class="min-h-screen bg-slate-900 p-4 text-white relative">

    @env('local')
    {{-- A simple debugger. It's helping me remember, what component I am on. --}}
    <div class="absolute border border-amber-700 px-1 text-[12px] text-yellow-500 bg-black left-1/2 -translate-x-1/2 -translate-y-full z-10 flex flex-col">
        <span class="whitespace-nowrap">resources\views\livewire\task-new-design.blade.php</span>
        <span>{{get_class($this)}}.php</span>
    </div>
    @endenv

    {{-- Livewire pulsating background. Meaning it is still retrieving datas from the server.  --}}
    <div wire:loading class="bg-blue-400 bg-opacity-30 animate-pulse absolute w-full h-full z-0 -m-1"></div>

    {{-- Component Inspector --}}
    @env('local')
        <div class="bg-black p-2 border border-amber-800">
            <p class="text-amber-600 text-[12px]">
                taskCategory= <span class='text-amber-100'>{{ ($taskCategory ?? 'Not Set') }}</span> <br>
                taskDescription= <span class="text-amber-100">{{ $taskDescription ?? 'Not Set'}}</span><br>
                desiredDuration= <span class="text-amber-100">{{ $desiredDuration ?? 'Not Set'}}</span><br>
                startingTimepoint_unix= <span class="text-amber-100">{{ $startingTimepoint_unix ?? 'Not Set'}}</span><br>
                endingTimepoint_unix= <span class="text-amber-100">{{ $endingTimepoint_unix ?? 'Not Set'}}</span><br>
                startingTimepoint= <span class="text-amber-100">{{ $startingTimepoint ?? 'Not Set'}}</span><br>
                endingTimepoint= <span class="text-amber-100">{{ $endingTimepoint ?? 'Not Set'}}</span><br>
                startingDatepoint= <span class="text-amber-100">{{ $startingDatepoint ?? 'Not set'}}</span><br>
                endingDatepoint= <span class="text-amber-100">{{ $endingDatepoint ?? 'Not set'}}</span><br>
                targetTaskIdEdit= <span class="text-amber-100">{{ $targetTaskIdEdit??'Not set' }}</span><br>
                {{-- TODO: rename these variables later. $category_distinct_desc, $category_description_distinct_desc  --}}
                category_distinct_desc= <span class="text-amber-100">{{  isset($category_distinct_desc) ? 'Set' : 'Not Set' }}</span><br>
                category_description_distinct_desc= <span class="text-amber-100">{{  isset($category_description_distinct_desc) ? 'Set' : 'Not Set' }}</span><br>
                taskDone= <span class="text-amber-100">{{ $taskDone ?? 'Not set' }}</span><br>
                detector= <span class="text-amber-100">{{ $detector??'Not Set' }}</span><br>
                date_default_timezone_get= <span class="text-amber-100">{{ date_default_timezone_get() }}</span><br>
                timezone= <span class="text-amber-100">{{ ($timezone?? 'Not Set' )}}</span><br>
                sortedCategoriesByCategory= <pre class="text-amber-100 text-[12px] overflow-auto h-36">{{ json_encode($sortedCategoriesByCategory, JSON_PRETTY_PRINT) }}</pre><br>
            </p>
        </div>
    @endenv
    {{-- There is this hidden input for editing a given task. When the user edits a task, the data gets into this input from backend. --}}
    <input type="hidden" id="targetTaskIdEdit" name="targetTaskIdEdit" wire:model.defer="targetTaskIdEdit" class="w-32 border-2 border-indigo-500" value="{{ $targetTaskIdEdit }}" readonly>


    <div class="mx-auto max-w-md rounded-2xl border border-slate-700 bg-slate-800 p-6">
        <h2 class="mb-2 text-xl font-semibold">Log Activity</h2>

        {{-- The Current Date --}}
        <div class="">
            <label class="mb-2 text-sm text-slate-400" for="targetDate"> Date </label>

            <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

            <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">↻</button>
            <input class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" type="date" id="targetDate"  value="{{ $startingDatepoint }}">
            <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">↺</button>

            <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" id="setNowTime">Now</button>
            <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" id="switchHours">Switch</button>

        </div>

        {{-- Starting and Ending Date & Time points Container --}}
        <div class="space-y-2">

            {{-- Starting and Ending Date & Time points --}}
            <div class="grid grid-cols-2 gap-4">

                {{-- Starting Date & Time --}}
                <div>
                    <label class="mb-2 text-sm text-slate-400"> Start </label>

                    <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                    <input id="startingDate" type="date" value="{{ $startingDatepoint }}" class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">

                    <input class = "rounded-lg border border-slate-600 bg-slate-900 px-4 py-3"
                    id = "startingTimepoint"
                    wire:model.defer = "startingTimepoint"
                    type = "time"
                    value = "{{$startingTimepoint}}" />

                    <button id="setNowTimeForStartingHourAndMinute"
                            class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 inline-flex hover:bg-gray-700">
                            Now
                    </button>

                    {{-- Hidden input form, for submitting the unix timepoint --}}
                    <input class="bg-black text-center p-0 text-[15px]"
                    id="startingTimepoint_unix"
                    wire:model.defer="startingTimepoint_unix"
                    name="startingTimepoint_unix"
                    type="hidden"
                    value="" />

                </div>

                {{-- Ending Date & Time --}}
                <div>
                    <label class="mb-2 text-sm text-slate-400"> End </label>

                    <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                    <input id="endingDate" type="date" value="{{ $endingDatepoint }}" class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">

                    <input class = "rounded-lg border border-slate-600 bg-slate-900 px-4 py-3"
                    id = "endingTimepoint"
                    wire:model.defer = "endingTimepoint"
                    type = "time"
                    value = "{{$endingTimepoint}}" />

                    <button id="setNowTimeForEndingHourAndMinute"
                        class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 inline-flex hover:bg-gray-700">
                            Now
                    </button>

                    {{-- Hidden input form, for submitting the unix timepoint --}}
                    <input class="bg-black text-center p-0 text-[15px]"
                    id="endingTimepoint_unix"
                    wire:model.defer="endingTimepoint_unix"
                    name="endingTimepoint_unix"
                    type="hidden"
                    value="" />
                </div>
            </div>

            {{-- Duration --}}
            <div class="flex py-2">
                <input class="flex-1 bg-black text-center p-0 text-[16px] rounded-md" id="fullDuration_obj" type="text" value="0" readonly />
                <label class="px-2 py-1 text-[16px]" for="fullDuration">Duration</label>
            </div>

            {{-- Ready Time Blocks --}}
            <div class="my-2 flex flex-wrap gap-1">
                <x-suggestion-chip>10m</x-suggestion-chip>
                <x-suggestion-chip>15m</x-suggestion-chip>
                <x-suggestion-chip>30m</x-suggestion-chip>
                <x-suggestion-chip color="amber" active="true">Custom ▼▲</x-suggestion-chip>
            </div>

            {{-- TimeRangePicker --}}
            <div class="">
                <label class="block text-sm text-slate-400"> Minute 0~59 </label>
                <input type="range" min="0" max="59" step="1" value="0" class="w-full"/>
                <label class="block text-sm text-slate-400"> Hour 0~23 </label>
                <input type="range" min="0" max="23" step="1" value="0" class="w-full"/>
            </div>

            {{-- Title --}}
            <div>
                <label class="mb-1 block text-sm text-slate-400"> Category </label>

                <input type="text" placeholder="Coding, Breakfast, YouTube..." class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3 focus:ring-2 focus:ring-amber-500 focus:outline-none" />

                <div class="my-1 pb-2 flex overflow-auto gap-1">
                    <x-suggestion-chip>Work</x-suggestion-chip>
                    <x-suggestion-chip>Transport</x-suggestion-chip>
                    <x-suggestion-chip>Study</x-suggestion-chip>
                    <x-suggestion-chip>Entertainment</x-suggestion-chip>
                    <x-suggestion-chip>Health</x-suggestion-chip>
                </div>
            </div>

            {{-- Description --}}
            <div>
                <label class="mb-1 block text-sm text-slate-400"> Details (optional) </label>

                <textarea rows="3" placeholder="Played Elden Ring and had fun" class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3"></textarea>

                <div class="flex w-full gap-1 overflow-auto pb-2">
                    <x-suggestion-chip color="blue">SOMA</x-suggestion-chip>
                    <x-suggestion-chip>Elden Ring</x-suggestion-chip>
                    <x-suggestion-chip>Math Class Online</x-suggestion-chip>
                    <x-suggestion-chip>Youtube</x-suggestion-chip>
                    <x-suggestion-chip>Running</x-suggestion-chip>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 pt-2">
                <button class="flex-1 rounded-lg bg-amber-500 py-3 font-medium text-black">Done <span class="font-bold">✓</span></button>

                <button class="rounded-lg border border-slate-600 px-5 py-3">Close X</button>
            </div>
        </div>
    </div>
</div>

@push('script')

    <script>
        // For all the input[date], to be selectable with just clicking anywhere on input. (not just date picker icon)
        $("#startingDateContainer").on("click", () => {
            // document.querySelector("#startingDate").showPicker();
        });

        /*
        * Creates a new date from given date(dateInput param) and hour(input param) input and puts it in output(output param).
        * Parameters: dateInput - input[type=date] 2023-06-09
        *             input     - input[type=text] 02:00
        *             output    - input[type=text] 1654889000 unix
        */
        function giveDateObject(dateInput, input, output) {
            // input = String(input);
            // output = String(output);

            // Getting the day, month, year from targetDate input and creating a date
            // let purifiedDate = $(dateInput).val().replaceAll('-', '');  // 2023-06-09 => 20230609
            // let year = purifiedDate.slice(0, 4); // 20230609 => 2023

            // And do not forget that js month is starting from '0'
            // let month = purifiedDate.slice(4, 6) - 1; // 20230609 => 06 - 1 = 5
            // let day = purifiedDate.slice(6, 8); // 20230609 => 09

            // Creates a new date from seperated parameters.(year, month, day)
            // let date = new Date(year, month, day);

            // And no miliseconds in parameter :)
            // date.setSeconds(0);

            // Gets hours and minutes from given input and uses them to set the new date's hours and minutes.
            // let hours = $(input).val().replace(':', '').slice(0, 2); // 02:14 => 0214 => 02
            // let minutes = $(input).val().replace(':', '').slice(2, 4); // 02:14 => 0214 => 14
            // date.setHours(hours);
            // date.setMinutes(minutes);

            // let unixTenDigits = date.getTime().toString();
            // $(output).val(unixTenDigits.slice(0, 10));

            setFullDuration();
        }

        function setFullDuration() {
            // console.log("setFullDuration");
            // let startingTimePoint = document.getElementById("startingTimepoint_unix").value;
            // let endingTimePoint = document.getElementById("endingTimepoint_unix").value;
            // let difference = Math.abs(startingTimePoint - endingTimePoint);
            document.getElementById("fullDuration_obj").value = secToTime(difference);
            // document.getElementById("desiredDuration").max = secToMin(difference);
            // document.getElementById("desiredDuration").value = secToMin(difference);
            // document.getElementById("desiredDuration").dispatchEvent(new Event('input'));
            // document.getElementById("rangeValue").innerText = secToMin(difference);

        }

        $('#setNowTimeForStartingHourAndMinute').on('click', function() {
            let newDate = new Date();
            newDate.setSeconds(0);
            $('#startingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));
            $('#startingTimepoint_unix').val((newDate.getTime()).toString().substring(0, 10));
            document.getElementById("startingTimepoint_unix").dispatchEvent(new Event('input'));
            setFullDuration();
        });

        $('#setNowTimeForEndingHourAndMinute').on('click', function() {
            let newDate = new Date();
            newDate.setSeconds(0);
            $('#endingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));
            $('#endingTimepoint_unix').val((newDate.getTime()).toString().substring(0, 10));
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            setFullDuration();
        });
    </script>

@endpush


