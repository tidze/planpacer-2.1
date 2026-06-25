<nav x-data="{ open: false }" class="bg-gray-800 border-b border-gray-700 mb-1">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current  text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 -my-px ml-10 flex debug-borde">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link href="{{ route('profile.edit') }}" :active="request()->routeIs('profile.edit')">
                        {{ __('Settings') }}
                    </x-nav-link>

                    <!-- Authentication -->
                    <form class="flex justify-center" method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button
                            class="relative font-mono text-xs text-pink-500 hover:text-cyan-400 uppercase tracking-widest transition
           after:absolute after:left-0 after:bottom-0 after:w-full after:h-1 after:transition
           after:bg-transparent hover:after:bg-cyan-600">
                            [ Terminate_Session ]
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
