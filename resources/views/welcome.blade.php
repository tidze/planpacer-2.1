<x-app-layout>
    <div class="bg-slate-950 text-white min-h-screen">

        <div class="relative flex min-h-screen items-center justify-center overflow-hidden px-4">

            <!-- Animated gradient background -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cdefs%3E%3Cpattern id="grid" width="60" height="60" patternUnits="userSpaceOnUse"%3E%3Cpath d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/%3E%3C/pattern%3E%3C/defs%3E%3Crect width="100%25" height="100%25" fill="url(%23grid)" /%3E%3C/svg%3E')]"></div>
            </div>

            <!-- Floating orbs -->
            <div class="absolute top-20 left-10 h-72 w-72 bg-indigo-500/30 rounded-full blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-20 right-10 h-96 w-96 bg-cyan-500/20 rounded-full blur-[120px] animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-64 w-64 bg-purple-500/20 rounded-full blur-[80px]"></div>

            <!-- Content -->
            <div class="relative z-10 max-w-3xl text-center space-y-8">

                <!-- Badge -->
                <div class="inline-flex items-center gap-2 bg-white/5 backdrop-blur-sm border border-white/10 rounded-full px-5 py-2 text-sm text-slate-300">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-400"></span>
                    </span>
                    Welcome to {{ config('app.name') }} 
                </div>

                <!-- Main heading -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold leading-tight">
                    Track your
                    <span class="relative inline-block">
                        <span class="bg-gradient-to-r from-indigo-400 via-cyan-400 to-indigo-400 bg-clip-text text-transparent animate-gradient">
                            Time
                        </span>
                        <span class="absolute -bottom-2 left-0 right-0 h-1 bg-gradient-to-r from-indigo-400 to-cyan-400 rounded-full blur-sm"></span>
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-lg md:text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed">
                    Powered by Laravel, Livewire & Tailwind CSS — built for modern productivity.
                </p>

                <!-- Feature highlights -->
                <div class="flex flex-wrap justify-center gap-6 pt-4 text-sm">
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Real-time tracking
                    </div>
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Beautiful dashboard
                    </div>
                    <div class="flex items-center gap-2 text-slate-400">
                        <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Team collaboration
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 pt-4">
                    <a href="{{ route('dashboard') }}"
                       class="group relative px-8 py-4 bg-gradient-to-r from-indigo-500 to-cyan-500 rounded-lg font-medium transition-all duration-300 hover:scale-105 hover:shadow-[0_0_30px_rgba(99,102,241,0.3)]">
                        <span class="relative z-10">Get Started</span>
                        <span class="absolute inset-0 rounded-lg bg-gradient-to-r from-indigo-600 to-cyan-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                    <a href="{{ url('/register') }}"
                       class="px-8 py-4 border border-white/20 rounded-lg font-medium transition-all duration-300 hover:bg-white/5 hover:border-white/40 hover:scale-105">
                        Create Account
                    </a>
                </div>

                <!-- Footer note -->
                <p class="text-xs text-slate-500 pt-8">
                    Already have an account?
                    <a href="{{ route('dashboard') }}" class="text-cyan-400 hover:text-cyan-300 transition-colors">
                        Sign in
                    </a>
                </p>

            </div>
        </div>
    </div>

    <style>
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }
    </style>
</x-app-layout>