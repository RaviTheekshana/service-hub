<x-layout>
@auth
    <div x-data="{ showModal: true }" x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <p class="text-lg font-semibold mb-4">You are not authorized to view this page.</p>
        </div>
    </div>
@endauth
</x-layout>
