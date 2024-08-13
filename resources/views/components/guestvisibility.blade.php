@guest
    <!-- Popup for unauthenticated users -->
    <div x-data="{ showModal: true }" x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <p class="text-lg font-semibold mb-4">You need to log in to view this page.</p>
            <button @click="window.location.href = '{{ route('login') }}'" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Login</button>
            <button @click="window.location.href = '{{ route('register') }}'" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Register</button>
            <button @click="window.history.back()" class="ml-2 text-gray-500 hover:text-gray-700">Close</button>
        </div>
    </div>
@endguest
