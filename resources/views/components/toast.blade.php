<div
    x-data="{
        show: '{{ session()->has('success') ? 'true' : 'false' }}' === 'true',
        message: '{{ session('success') }}'
    }"
    x-show="show"
    x-init="if (show) { setTimeout(() => show = false, 10000); }"
    x-transition
    id="toast-notification"
    class="fixed top-32 z-2 right-4 w-full max-w-xs p-3 text-gray-900 bg-green-300 rounded-lg shadow dark:text-gray-300"
    role="alert"
    style="display: none;"
>
    <div class="flex items-center mb-3">
        <span class="mb-1 text-lg font-semibold text-gray-900">Notification</span>
        <button
            @click="show = false"
            type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-500 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700"
            aria-label="Close"
        >
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13"/>
            </svg>
        </button>
    </div>
    <div class="flex items-center">
        <div class="relative inline-block shrink-0">
            <img class="w-12 h-12 rounded-full" src="{{auth()->user()->profile_photo_url}}" alt="Profile image" />
        </div>
        <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900">System</div>
            <div class="text-md font-normal text-gray-950" x-text="message"></div>
            <span class="text-xs font-medium text-blue-600 dark:text-blue-500">just now</span>
        </div>
    </div>
</div>
