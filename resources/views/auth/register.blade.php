<x-app-layout>
    <div class="bg-gray-900 text-gray-100 antialiased min-h-screen flex flex-col justify-center items-center px-4">

        <div class="w-full max-w-md bg-gray-800 border border-gray-700 rounded-lg shadow-xl p-8">

            <!-- App Title / Logo Area -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white tracking-tight">PlanPacer</h2>
                <p class="text-gray-400 text-sm mt-2">{{ __('Create your account to get started') }}</p>
            </div>

            <!-- Global Error Handling alerts -->
            @if ($errors->any())
                <div class="bg-red-900/50 border border-red-500 text-red-200 text-sm p-4 rounded-md mb-6">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form (Fortify routes to /register by default) -->
            <form method="POST" action="{{ url('/register') }}" class="space-y-5">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Full Name') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="w-full bg-gray-950 border border-gray-700 rounded-md py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>

                <!-- Email Address Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Email Address') }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="w-full bg-gray-950 border border-gray-700 rounded-md py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        class="w-full bg-gray-950 border border-gray-700 rounded-md py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">{{ __('Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                        class="w-full bg-gray-950 border border-gray-700 rounded-md py-2 px-3 text-white placeholder-gray-500 focus:outline-none focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition">
                </div>

                <!-- Actions buttons -->
                <div class="pt-2 flex flex-col space-y-4">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-medium py-2 px-4 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 transition">
                        {{ __('Register Account') }}
                    </button>

                    <div class="text-center">
                        <a href="{{ url('/login') }}" class="text-sm text-indigo-400 hover:text-indigo-300 transition">
                            {{ __('Already have an account? Sign in') }}
                        </a>
                    </div>
                </div>
            </form>

        </div>

    </div>
</x-app-layout>
