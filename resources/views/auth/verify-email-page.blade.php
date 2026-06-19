<x-layouts.app>
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md text-center">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Verify Your Email</h2>
        <p class="text-gray-600 mb-6">Before proceeding, please check your email inbox for a verification link.</p>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                Resend Verification Email
            </button>
        </form>
    </div>
</x-layouts.app>
