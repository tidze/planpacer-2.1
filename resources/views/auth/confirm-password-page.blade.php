<x-layouts.app>
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <p class="text-sm text-gray-600 mb-6">This is a secure area of the application. Please confirm your password before continuing.</p>
        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm border p-2" placeholder="Password">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                Confirm Password
            </button>
        </form>
    </div>
</x-layouts.app>
