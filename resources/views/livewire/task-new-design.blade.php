<div class="min-h-screen bg-slate-900 px-4 text-white relative">

    {{-- Component Inspector --}}
    @env('local')
        <div class="bg-black p-2 border border-amber-800">
            {{-- A simple debugger. It's helping me remember, what component I am on. --}}
            <div class="flex flex-col border border-amber-700 px-1 text-[12px] text-yellow-500 bg-black">
                <span class="whitespace-nowrap">view: resources\views\livewire\task-new-design.blade.php</span>
                <span>controller: {{ get_class($this) }}.php</span>
            </div>
            <div class="text-amber-600 text-[12px]">
                taskCategory= <span class='text-amber-100'>{{ $taskCategory ?? 'Not Set' }}</span> <br>
                taskDescription= <span class="text-amber-100">{{ $taskDescription ?? 'Not Set' }}</span><br>
                startingTimepoint_unix= <span class="text-amber-100">{{ $startingTimepoint_unix ?? 'Not Set' }}</span><br>
                endingTimepoint_unix= <span class="text-amber-100">{{ $endingTimepoint_unix ?? 'Not Set' }}</span><br>
                startingTimepoint= <span class="text-amber-100">{{ $startingTimepoint ?? 'Not Set' }}</span><br>
                endingTimepoint= <span class="text-amber-100">{{ $endingTimepoint ?? 'Not Set' }}</span><br>
                startingDatepoint= <span class="text-amber-100">{{ $startingDatepoint ?? 'Not set' }}</span><br>
                endingDatepoint= <span class="text-amber-100">{{ $endingDatepoint ?? 'Not set' }}</span><br>
                targetTaskIdEdit= <span class="text-amber-100">{{ $targetTaskIdEdit ?? 'Not set' }}</span><br>
                {{-- TODO: rename these variables later. $category_distinct_desc, $category_description_distinct_desc  --}}
                category_distinct_desc= <span class="text-amber-100">{{ isset($category_distinct_desc) ? 'Set' : 'Not Set' }}</span><br>
                category_description_distinct_desc= <span class="text-amber-100">{{ isset($category_description_distinct_desc) ? $category_description_distinct_desc : 'Not Set' }}</span><br>
                taskDone= <span class="text-amber-100">{{ isset($taskDone) ? ($taskDone ? 'true' : 'false') : 'Not set' }}</span><br>
                    date_default_timezone_get= <span class="text-amber-100">{{ date_default_timezone_get() }}</span><br>
                timezone= <span class="text-amber-100">{{ $timezone ?? 'Not Set' }}</span><br>
                sortedCategoriesByCategory=
                <pre class="text-amber-100 text-[12px] overflow-auto  max-h-36">{{ json_encode($sortedCategoriesByCategory, JSON_PRETTY_PRINT) }}</pre>

                <pre class="text-red-300 text-[12px] overflow-auto  max-h-36">{{ print_r($errors->toArray(), true) }}</pre>
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
            <div class="">
                <label class="mb-2 text-sm text-slate-400" for="targetDate"> Date </label>

                <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">↻</button>
                <input class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" type="date" id="targetDate" value="{{ $startingDatepoint }}">
                <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">↺</button>

                <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" id="setNowTime">Now</button>
                <button class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" id="switchHours">Switch</button>

            </div>

            {{-- Starting and Ending Date & Time points Container --}}
            <div class="space-y-2">

                {{-- Starting and Ending Date & Time points --}}
                <div class="grid grid-cols-2 gap-0">

                    {{-- Starting Date & Time --}}
                    <div>
                        <label class="mb-2 text-sm text-slate-400"> Start </label>

                        <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input id="startingDate" type="date" value="{{ $startingDatepoint }}" class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">

                        <input class = "rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" id = "startingTimepoint" wire:model.defer = "startingTimepoint" type = "time" value = "{{ $startingTimepoint }}" />

                        <button id="setNowTimeForStartingHourAndMinute" class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 inline-flex hover:bg-gray-700">
                            Now
                        </button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="startingTimepoint_unix" wire:model.defer="startingTimepoint_unix" name="startingTimepoint_unix" type="hidden" value="" />

                    </div>

                    {{-- Ending Date & Time --}}
                    <div>
                        <label class="mb-2 text-sm text-slate-400"> End </label>

                        <span class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input id="endingDate" type="date" value="{{ $endingDatepoint }}" class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3">

                        <input id="endingTimepoint" type="time" value="{{ $endingTimepoint }}" wire:model.defer="endingTimepoint" class="rounded-lg border border-slate-600 bg-slate-900 px-4 py-3" />

                        <button id="setNowTimeForEndingHourAndMinute" class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 inline-flex hover:bg-gray-700">
                            Now
                        </button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="endingTimepoint_unix" wire:model.defer="endingTimepoint_unix" name="endingTimepoint_unix" type="hidden" value="" />
                    </div>
                </div>

                {{-- Duration --}}
                <div class="p-0">
                    <label class="pb-2 text-sm text-slate-400" for="Duration">Duration</label>
                    <br>
                    <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="Duration" type="text" value="0" readonly />
                </div>

                {{-- Ready Time Blocks --}}
                <div class="my-2 flex flex-wrap gap-1">
                    <x-suggestion-chip>10m</x-suggestion-chip>
                    <x-suggestion-chip>15m</x-suggestion-chip>
                    <x-suggestion-chip>30m</x-suggestion-chip>
                    <x-suggestion-chip color="amber" active="true" id="customDuration">Custom ▼</x-suggestion-chip>
                </div>

                {{-- TimeRangePicker --}}
                <div id="timeRangePicker" class="hidden">
                    <label class="block text-sm text-slate-400"> Minute 0~59 </label>
                    <input type="range" min="0" max="59" step="1" value="0" class="w-full" />
                    <label class="block text-sm text-slate-400"> Hour 0~23 </label>
                    <input type="range" min="0" max="23" step="1" value="0" class="w-full" />
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
                        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3 focus:ring-2 focus:ring-amber-500 focus:outline-none" />

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
                    <label class="mb-1 block text-sm text-slate-400" for="taskDescription"> Details (optional) </label>

                    @error('taskDescription')
                        <div class="flex-auto w-full text-center">
                            <div class="text-red-500 text-[1rem]">{{ $message }}</div>
                        </div>
                    @enderror

                    <textarea id="taskDescription" wire:model.defer="taskDescription" name="taskDescription" type="text" rows="3" placeholder="Played Elden Ring and had fun"
                        class="w-full rounded-lg border border-slate-600 bg-slate-900 px-4 py-3"></textarea>

                    <div class="flex w-full gap-1 overflow-auto pb-2">
                        <x-suggestion-chip color="blue">SOMA</x-suggestion-chip>
                        <x-suggestion-chip>Elden Ring</x-suggestion-chip>
                        <x-suggestion-chip>Math Class Online</x-suggestion-chip>
                        <x-suggestion-chip>Youtube</x-suggestion-chip>
                        <x-suggestion-chip>Running</x-suggestion-chip>
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

@push('script')
    <script>
        // For all the input[date], to be selectable with just clicking anywhere on input. (not just date picker icon). Ignoring "Power Users" >:D | Wait, that's me :(
        $("#startingDateContainer").on("click", () => {
            // document.querySelector("#startingDate").showPicker();
        });
        $("#customDuration").on("click", function() {
            const $this = $(this);
            if ($this.text() === "Custom ▼") {
                $this.text("Custom ▲");
            } else if ($this.text() === "Custom ▲") {
                $this.text("Custom ▼");
            }
            $("#timeRangePicker").toggle();
        });

        $("#startingTimepoint").on("change", () => {
            giveDateObject("#endingDate", "#startingTimepoint", "#startingTimepoint_unix");
            document.getElementById("startingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("startingTimepoint").dispatchEvent(new Event('input'));
        });
        $("#endingTimepoint").on("change", () => {
            giveDateObject("#endingDate", "#endingTimepoint", "#endingTimepoint_unix");
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            document.getElementById("endingTimepoint").dispatchEvent(new Event('input'));
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
         * @returns {string} The formatted time string in the format: "D HH:MM:SS.m"
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
         * Calculates the absolute difference between two Unix timestamps and updates the duration input field.
         * * @returns {void} Updates the DOM element with ID "Duration" directly.
         */
        function updtateDuration() {
            // Retrieves the value of the starting timestamp input field | "startingTimepoint_unix" => "1719878400"
            let startingTimePoint = document.getElementById("startingTimepoint_unix").value;

            // Retrieves the value of the ending timestamp input field | "endingTimepoint_unix" => "1720141265"
            let endingTimePoint = document.getElementById("endingTimepoint_unix").value;

            // Computes the absolute numeric difference to prevent negative values | Math.abs(1719878400 - 1720141265) => 262865
            let difference = Math.abs(startingTimePoint - endingTimePoint);

            // Converts the total seconds into the formatted string and assigns it to the duration field | formatSecondsToDaysHMS(262865) => "3 01:01:05.0"
            document.getElementById("Duration").value = formatSecondsToDaysHMS(difference);
        }

        /**
         * Click event handler that captures the current local time, updates both human-readable
         * and Unix timestamp starting timepoint fields, and triggers a duration update.
         * * @returns {void} Updates DOM elements directly via jQuery and native events.
         */
        $('#setNowTimeForStartingHourAndMinute').on('click', function() {
            // Instantiates a new Date object representing the exact current date and time | new Date() => Thu July 02 2026 01:24:09
            let newDate = new Date();

            // Normalizes the time by setting the seconds component to zero | newDate.setSeconds(0) => Thu July 02 2026 01:24:00
            newDate.setSeconds(0);

            // Formats and inserts the HH:MM time string into the input field | ("0" + 1).slice(-2) + ":" + ("0" + 24).slice(-2) => "01:24"
            // Fixes when the clock becomes one digit number, and makes them 2 digits.
            // "0" + newDate.getHours() | 9 -> "09" / 14 -> "014" | "09" .slice(-2) -> "09" / "014" .slice(-2) -> "14"
            $('#startingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));

            // Converts milliseconds timestamp to a 10-digit Unix timestamp string | (1777699440000).toString().substring(0, 10) => "1777699440"
            $('#startingTimepoint_unix').val((newDate.getTime()).toString().substring(0, 10));

            // Dispatches a native input event to alert listeners of programmatic changes | new Event('input') => Event {type: "input"}
            document.getElementById("startingTimepoint_unix").dispatchEvent(new Event('input'));

            // Invokes the duration calculation function to refresh the view | updtateDuration() => void
            updtateDuration();
        });

        $('#setNowTimeForEndingHourAndMinute').on('click', function() {
            let newDate = new Date();
            newDate.setSeconds(0);
            $('#endingTimepoint').val(("0" + newDate.getHours()).slice(-2) + ":" + ("0" + newDate.getMinutes()).slice(-2));
            $('#endingTimepoint_unix').val((newDate.getTime()).toString().substring(0, 10));
            document.getElementById("endingTimepoint_unix").dispatchEvent(new Event('input'));
            updtateDuration();
        });

        document.addEventListener('DOMContentLoaded', () => {
            const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            Livewire.dispatch('timezoneDetected', { timezone });
        });

    </script>
@endpush
