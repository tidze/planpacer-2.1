<div class="m-2 flex flex-col rounded-md overflow-hidden bg-slate-950 text-slate-100">
    <!-- Toolbar -->
    <div class="flex flex-wrap items-center gap-2 border-b border-slate-700 px-3 py-2">
        <button class="rounded-md border border-slate-700 bg-slate-800 px-2 py-1 hover:bg-slate-700 transition-colors" aria-label="Previous day">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <input type="date" class="rounded-md border border-slate-700 bg-slate-800 px-3 py-1 text-sm focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500" />

        <button class="rounded-md border border-slate-700 bg-slate-800 px-2 py-1 hover:bg-slate-700 transition-colors" aria-label="Next day">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <div class="ml-4 text-sm text-slate-400">
            Day:
            <span class="font-medium text-amber-400">
                07:00 → 03:00
                <span class="text-xs text-slate-500">(+1 day)</span>
                <span class="mx-1">•</span>
                19:47
            </span>
            <span class="rounded-md bg-amber-500/20 px-2 py-1 text-[11px] text-amber-400 font-medium">
                Today
            </span>
        </div>

        <button class="ml-auto rounded-md bg-amber-500 px-3 py-1 text-sm font-medium text-black hover:bg-amber-400 transition-colors">
            Daily Report
        </button>
    </div>

    <!-- Timeline -->
    <div class="flex-1 p-3">
        <div class="relative rounded-md overflow-hidden border border-slate-700 bg-slate-900">
            <!-- Top Date -->
            <div class="sticky top-0 z-10 border-b border-slate-700 bg-slate-900/95 backdrop-blur-sm px-3 py-2 text-xs text-amber-400">
                2026-06-27 07:00
                <span class="rounded-md bg-amber-500/20 px-2 py-1 text-[11px] text-amber-400 font-medium">
                    Today
                </span>
            </div>

            <!-- Entries Container -->
            <div class="h-[350px] overflow-y-auto overflow-x-hidden [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-track]:bg-slate-800 [&::-webkit-scrollbar-thumb]:bg-slate-600 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-500">

                <!-- Entry 1: Morning Routine -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Morning Routine</div>
                        <div class="text-xs text-slate-500">06:30 → 07:15</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-emerald-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Morning Routine</div>
                            <div class="text-xs text-slate-400">45 minutes</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 2: Breakfast -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Breakfast</div>
                        <div class="text-xs text-slate-500">07:30 → 08:00</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-amber-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Breakfast</div>
                            <div class="text-xs text-slate-400">30 minutes</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 3: Work Session -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Deep Work</div>
                        <div class="text-xs text-slate-500">09:00 → 12:30</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-blue-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Deep Work Session</div>
                            <div class="text-xs text-slate-400">3h 30m</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 4: Lunch Break -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Lunch</div>
                        <div class="text-xs text-slate-500">12:30 → 13:30</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-amber-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Lunch Break</div>
                            <div class="text-xs text-slate-400">1 hour</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 5: Afternoon Work -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Team Sync</div>
                        <div class="text-xs text-slate-500">14:00 → 15:30</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-purple-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Team Sync Meeting</div>
                            <div class="text-xs text-slate-400">1h 30m</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 6: Shopping/Errands -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Errands</div>
                        <div class="text-xs text-slate-500">16:30 → 20:00</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-blue-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Magaza</div>
                            <div class="text-xs text-slate-400">3h 30m</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entry 7: Evening -->
                <div class="flex border-b border-slate-800 hover:bg-slate-800/30 transition-colors">
                    <div class="w-32 shrink-0 border-r border-slate-800 p-3 text-right">
                        <div class="font-medium text-sm">Dinner</div>
                        <div class="text-xs text-slate-500">20:00 → 21:00</div>
                    </div>
                    <div class="flex-1 p-2">
                        <div class="group relative rounded-md border-l-4 border-amber-500 bg-slate-800/80 px-3 py-3 hover:bg-slate-800 transition-colors cursor-pointer">
                            <div class="text-sm font-medium">Dinner</div>
                            <div class="text-xs text-slate-400">1 hour</div>
                            <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="rounded bg-blue-500/20 px-2 py-1 text-xs text-blue-300 hover:bg-blue-500/30 transition-colors" aria-label="Edit">✎</button>
                                <button class="rounded bg-red-500/20 px-2 py-1 text-xs text-red-300 hover:bg-red-500/30 transition-colors" aria-label="Delete">✕</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State (hidden when entries exist) -->
                <div class="hidden flex-col items-center justify-center py-16 text-center">
                    <svg class="w-12 h-12 text-slate-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="text-sm text-slate-400">No activities planned</div>
                    <button class="mt-2 rounded-md bg-amber-500/20 px-4 py-2 text-sm text-amber-400 hover:bg-amber-500/30 transition-colors">
                        + Add your first activity
                    </button>
                </div>
            </div>

            <!-- Bottom Date -->
            <div class="sticky bottom-0 z-10 border-t border-slate-700 bg-slate-900/95 backdrop-blur-sm px-3 py-2 text-xs text-amber-400">
                2026-06-28 03:00
                <span class="rounded-md bg-amber-500/20 px-2 py-1 text-[11px] text-amber-400 font-medium">
                    Tomorrow
                </span>
            </div>
        </div>
    </div>

    <!-- Summary -->
    <div class="border-t border-slate-700 bg-slate-900 px-4 py-3">
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