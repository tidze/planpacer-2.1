<div class="min-h-screen bg-slate-900 px-2 text-white relative">
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

    @endenv

    {{-- There is this hidden input for editing a given task. When the user edits a task, the data gets into this input from backend. --}}
    <input type="hidden" id="targetTaskIdEdit" name="targetTaskIdEdit" wire:model.defer="targetTaskIdEdit" class="w-32 border-2 border-indigo-500" value="{{ $targetTaskIdEdit }}" readonly>

    <div class="relative mx-auto max-w-md rounded-md border border-slate-700 bg-slate-800 p-0">
        {{-- Livewire pulsating background. Meaning it is still retrieving datas from the server.  --}}
        <div wire:loading class="absolute w-full h-full z-20 rounded-md bg-yellow-400 animate-pulse bg-opacity-30 border border-yellow-600"></div>

        {{-- Log Activity Modal 🤪 --}}
        <div class="p-4 sm:p-6">
            <h2 class="mb-2 text-xl font-semibold">Log Activity</h2>

            {{-- The Current Date --}}
            <div class="flex flex-wrap items-center gap-1 mb-1">
                <label class="text-sm text-slate-400" for="targetDate"> Date </label>

                <span id="targetDifferenceText" class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                <div class="w-full m-0 p-0"></div>

                <div class="flex justify-center items-center gap-1 border-yellow-400">
                    <button class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 active:border active:border-amber-500" id="taskPrevPeriod" {{-- wire:click="prevPeriod" --}}>↺</button>
                    <input class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" type="date" id="targetDate" value="{{ $startingDatepoint }}">
                    <button class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 active:border active:border-amber-500" id="taskNextPeriod" {{-- wire:click="nextPeriod" --}}>↻</button>
                </div>

                <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-2 m-0 hover:bg-gray-700 active:border active:border-amber-500" id="targetDateNowButton">Now</button>
                <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-2 m-0 hover:bg-gray-700 active:border active:border-amber-500" id="swapTimesOnly">Swap</button>
            </div>

            {{-- Starting and Ending Date & Time points Container --}}
            <div class="space-y-1" x-data="{ isRotated: false, isOpen: false }">
                {{-- Starting and Ending Date & Time points --}}
                <div class="grid grid-cols-2 gap-0">

                    {{-- Starting Date & Time --}}
                    <div class="flex items-start flex-wrap gap-0 sm:gap-1">
                        <label class="text-sm text-slate-400 px-0 py-1"> Start </label>

                        <span id="startingDifferenceText" class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input class="mb-[0.05rem] rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" id="startingDatepoint" type="date" value="{{ $startingDatepoint }}">

                        <input class="w-32 sm:w-auto rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="startingTimepoint" type="time" value="{{ $startingTimepoint }}"
                            wire:model.defer="startingTimepoint" />

                        <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 text-xs sm:text-base sm:px-1 sm:py-2 inline-flex hover:bg-gray-700 active:border active:border-amber-500"
                            id="setNowTimeForStartingHourAndMinute">Now</button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="startingTimepoint_unix" wire:model.defer="startingTimepoint_unix" name="startingTimepoint_unix" type="hidden"
                            value="{{ $startingTimepoint_unix }}" />
                    </div>

                    {{-- Ending Date & Time --}}
                    <div class="flex items-start flex-wrap gap-0 sm:gap-1">
                        <label class="text-sm text-slate-400 px-0 py-1"> End </label>

                        <span id="endingDifferenceText" class="rounded bg-yellow-700 px-2 py-1 text-xs text-amber-400">Today</span>

                        <input class="mb-[0.05rem] rounded-lg border border-slate-600 bg-slate-900 px-3 py-2 w-36" id="endingDatepoint" type="date" value="{{ $endingDatepoint }}">

                        <input class="w-32 sm:w-auto rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" id="endingTimepoint" type="time" value="{{ $endingTimepoint }}" wire:model.defer="endingTimepoint" />

                        <button class="rounded-lg border border-slate-600 bg-slate-900 px-1 py-3 text-xs sm:text-base sm:px-1 sm:py-2 inline-flex hover:bg-gray-700 active:border active:border-amber-500"
                            id="setNowTimeForEndingHourAndMinute">Now</button>

                        {{-- Hidden input form, for submitting the unix timepoint --}}
                        <input class="bg-black text-center p-0 text-[15px]" id="endingTimepoint_unix" wire:model.defer="endingTimepoint_unix" name="endingTimepoint_unix" type="hidden"
                            value="{{ $endingTimepoint_unix }}" />
                    </div>
                </div>

                {{-- Ready Time Blocks --}}
                <div class="my-2 pb-2 flex gap-1 overflow-auto">

                    <x-suggestion-chip class="flex flex-row" color="amber" active="true" id="customDuration" x-on:click="isRotated = !isRotated; isOpen = !isOpen">
                        Custom
                        <div class="transition-transform duration-300 cursor-pointer" :class="{ 'rotate-180': isRotated }">
                            ▼
                        </div>
                    </x-suggestion-chip>

                    <x-suggestion-chip id="reverseRangeInput" class="border-l border-r-4" color="null" minute="10">Reverse</x-suggestion-chip>
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
                <div id="timeRangePicker"
                     class="border border-amber-300 rounded-md p-2"
                     x-show="isOpen"
                     x-transition:enter="transition-colors duration-500"
                     x-transition:enter-start="bg-amber-400/50"
                     x-transition:enter-end="bg-transparent"
                    >

                    {{-- Minute 0~59 --}}
                    <div class="text-sm text-slate-400 inline-block"> Minute 0~59 </div>
                    <div id="minuteTimeRangeShower" class="inline text-sm border border-amber-400 rounded-md bg-slate-800 px-2 py-0 text-amber-400"></div>
                    <div class="flex">
                        <button id="minuteTimeRangePicker_prev" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400">◁</button>
                        <input id="minuteTimeRangePicker" type="range" min="0" max="59" step="1" class="w-full" value="0" />
                        <button id="minuteTimeRangePicker_next" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400">▷</button>
                    </div>

                    {{-- Hour 0~23 --}}
                    <div class="text-sm text-slate-400 inline-block"> Hour 0~23 </div>
                    <div id="hourTimeRangeShower" class="inline text-sm border border-amber-400 rounded-md bg-slate-800 px-2 py-0 text-amber-400"></div>
                    <div class="flex">
                        <button id="hourTimeRangePicker_prev" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400">◁</button>
                        <input id="hourTimeRangePicker" type="range" min="0" max="23" step="1" class="w-full" value="0" />
                        <button id="hourTimeRangePicker_next" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-1 active:bg-amber-400">▷</button>
                    </div>
                </div>

                {{-- Duration --}}
                <div class="p-0">
                    <label class="text-sm text-slate-400" for="Duration">Duration</label>
                    <br>
                    <input id="duration" class="rounded-lg border border-slate-600 bg-slate-900 px-3 py-2" type="text" value="0" readonly />
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
                            <x-suggestion-chip color="{{ $category['color'] }}" class="descriptionAutoSetter">{{ $category['description'] }}</x-suggestion-chip>
                        @endforeach
                    </div>
                </div>

                {{-- Error Validator --}}
                <div>
                    @if (session()->has('store_validator_fail'))
                        <div class="bg-yellow-500 bg-opacity-50 border border-l-8 rounded-md border-yellow-600 text-yellow-500 p-2 mb-1">
                            {{ session('store_validator_fail') }} <div class="text-yellow-500 inline-flex justify-center items-center border-2 border-yellow-500 rounded-full w-5 h-5 mx-1"><b>!</b></div>
                        </div>
                    @endif
                    @if (session()->has('update_validator_fail'))
                        <div class="bg-yellow-500 bg-opacity-50 border border-l-8 rounded-md border-yellow-600 text-yellow-500 p-2 mb-1">
                            {{ session('update_validator_fail') }} <div class="text-yellow-500 inline-flex justify-center items-center border-2 border-yellow-500 rounded-full w-5 h-5 mx-1"><b>!</b></div>
                        </div>
                    @endif
                    @if (session()->has('successfull_message'))
                        <div class="bg-green-500 bg-opacity-50 border border-l-8 rounded-md border-green-600 text-green-500 p-2 mb-1">
                            {{ session('successfull_message') }} <span class="text-green-500">&#10003</span>
                        </div>
                    @endif
                    @if (session()->has('unsuccessfull_message'))
                        <div class="bg-red-500 bg-opacity-50 border border-l-8 rounded-md border-red-700 border-opacity-90 text-red-600 text-opacity-80 p-2 mb-1">
                            {{ session('unsuccessfull_message') }} <span class="text-red-600">&#10005</span>
                        </div>
                    @endif
                </div>

                {{-- Buttons --}}
                <div class="flex gap-3 pt-2">
                    <button wire:click="store" class="flex-1 rounded-lg bg-amber-500 font-medium text-black">Add <span class="font-bold">✓</span></button>
                    <button wire:click="update" class="flex-1 rounded-lg bg-yellow-500 font-medium text-black">Update <span class="font-bold">✓</span></button>

                    <button class="rounded-lg border border-slate-600 px-3 py-2">Close X</button>
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

        Livewire.on('loadTaskJS', (task) => {
            task_js.load(task[0]);
        });

        /*
         * task_js.starting.getUnix();         // 1700000000
         * task_js.starting.getDate();         // "2026-08-02"
         * task_js.starting.getTime();         // "14:30"
         * task_js.starting.setDate("2026-12-25");
         * task_js.starting.setTime("16:45");
         */
        function createTimePoint(unix, timeZone) {
            return {
                unix: unix,
                time_zone: timeZone,

                // returns date 2026-12-45
                getDate() {
                    const date = new Date(this.unix * 1000);
                    return date.toLocaleDateString('en-CA', {
                        year: 'numeric',
                        month: '2-digit',
                        day: '2-digit',
                        timeZone: this.time_zone
                    });
                },
                setDate(newDate) {
                    // Sets the date but keep the time. Set the new unix
                    const date = new Date(this.unix * 1000); // Tue Aug 02 2026 14:30:00
                    const parts = newDate.split("-"); // ["2026", "12", "25"]
                    const year = Number(parts[0]); // 2026
                    const month = Number(parts[1]); // 12
                    const day = Number(parts[2]); // 25
                    date.setFullYear(year); // Tue Aug 02 2026 14:30 -> Fri Aug 02 2026 14:30 (year changes)
                    date.setMonth(month - 1); // Aug(8) -> Dec(11) (JS months: Jan=0 ... Dec=11)
                    date.setDate(day); // Dec 02 -> Dec 25
                    this.unix = Math.floor(date.getTime() / 1000); // Date object -> milliseconds -> seconds
                    task_js.duration.updateSelf();
                },

                // return time 00:00
                getTime() {
                    const date = new Date(this.unix * 1000);
                    return date.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: false,
                        timeZone: this.time_zone
                    });
                },
                // setTime(16:45)
                setTime(newTime) {
                    // Sets the time but keep the date. Set the new unix
                    const date = new Date(this.unix * 1000); // Tue Aug 02 2026 14:30:00
                    const parts = newTime.split(":"); // ["16", "45"]
                    const hour = Number(parts[0]); // 16
                    const minute = Number(parts[1]); // 45
                    date.setHours(hour); // 14:30 -> 16:30
                    date.setMinutes(minute); // 16:30 -> 16:45
                    this.unix = Math.floor(date.getTime() / 1000); // 1796316300000 -> 1796316300
                    task_js.duration.updateSelf();
                },
                getUnix() {
                    return parseInt(this.unix);
                },
                setUnix(unix) {
                    this.unix = unix;
                    task_js.duration.updateSelf();
                },
                // It always compares. What you may ask? Either the starting or ending. With what? The current time.
                // So starting/ending > current => 1 day after
                getDayDifference() {
                    let current_Date = new Date();
                    let this_Unix = new Date(this.unix * 1000);

                    current_Date.setHours(0, 0, 0, 0);
                    this_Unix.setHours(0, 0, 0, 0);

                    let difference = this_Unix.getTime() - current_Date.getTime();

                    return Math.round(difference / (1000 * 60 * 60 * 24));
                }

            };
        }

        /*
         * task_js.starting.getDate();
         * task_js.ending.setTime("18:30");
         *
         * task_js.setCategory(2);
         * task_js.setDescription("Buy milk");
         * task_js.setDone(false);
         *
         * task_js.load(task);
         * task_js.reset();
         */
        const task_js = {
            starting: createTimePoint(@js($startingTimepoint_unix), $wire.get('timezone')),
            ending: createTimePoint(@js($endingTimepoint_unix), $wire.get('timezone')),
            duration: {
                unix: 0,
                hour: 0,
                minute: 0,
                reverse: false,

                setHour(hour) {
                    this.hour = Number(hour);
                    this.applyChanges();
                    this.updateSelf();
                },

                setMinute(minute) {
                    this.minute = Number(minute);
                    this.applyChanges();
                    this.updateSelf();
                },

                applyChanges() {
                    this.unix = parseInt(this.hour * 60 * 60) + parseInt(this.minute * 60);

                    if (!this.reverse) {
                        task_js.ending.setUnix(task_js.starting.getUnix() + this.unix);
                    } else {
                        task_js.starting.setUnix(task_js.ending.getUnix() - this.unix);
                    }
                },

                updateSelf() {
                    let difference = task_js.ending.getUnix() - task_js.starting.getUnix();

                    difference = Math.abs(difference);

                    this.unix = Math.floor(difference);
                    this.hour = Math.floor(difference / 3600);
                    this.minute = Math.floor((difference / 60) % 60);
                }
            },
            category: null,
            description: null,
            done: true,
            onUpdate: null,
            setCategory(category) {
                this.category = category;
            },
            getCategory() {
                return this.category;
            },
            setDescription(description) {
                this.description = description;
            },
            getDescription() {
                return this.description;
            },
            setDone(done) {
                this.done = done;
            },
            getDone() {
                return this.done;
            },
            load(task) {
                // console.log(JSON.stringify(task_js, null, 4));

                this.starting.setUnix(task.starting_unix);
                this.ending.setUnix(task.ending_unix);
                this.setCategory(task.category);
                this.setDescription(task.description);
                this.setDone(task.done);
                this.duration.reverse = false;

                syncUIWithTaskJS();
            },
            reset() {
                this.starting.setUnix(@js($startingTimepoint_unix));
                this.ending.setUnix(@js($endingTimepoint_unix));
                this.setCategory("");
                this.setDescription("");
                this.setDone(true);
            }
        };

        task_js.reset();

        // console.log(JSON.stringify(task_js, null, 4));


        $('#reverseRangeInput').on('click', function() {
            task_js.duration.reverse = !task_js.duration.reverse;
            $(this).toggleClass('border-red-400 text-red-400', task_js.duration.reverse);
            // console.log('id:', $(this).attr('id'), task_js.duration.reverse);
        });

        $('#minuteTimeRangePicker').on('input', function() {
            // console.log($(this).attr('id'));
            let currentMinute = Number($(this).val());
            task_js.duration.setMinute(currentMinute);
            syncUIWithTaskJS();
        });

        $('#minuteTimeRangePicker_prev').on('click', function() {
            // console.log($(this).attr('id'));

            let currentMinute = Number($('#minuteTimeRangePicker').val());
            task_js.duration.setMinute(Math.max(0, currentMinute - 1));
            syncUIWithTaskJS();

            //console.log(JSON.stringify(task_js, null, 4));
        });

        $('#minuteTimeRangePicker_next').on('click', function() {
            // console.log($(this).attr('id'));

            let currentMinute = Number($('#minuteTimeRangePicker').val());
            task_js.duration.setMinute(Math.min(59, currentMinute + 1));
            syncUIWithTaskJS();

            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#hourTimeRangePicker').on('input', function() {
            // console.log($(this).attr('id'));
            let currentHour = Number($(this).val());
            task_js.duration.setHour(currentHour);
            syncUIWithTaskJS();
        });

        $('#hourTimeRangePicker_prev').on('click', function() {
            // console.log($(this).attr('id'));
            let currentHour = Number($('#hourTimeRangePicker').val());
            task_js.duration.setHour(Math.max(0, currentHour - 1));
            syncUIWithTaskJS();

            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#hourTimeRangePicker_next').on('click', function() {
            // console.log($(this).attr('id'));
            let currentHour = Number($('#hourTimeRangePicker').val());
            task_js.duration.setHour(Math.min(23, currentHour + 1));
            syncUIWithTaskJS();

           // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#reverseRangeInput').on('click', function() {
            // console.log($(this).attr('id'));
        });


        $('#taskCategory').on('input', function() {
            task_js.setCategory($(this).val());
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#taskDescription').on('input', function() {
            task_js.setDescription($(this).val());
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $("#startingTimepoint").on("input", function() {
            task_js.starting.setTime($(this).val());
            syncUIWithTaskJS();
            dispatchInputEvent("startingTimepoint_unix");
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $("#endingTimepoint").on("input", function() {
            task_js.ending.setTime($(this).val());
            syncUIWithTaskJS();
            dispatchInputEvent("endingTimepoint_unix");
            // console.log(JSON.stringify(task_js, null, 4));
        });

        // Go to next interval
        $('#taskNextPeriod').on('click', function() {
            // create a date with the given task_js
            let newDate = new Date(task_js.starting.getUnix() * 1000);
            // then add one day to it, and set the new date to the task_js
            newDate.setDate(newDate.getDate() + 1);
            task_js.starting.setUnix(Math.floor(newDate.getTime() / 1000));

            // then add one day to the ending date as well
            let newEndingDate = new Date(task_js.ending.getUnix() * 1000);
            newEndingDate.setDate(newEndingDate.getDate() + 1);
            task_js.ending.setUnix(Math.floor(newEndingDate.getTime() / 1000));
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#taskPrevPeriod').on('click', function() {
            // create a date with the given task_js
            let newDate = new Date(task_js.starting.getUnix() * 1000);
            // then subtract one day from it, and set the new date to the task_js
            newDate.setDate(newDate.getDate() - 1);
            task_js.starting.setUnix(Math.floor(newDate.getTime() / 1000));

            // then subtract one day from the ending date as well
            let newEndingDate = new Date(task_js.ending.getUnix() * 1000);
            newEndingDate.setDate(newEndingDate.getDate() - 1);
            task_js.ending.setUnix(Math.floor(newEndingDate.getTime() / 1000));
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#targetDate').on('input', function() {
            task_js.starting.setDate($(this).val());
            task_js.ending.setDate($(this).val());
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#targetDateNowButton').on('click', function() {
            let newDate = new Date(); // Wed Jul 15 2026 21:04:19 GMT+0330 (Iran Standard Time) | 2026-07-15T18:27:23.925Z ( toISOString() )
            task_js.starting.setDate(newDate.toISOString().split('T')[0]); // "2026-07-15"
            task_js.ending.setDate(newDate.toISOString().split('T')[0]); // "2026-07-15"
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#swapTimesOnly').on('click', function() {
            let startingUnix = task_js.starting.getUnix();
            let endingUnix = task_js.ending.getUnix();

            task_js.starting.setUnix(endingUnix);
            task_js.ending.setUnix(startingUnix);

            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        /**
         * Click event handler that captures the current local time, updates both human-readable
         * and Unix timestamp starting timepoint fields, and triggers a duration update.
         * * @returns {void} Updates DOM elements directly via jQuery and native events.
         */
        $('#setNowTimeForStartingHourAndMinute').on('click', function() {
            let newDate = new Date(); // Wed Jul 15 2026 21:04:19 GMT+0330 (Iran Standard Time) | 2026-07-15T18:27:23.925Z ( toISOString() )
            newDate.setSeconds(0); // 21:04:19 -> 21:04:00
            let hours = ("0" + newDate.getHours()).slice(-2); // 21 -> "021" -> "21"
            let minutes = ("0" + newDate.getMinutes()).slice(-2); // 4 -> "04"
            task_js.starting.setTime(hours + ":" + minutes);
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('#setNowTimeForEndingHourAndMinute').on('click', function() {
            let newDate = new Date(); // Wed Jul 15 2026 21:04:19 GMT+0330 (Iran Standard Time) | 2026-07-15T18:27:23.925Z ( toISOString() )
            newDate.setSeconds(0); // 21:04:19 -> 21:04:00
            let hours = ("0" + newDate.getHours()).slice(-2); // 21 -> "021" -> "21"
            let minutes = ("0" + newDate.getMinutes()).slice(-2); // 4 -> "04"
            task_js.ending.setTime(hours + ":" + minutes);
            syncUIWithTaskJS();
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $("#startingDatepoint").on("input", function() {
            task_js.starting.setDate($(this).val());
            syncUIWithTaskJS();
            dispatchInputEvent("startingTimepoint_unix");
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $("#endingDatepoint").on("input", function() {
            task_js.ending.setDate($(this).val());
            syncUIWithTaskJS();
            dispatchInputEvent("endingTimepoint_unix");
            // console.log(JSON.stringify(task_js, null, 4));
        });

        $('.categoryAutoSetter').on('click', function() {
            let categoryText = $(this).text().trim();
            task_js.setCategory(categoryText);

            // Putting more descriptions according to the tappedgiven category, into the descriptionAutoSetterContainer
            let arr = sortedCategoriesByCategory_ENCODED_Parsed[$(this).text().trim()];
            $("#descriptionAutoSetterContainer").html('');

            $.each(arr, function(index, value) {
                $("#descriptionAutoSetterContainer").append(
                    '<div class="cursor-pointer whitespace-nowrap rounded-lg border bg-slate-700 px-2 py-1 select-none border-l-4 descriptionAutoSetter" style="border-color: ' + value.color +
                    '; color: ' + value.color + ';">' + value.description + '</div>');
            });

            $('.descriptionAutoSetter').on('click', function() {
                let descriptionText = $(this).text().trim();
                task_js.setDescription(descriptionText);
                syncUIWithTaskJS();
            });

            syncUIWithTaskJS();
        });

        $('#descriptionAutoSetterContainer').on('click', '.descriptionAutoSetter', function() {
            let descriptionText = $(this).text().trim();
            task_js.setDescription(descriptionText);
            syncUIWithTaskJS();
        });

        // Because the first time, 'onclick' hasn't being set when the page load. So I added this part to cover the first time :)
        $('.descriptionAutoSetter').on('click', function() {
            // Set the taskDescription input value to the clicked descriptionAutoSetter text
            let descriptionText = $(this).text().trim();
            task_js.setDescription(descriptionText);
            syncUIWithTaskJS();
        });

        $(".timeBlockAutoSetter").on("click", function() {
            // Get the block time duration in seconds. (ex: 10m * 60 = 600s, 60m * 60 = 3600s)
            let blockTimeDuration = Number($(this).attr('minute') * 60);
            // Now we have a block time. We want to add this to the 'endingTimepoint_unix'. But we need to get the 'staringTimepoint_unix' first, then add the 'blockTimeDuration' to it.
            if(!task_js.duration.reverse) {
                let currentUnix = task_js.starting.getUnix();
                // Note that we are adding seconds to seconds. No need to create a new js date object, where it has milliseconds. We are working with seconds here.
                // we need to actually adding the values and not putting together two stings. I don't trust myself with javascript >:(
                let newUnix = parseInt(currentUnix) + parseInt(blockTimeDuration);

                task_js.ending.setUnix(newUnix);
            } else {
                let currentUnix = task_js.ending.getUnix();
                // Note that we are adding seconds to seconds. No need to create a new js date object, where it has milliseconds. We are working with seconds here.
                // we need to actually adding the values and not putting together two stings. I don't trust myself with javascript >:(
                let newUnix = parseInt(currentUnix) - parseInt(blockTimeDuration);

                task_js.starting.setUnix(newUnix);
            }

            syncUIWithTaskJS();
        });

        function formatToTextDayDifference(days) {
            if (days === 0) {
                return "Today";
            }
            if (days > 0) {
                return `${days} day${days > 1 ? "s" : ""} after`;
            }

            let absolute = Math.abs(days);
            return `${absolute} day${absolute > 1 ? "s" : ""} ago`;
        }

        /* This function for the time range picker when you want to go alpine route */
        // function updateEndingTimePointViaTimeRangePicker(hour, minute) {
        window.updateEndingTimePointViaTimeRangePicker = function(hour, minute) {
            let staringTimepoint_unix_js = task_js.starting.getUnix();
            let timeRangeDuration = (hour * 60 * 60) + (minute * 60);

            let newEndingTimePoint_unix_js = parseInt(staringTimepoint_unix_js) + parseInt(timeRangeDuration);

            task_js.ending.setUnix(newEndingTimePoint_unix_js);

            syncUIWithTaskJS();
        }

        function dispatchInputEvent(elementId) {
            document.getElementById(elementId).dispatchEvent(new Event('input'));
        }

        // update the next inputs with the new date
        // you know what? we need a function to sync the task_js object, with the inputs.
        // you know what we also need? we need to trigger the input event for the inputs, so that the Livewire component can catch the changes.
        function syncUIWithTaskJS() {
            $('#targetDate').val(task_js.starting.getDate());

            $('#startingDatepoint').val(task_js.starting.getDate());
            $('#startingTimepoint').val(task_js.starting.getTime());
            $('#startingTimepoint_unix').val(task_js.starting.getUnix());
            dispatchInputEvent('startingTimepoint_unix');

            $('#endingDatepoint').val(task_js.ending.getDate());
            $('#endingTimepoint').val(task_js.ending.getTime());
            $('#endingTimepoint_unix').val(task_js.ending.getUnix());
            dispatchInputEvent('endingTimepoint_unix');

            $('#taskCategory').val(task_js.getCategory());
            dispatchInputEvent('taskCategory');

            $('#taskDescription').val(task_js.getDescription());
            dispatchInputEvent('taskDescription');

            // Duration range inputs
            $('#hourTimeRangePicker').val(task_js.duration.hour);
            $('#minuteTimeRangePicker').val(task_js.duration.minute);

            $('#hourTimeRangeShower').text(task_js.duration.hour);
            $('#minuteTimeRangeShower').text(task_js.duration.minute);

            // Updates the duration field based on the difference between the starting and ending Unix timepoints.
            let formatDuration = formatSecondsToDaysHMS(task_js.duration.unix);
            $('#duration').val(formatDuration);

            // Updates the 'day difference text' for starting, ending, and target pills.
            $('#endingDifferenceText').text(formatToTextDayDifference(task_js.ending.getDayDifference()));
            $('#startingDifferenceText').text(formatToTextDayDifference(task_js.starting.getDayDifference()));
            $('#targetDifferenceText').text(formatToTextDayDifference(task_js.starting.getDayDifference()));
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

    </script>
@endscript

@push('script')
    <script>
        // The variables for category on click, shows each description for that specific category
        let sortedCategoriesByCategory_ENCODED = @json($sortedCategoriesByCategory_ENCODED);
        var sortedCategoriesByCategory_ENCODED_Parsed = (JSON.parse(sortedCategoriesByCategory_ENCODED));

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
            var timeout = setTimeout(function() {
                $element.removeClass('animate-pulse').addClass('animate-none');
            }, 800);
            // storing the timeout inside the element
            $element.data('pulseTimeout', timeout);
        }

        // For all the input[date], to be selectable with just clicking anywhere on input. (not just date picker icon). Ignoring "Power Users" >:D | Wait, that's me :(
        $("#startingDateContainer").on("click", () => {
            // document.querySelector("#startingDate").showPicker();
        });
    </script>
@endpush
