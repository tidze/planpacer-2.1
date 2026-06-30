<x-app-layout>
    <div class="flex justify-center items-center h-screen bg-gradient-to-br from-slate-950 to-slate-900">
        <div class="relative w-full max-w-sm p-6 bg-slate-900 border border-slate-700 rounded-xl shadow-2xl">
            <!-- Subtle decorative accent -->
            <div class="absolute top-0 left-0 w-full h-0.5 bg-gradient-to-r from-amber-400 to-amber-600 rounded-t-xl"></div>

            <!-- Brand section -->
            <div class="text-center mb-6 mt-1">
                <div class="flex justify-center mb-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-slate-100 tracking-tight">
                    PlanPacer
                </h1>
                <p class="text-xs text-slate-400 mt-0.5 font-medium">Log in to your account</p>
            </div>

            <!-- Login form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                @if ($errors->any())
                    <div class="p-3 bg-red-950/50 border border-red-700/50 rounded-lg text-red-300 text-xs">
                        <div class="flex items-start">
                            <svg class="w-4 h-4 mr-1.5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <!-- Email field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Email Address
                    </label>
                    <input type="email" name="email" required autofocus
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="you@company.com">
                </div>

                <!-- Password field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" required
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="Enter your password">
                </div>

                <!-- Remember me & Forgot password -->
                <div class="flex items-center justify-between text-xs pt-0.5">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-3.5 h-3.5 text-amber-500 bg-slate-800 border-slate-600 rounded focus:ring-amber-500 focus:ring-2">
                        <label for="remember" class="ml-1.5 text-slate-400 hover:text-slate-300 cursor-pointer">
                            Remember me
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-amber-400 hover:text-amber-300 font-medium hover:underline transition-colors">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-900 font-semibold py-2.5 px-4 rounded-lg shadow-lg shadow-amber-500/20 text-sm">
                    Log In
                </button>

                <!-- Register link -->
                <div class="text-center text-xs text-slate-400 mt-1.5">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-amber-400 hover:text-amber-300 font-semibold hover:underline transition-colors ml-1">
                        Create one now
                    </a>
                </div>
            </form>

            <!-- Footer with Laravel Fortify info -->
            <div class="mt-5 text-center border-t border-slate-800 pt-4">
                <div class="text-[10px] text-slate-500 leading-relaxed">
                    <span class="text-slate-400 font-medium">Laravel Fortify</span>
                    <span class="mx-1">•</span>
                    Secure authentication powered by Laravel's Fortify
                    <br>
                    <span class="text-slate-600">Rate limiting • Session management • CSRF protection</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>