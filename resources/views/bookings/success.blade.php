<x-layout>
    <div class="pt-32 bg-blueGray-50 min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-green-600">Booking Successful!</h2>
            <p class="mt-2 text-blueGray-600">Thank you for your booking. You will receive a confirmation email shortly.</p>
            <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-pink-500 text-white px-4 py-2 rounded shadow hover:shadow-md transition-all duration-150">
                Go Back to Home
            </a>
        </div>
    </div>
</x-layout>
