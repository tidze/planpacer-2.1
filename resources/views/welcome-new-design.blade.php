<x-app-layout>
    <div class="bg-slate-900 text-white min-h-screen">

        <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4">

            <!-- Animated gradient background -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cdefs%3E%3Cpattern id="grid" width="60" height="60"
                    patternUnits="userSpaceOnUse"%3E%3Cpath d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/%3E%3C/pattern%3E%3C/defs%3E%3Crect width="100%25" height="100%25"
                    fill="url(%23grid)" /%3E%3C/svg%3E')]"></div>
            </div>

            <!-- Floating orbs -->
            <div class="absolute top-20 left-10 h-72 w-72 bg-amber-500/30 rounded-full blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-20 right-10 h-96 w-96 bg-blue-500/20 rounded-full blur-[120px] animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-64 w-64 bg-emerald-400/20 rounded-full blur-[80px]"></div>

            <!-- Content -->
            <div class="relative z-10 max-w-3xl text-center space-y-8">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full px-5 py-2 text-sm text-slate-300">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
                    </span>
                    Welcome to {{ config('app.name') }}
                </div>

                <!-- Main heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                    Track your
                    <span class="relative inline-block">
                        <span class="bg-gradient-to-r from-amber-400 via-emerald-400 to-blue-400 bg-clip-text text-transparent animate-gradient">
                            Time
                        </span>
                        <span class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-amber-500 to-blue-500 rounded-full blur-sm"></span>
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-lg md:text-lg text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Don't let your days slip out. <br> Log in, and figure out what you've been wasting.
                </p>

                <!-- Feature highlights -->
                <div class="flex flex-wrap justify-center gap-6 pt-4 text-sm">
                    <div class="flex items-center gap-2 text-slate-300">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        See your day in one glance
                    </div>
                    <div class="flex items-center gap-2 text-slate-300">
                        <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Customized Dashboard
                    </div>
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                            </path>
                        </svg>

                        <span>AI Feedback</span>

                        <span class="text-[10px] font-medium uppercase tracking-wide text-violet-400/80 border border-violet-400/20 bg-violet-400/5 px-1.5 py-0.5 rounded">
                            Coming Soon
                        </span>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                    <a href="{{ route('dashboard') }}"
                        class="group relative px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg font-semibold text-slate-900 transition-all duration-300 hover:shadow-[0_0_30px_rgba(245,158,11,0.3)] active:translate-y-0">
                        <span class="relative z-10">Get Started</span>
                    </a>
                    <a href="{{ url('/register') }}"
                        class="px-6 py-3 flex justify-center items-center border border-white/20 rounded-lg font-medium text-slate-300 duration-300 hover:bg-white/5 hover:border-white/40 hover:text-white">
                        Create Account
                    </a>
                </div>

                <!-- Footer note -->
                <p class="text-sm text-slate-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-amber-400 hover:text-amber-300 font-medium transition-colors hover:underline">
                        Sign in
                    </a>
                </p>

                <!-- Tech stack -->
                <p class="text-xs text-slate-500 max-w-2xl mx-auto leading-relaxed">
                    Powered by Laravel, Livewire & Tailwind CSS — built for modern productivity.
                </p>

            </div>
        </div>
    </div>

    <style>
        @keyframes gradient {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }
    </style>
</x-app-layout>
