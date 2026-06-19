<x-layouts.app>
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-4">2FA Security Authentication</h2>
        <p class="text-sm text-gray-600 mb-6">Please confirm access to your account by entering your authentication code code.</p>
        <form method="POST" action="{{ route('two-factor.login') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Authentication Code</label>
                <input type="text" name="code" autocomplete="one-time-code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm border p-2" placeholder="000000">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                Verify Identity
            </button>
        </form>
    </div>
</x-layouts.app>
