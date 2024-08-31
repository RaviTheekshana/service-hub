<x-guest-layout>
    @include('components.guestvisibility')
    @auth
    @include('layouts.slidebar')
<!-- Features -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 lg:ps-72 mx-auto">
    <!-- Grid -->
    <div class="grid items-center lg:grid-cols-12 gap-6 lg:gap-12">
        <div class="lg:col-span-4">
            <!-- Stats -->
            <div class="lg:pe-6 xl:pe-12">
                <p class="text-6xl font-bold leading-10 text-blue-600">
                    92%
                    <span class="ms-1 inline-flex items-center gap-x-1 bg-gray-200 font-medium text-gray-800 text-xs leading-4 rounded-full py-0.5 px-2">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>
            +7% this month
          </span>
                </p>
                <p class="mt-2 sm:mt-3 text-gray-500">of U.S. adults have bought from businesses using Space</p>
            </div>
            <!-- End Stats -->
        </div>
        <!-- End Col -->

        <div class="lg:col-span-8 relative lg:before:absolute lg:before:top-0 lg:before:-start-12 lg:before:w-px lg:before:h-full lg:before:bg-gray-200 lg:before:">
            <div class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-3 sm:gap-8">
                <!-- Stats -->
                <div>
                    <p class="text-3xl font-semibold text-blue-600">99.95%</p>
                    <p class="mt-1 text-gray-500">in fulfilling orders</p>
                </div>
                <!-- End Stats -->

                <!-- Stats -->
                <div>
                    <p class="text-3xl font-semibold text-blue-600">2,000+</p>
                    <p class="mt-1 text-gray-500">partner with Preline</p>
                </div>
                <!-- End Stats -->

                <!-- Stats -->
                <div>
                    <p class="text-3xl font-semibold text-blue-600">85%</p>
                    <p class="mt-1 text-gray-500">this year alone</p>
                </div>
                <!-- End Stats -->
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Features -->
<!-- Grid -->
<div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mr-2 lg:ps-72">
    @foreach($review as $reviews)
    <div class="p-4 border-2 border-gray-200 rounded-lg shadow-lg">
        <div class="flex items-center gap-x-3">
            <div class="shrink-0">
                <img class="shrink-0 size-16 rounded-full" src="{{ get_users()->where('id', $reviews->user_id)->first()->profile_photo_url}}" alt="Avatar">
            </div>

            <div class="grow">
                <h1 class="text-lg font-medium text-gray-800">
                    {{ get_users()->where('id', $reviews->user_id)->first()->name}}
                </h1>
                <p class="text-sm text-gray-600">
                    {{ get_users()->where('id', $reviews->user_id)->first()->email}}
                </p>
            </div>
        </div>

        <h3 class="mb-1 text-xs text-gray-600">
            Booking ID : {{ $reviews->booking_id}}
        </h3>

        <p class="font-semibold text-sm text-gray-800">
            {{ $reviews->comment}}
        </p>

        <p class="mt-1 text-lg text-gray-600">
            @if($reviews->rating == 1)
                <span class="text-yellow-400">★ - Poor</span>
            @elseif($reviews->rating == 2)
                <span class="text-yellow-400">★★ - Fair</span>
            @elseif($reviews->rating == 3)
                <span class="text-yellow-400">★★★ - Good</span>
            @elseif($reviews->rating == 4)
                <span class="text-yellow-400">★★★★ - Very Good</span>
            @elseif($reviews->rating == 5)
                <span class="text-yellow-400">★★★★★ - Excellent</span>
            @endif
        </p>
        <p class="mt-1 text-sm text-gray-600">
            {{$reviews->created_at}}
    </div>
    @endforeach
<!-- End Grid -->
    @endauth
</x-guest-layout>

