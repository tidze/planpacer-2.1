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

                    <x-nav-link href="{{ route('profile.settings') }}" :active="request()->routeIs('profile.settings')">
                        {{ __('Settings') }}
                    </x-nav-link>

                    <!-- Authentication -->
                    <form class="flex justify-center" method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button
                            class="inline-flex items-center px-1 pt-1
                            border-b-2 border-transparent text-sm font-medium leading-5
                            text-gray-400 hover:text-gray-300 hover:border-gray-700
                            focus:outline-none focus:text-gray-300 focus:border-gray-700 transition duration-150 ease-in-out">
                            logout
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
