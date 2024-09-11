<x-layout>
    <x-banner/>
    @auth
    <!-- Comment Form -->
    <div class="max-w-[85rem] pt-24 px-4 py-28 sm:px-6 lg:px-8 lg:py-10 mx-auto">
        <div class="mx-auto max-w-2xl">
            <div class="text-center">
                <h2 class="text-xl text-gray-800 font-bold sm:text-3xl">
                    Post a comment
                </h2>
            </div>

            <!-- Card -->
            <div class="mt-5 p-4 relative z-10 bg-white border rounded-xl sm:mt-10 md:p-10">
                <form action="{{ route('review.store') }}" method="POST">
                    @csrf
                    <!-- Hidden Fields -->
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="service_provider_id" value="{{ $service_provider_id }}">
                    <input type="hidden" name="booking_id" value="{{ $booking_id->id }}">
                    <div class="flex items-center gap-x-3">
                        <div class="shrink-0">
                            <img class="shrink-0 size-16 rounded-full" src="{{ get_service_providers()->where('id', $service_provider_id)->first()->profile_photo_url}}" alt="Avatar">
                        </div>

                        <div class="grow">
                            <h1 class="text-lg font-medium text-gray-800">
                                {{ get_service_providers()->where('id', $service_provider_id)->first()->name}}
                            </h1>
                            <p class="text-sm text-gray-600">
                                {{ get_service_providers()->where('id', $service_provider_id)->first()->email}}
                            </p>
                        </div>
                    </div>
                    <!-- Rating Field -->
                    <div x-data="{ rating: 0 }" class="mb-4 sm:mb-8">
                        <label for="rating" class="block mb-2 text-lg-center font-semibold">Rating</label>

                        <div class="flex items-center space-x-1 text-yellow-400 text-8xl lg:ps-28">
                            <template x-for="star in 5">
            <span @click="rating = star"
                  :class="{'text-gray-300': star > rating}"
                  class="cursor-pointer">
                ★
            </span>
                            </template>
                        </div>

                        <select id="rating" name="rating"
                                x-model="rating"
                                class="mt-4 py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="" disabled>Select a rating</option>
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>


                    <div class="mb-4 sm:mb-8">
                        <label for="comment" class="block mb-2 text-sm font-medium">Comment</label>
                        <div class="mt-1">
                            <textarea id="comment" name="comment" rows="3" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Leave your comment here..."></textarea>
                        </div>
                    </div>

                    <div class="mt-6 grid">
                        <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
    @endauth
    <!-- End Comment Form -->
</x-layout>
