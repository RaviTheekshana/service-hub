@if ($showReviewPopup)
    <div x-data="{ show: true }"
         x-show="show"
         class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            @foreach($unreviewedBookings as $booking)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                <h2 class="text-2xl font-bold mb-2">You have unreviewed bookings !</h2>
                <img class="w-10 h-10 me-4 rounded-full" src="{{get_service_providers()->where('id', $booking->service_provider_id)->first()->profile_photo_url}}" alt="">
                <div class="font-medium">
                    <p>{{get_service_providers()->where('id', $booking->service_provider_id)->first()->name}} <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 dark:text-gray-400">
                            {{now()}}</time></p>
                </div>
            @endforeach
            <p class="font-semibold">Please review your completed booking now Or you can review later When click in your booking table status.</p>
            <div class="mt-4 flex justify-between">
                @foreach ($unreviewedBookings as $booking)
                    <a href="{{ route('bookings.review', ['id' => $booking->id]) }}"
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg">Review Now</a>
                @endforeach
                <button @click="show = false" class="bg-gray-500 text-white px-4 py-2 rounded-lg">Review Later</button>
            </div>
        </div>
    </div>
@endif
