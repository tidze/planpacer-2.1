<x-app-layout>
    <div class="relative w-full max-w-md p-8 bg-gray-950 border-2 border-cyan-500 rounded-none shadow-[0_0_20px_rgba(6,182,212,0.5)] tracking-wider">

    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-size: 20px 20px; background-image: linear-gradient(to right, #06b6d4 1px, transparent 1px), linear-gradient(to bottom, #06b6d4 1px, transparent 1px);"></div>

    <div class="text-center mb-8 relative">
        <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-400 italic uppercase drop-shadow-[0_2px_10px_rgba(244,63,94,0.6)]">
            PlanPacer
        </h1>
        <div class="text-xs text-cyan-400 font-mono mt-2 uppercase tracking-[0.2em]">
            // 80s Neon Access v2.1
        </div>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6 relative z-10">
        @csrf

        @if ($errors->any())
            <div class="p-3 bg-red-950/80 border border-pink-600 text-pink-400 font-mono text-xs shadow-[0_0_10px_rgba(219,39,119,0.3)]">
                <span class="text-pink-500 font-bold">[ERROR]</span> {{ $errors->first() }}
            </div>
        @endif

        <div>
            <label class="block font-mono text-xs text-pink-500 uppercase tracking-widest mb-2 font-bold">
                System Email //
            </label>
            <input type="email" name="email" required autofocus
                   class="w-full bg-gray-900 text-cyan-300 font-mono border-2 border-purple-900 focus:border-cyan-400 focus:ring-0 rounded-none p-3 shadow-inner placeholder-gray-700 transition duration-200"
                   placeholder="cyberlink@grid.com">
        </div>

        <div>
            <label class="block font-mono text-xs text-pink-500 uppercase tracking-widest mb-2 font-bold">
                Access Code //
            </label>
            <input type="password" name="password" required
                   class="w-full bg-gray-900 text-cyan-300 font-mono border-2 border-purple-900 focus:border-cyan-400 focus:ring-0 rounded-none p-3 shadow-inner placeholder-gray-700 transition duration-200"
                   placeholder="••••••••••••">
        </div>

        <div class="flex items-center justify-between font-mono text-xs">
            <a href="{{ route('password.request') }}" class="text-gray-500 hover:text-pink-400 transition-colors duration-150">
                Forgot password?
            </a>
            <a href="{{ route('register') }}" class="text-cyan-400 hover:text-cyan-300 underline underline-offset-4 decoration-pink-500 transition-colors duration-150">
                Join The Grid
            </a>
        </div>

        <button type="submit"
                class="w-full relative group overflow-hidden bg-pink-600 hover:bg-pink-500 text-white font-mono font-extrabold uppercase tracking-widest py-3 px-4 rounded-none shadow-[0_0_15px_rgba(219,39,119,0.6)] hover:shadow-[0_0_25px_rgba(219,39,119,0.9)] transition-all duration-300 transform active:scale-95">
            <span class="relative z-10">Initialize Log In</span>
            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-purple-600 to-pink-600 mix-blend-multiply opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>
    </form>
</div>

</x-app-layout>