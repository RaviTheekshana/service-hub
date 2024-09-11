<head>
        <title>Booking</title>{{-- ... --}}
        @vite('resources/js/app.js')
</head>
<x-layout>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:pt-2 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-3 lg:mb-10">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Jobs !</h2>
            <p class="mt-1 text-gray-600">First find out if the service you need is here and join with Us</p>
        </div>
        <!-- End Title -->
        <div class="max-w-7xl mx-auto p-5">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $filteredPosts = $blogPosts;

                    // Check if the user is authenticated and a service provider
                    if (auth()->check() && auth()->user()->role == 'service_provider') {
                        // Get the service provider's category
                        $serviceProviderCategory = get_service_providers()->where('id', auth()->id())->first()->category_id;

                        // Filter posts based on the category
                        $filteredPosts = $blogPosts->where('category_id', $serviceProviderCategory);
                    }
                @endphp

                    <!-- Loop through filtered blog posts -->
                @foreach($filteredPosts as $post)
                    <!-- Card -->
                    <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                        <div class="aspect-w-16 aspect-h-11">
                            @if($post->image_path)
                                <img class="h-[190px] w-[280px] object-cover rounded-xl" src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}">
                            @else
                                <img class="w-full object-cover rounded-xl" src="https://via.placeholder.com/560x315.png?text=No+Image" alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="my-6">
                            <h1 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h1>
                            <h3 class="text-sm font-semibold text-gray-500">{{ ucfirst(get_categories()->where('id', $post->category_id)->first()->name) }}</h3>
                            <p class="mt-4 text-gray-600">{{ Str::limit($post->description, 75) }}</p>
                        </div>
                        <div class="mt-auto flex items-center gap-x-3">
                            <img class="size-8 rounded-full" src="{{ $post->user->profile_photo_url }}" alt="Author">
                            <div>
                                <h5 class="text-sm text-gray-800">By {{ $post->user->name }}</h5>
                            </div>
                        </div>
                        <!-- Include the Livewire LikeButton component -->
                        @livewire('approve-button', ['post' => $post])
                    </a>
                    <!-- End Card -->
                @endforeach
            </div>
        </div>
        <!-- End Grid -->

        <!-- Card -->
        <div class="mt-2 text-center">
            <a class="py-3 px-4 inline-flex items-center gap-x-1 text-sm font-medium rounded-full border border-gray-200 bg-white text-blue-600 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="{{ url('/bookings/portfolio') }}">
                Read more
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </a>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Blog -->

    <!-- Book Now Button -->
    <div class="text-center fixed bottom-4 right-4 z-50">
        <form action="{{ route('bookings.book') }}" method="GET">
            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-2xl border-0 border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Book Now</button>
        </form>
    </div>
</x-layout>

