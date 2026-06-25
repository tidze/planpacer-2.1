<x-app-layout>
    <div class="bg-slate-950 text-white min-h-screen">

        <div class="relative flex min-h-screen items-center justify-center overflow-hidden ">

            <!-- Background gradient -->
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-600 via-slate-900 to-black"></div>

            <!-- Decorative blur -->
            <div class="absolute top-0 left-0 h-96 w-96 bg-purple-500/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-96 w-96 bg-blue-500/20 blur-3xl"></div>

            <!-- Content -->
            <div class="relative p-6 z-10 max-w-2xl text-center border border-indigo-500">

                <div class="inline-flex items-center border border-white/10 bg-white/5 px-4 py-1 text-sm text-slate-300 mb-6">
                    <> Welcome to {{ config('app.name') }} <>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold leading-tight pb-6">
                    Track your
                    <span class="bg-gradient-to-r from-indigo-400 to-cyan-400 drop-shadow-[0_0_10px_rgba(103,232,249,0.5)] bg-clip-text text-transparent ">
                        Time
                    </span>
                </h1>

                <p class="text-lg text-slate-400 my-5 border border-indigo-500">
                    Powered by Laravel, Livewire & Tailwind CSS.
                </p>

                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('dashboard') }}" class="bg-cyan-500 px-6 py-3 transition hover:bg-indigo-500">
                        Login
                    </a>
                    <a href="{{ url('/register') }}" class="bg-cyan-500 px-6 py-3 transition hover:bg-indigo-500">
                        Register
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
