<x-app-layout>
    <div class="flex items-center mb-8 justify-center min-h-screen bg-gray-100">
        <div class="text-center">
            <h1 class="text-9xl font-bold text-gray-800">403</h1>
            <h2 class="text-2xl font-semibold text-gray-600">Forbidden</h2>
            <p class="mt-4 text-lg text-gray-500">Sorry, you don't have permission to access this page.</p>
            <p class="mt-6">
                <a href="{{ route("dashboard") }}" class="text-blue-500 hover:underline font-bold">Go to Homepage</a>
            </p>
        </div>
    </div>
</x-app-layout>
