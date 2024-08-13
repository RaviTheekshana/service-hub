
    <head>
        <title>Booking</title>{{-- ... --}}
        @vite('resources/js/app.js')
    </head>
    <x-layout>
        <!-- Card Blog -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:pt-28 mx-auto">
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Categories</h2>
                <p class="mt-1 text-gray-600">See how game-changing companies are making the most of every engagement with Preline.</p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1633114128174-2f8aa49759b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Announcing a free plan for small teams
                        </h3>
                        <p class="mt-5 text-gray-600">
                            At Wake, our mission has always been focused on bringing openness.
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                        <div>
                            <h5 class="text-sm text-gray-800">By Lauren Waller</h5>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1562851529-c370841f6536?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            How Google Assistant now helps you record stories for kids
                        </h3>
                        <p class="mt-5 text-gray-600">
                            Google is constantly updating its consumer AI, Google Assistant, with new features.
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                        <div>
                            <h5 class="text-sm text-gray-800">By Aaron Larsson</h5>
                        </div>
                    </div>
                </a>
                <!-- End Card -->

                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1521321205814-9d673c65c167?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Front accounts - let's work together
                        </h3>
                        <p class="mt-5 text-gray-600">
                            Are you an accountant? Are you a company formation advisor?
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                        <div>
                            <h5 class="text-sm text-gray-800">By Lauren Waller</h5>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            </div>
            <!-- End Grid -->

            <!-- Card -->
            <div class="mt-12 text-center">
                <a class="py-3 px-4 inline-flex items-center gap-x-1 text-sm font-medium rounded-full border border-gray-200 bg-white text-blue-600 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" href="{{ url('/bookings/portfolio') }}">
                    Read more
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </a>
            </div>
            <!-- End Card -->
        </div>
        <!-- End Card Blog -->
        <div class="text-center">
            <form action="{{ route('bookings.book') }}" method="GET">
                <button
                    type="submit"
                    class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-2xl border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                   Book Now
                </button>
            </form>
        </div>

    </x-layout>
<x-footer/>
