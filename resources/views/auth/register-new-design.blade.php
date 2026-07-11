<x-app-layout>
    <div class="flex justify-center items-center h-screen bg-gradient-to-br from-slate-950 to-slate-900">
        <div class="relative w-full max-w-sm p-6 bg-slate-900 border border-slate-700 rounded-xl shadow-2xl overflow-hidden">
            <!-- Subtle decorative accent -->
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-amber-400 to-amber-600 rounded-xl"></div>


            <!-- Brand section -->
            <div class="text-center mb-6 mt-1">
                <div class="flex justify-center mb-3">
                    <div class="w-11 h-11 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-slate-100 tracking-tight">
                    PlanPacer
                </h1>
                <p class="text-xs text-slate-400 mt-0.5 font-medium">Create your account</p>
            </div>

            <!-- Register form -->
            <form method="POST" action="{{ url('/register') }}" class="space-y-4">
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

                <!-- Name field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Full Name
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="John Doe">
                </div>

                <!-- Email field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Email Address
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="you@company.com">
                </div>

                <!-- Password field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Password
                    </label>
                    <input type="password" name="password" required autocomplete="new-password"
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="••••••••••••">
                </div>

                <!-- Confirm Password field -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full bg-slate-800 border border-slate-700 hover:border-slate-600 focus:border-amber-500 focus:ring-4 focus:ring-amber-500/20 rounded-lg p-2.5 text-sm text-slate-100 placeholder-slate-500 transition-colors duration-200 outline-none"
                        placeholder="••••••••••••">
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-slate-900 font-semibold py-2.5 px-4 rounded-lg shadow-lg shadow-amber-500/20 text-sm">
                    Create Account
                </button>

                <!-- Return to Login link -->
                <div class="text-center text-xs pt-0.5">
                    <a href="{{ url('/login') }}" class="text-amber-400 hover:text-amber-300 font-medium hover:underline transition-colors">
                        Return to Login
                    </a>
                </div>

            </form>



            <!-- Footer with Laravel Fortify info -->
            <div class="mt-5 text-center border-t border-slate-800 pt-4">
                <div class="text-[10px] text-slate-500 leading-relaxed">
                    <span class="text-slate-400 font-medium">Laravel Fortify</span>
                    <span class="mx-1">•</span>
                    Secure registration powered by Laravel's Fortify
                    <br>
                    <span class="text-slate-600">Password validation • Email verification • Rate limiting</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>