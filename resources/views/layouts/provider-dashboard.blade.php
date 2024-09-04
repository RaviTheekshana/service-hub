<x-guest-layout>
@include('layouts.slidebar')
    @include('test')
    <!-- Content -->
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <!-- your content goes here ... -->
        <div class="flex justify-end space-x-4">
            <!-- Home Button -->
            <a href="{{ url('/') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Home
            </a>

            <!-- Logout Button -->
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </button>
            @livewire('UserNotification')
            <div class="ms-3 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-10 w-10 rounded-full object-cover"
                                     src="{{ Auth::user()->profile_photo_url }}"
                                     alt="{{ Auth::user()->name }}"/>
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                        </svg>
                                    </button>
                                </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hidden Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- Features -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
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
        <!-- Card Section -->
        <!-- Profile -->
        <div class="flex items-center gap-x-3">
            <div class="shrink-0">
                <img class="shrink-0 size-16 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="Avatar">
            </div>

            <div class="grow">
                <h1 class="text-lg font-medium text-gray-800">
                    {{ auth()->user()->name }}
                </h1>
                <p class="text-sm text-gray-600">
                    {{ ucfirst(get_categories()->where('id', auth()->user()->category_id)->first()->name)}}
                </p>
            </div>
        </div>
        <!-- End Profile -->

        <!-- About -->
        <div class="mt-8">
            <p class="text-sm text-gray-600">
                Hi, I'm Eliana Garcia, a freelance designer based in New York City. I specialize in creating clean, elegant, and functional designs that help businesses succeed. I've designed a variety of websites and user interfaces for companies and individuals over the past 10 years.
            </p>

            <p class="mt-3 text-sm text-gray-600">
                Currently, I work remotely for Notion, where I design template UIs, convert them into HTML and CSS, and provide comprehensive support to our users. I am passionate about crafting elegant and functional designs that enhance user experiences.
            </p>

            <ul class="mt-5 flex flex-col gap-y-3">
                <li class="flex items-center gap-x-2.5">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    <a class="text-[13px] text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2" href="#">
                        elianagarcia997@about.me
                    </a>
                </li>

                <li class="flex items-center gap-x-2.5">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.1881 10.1624L22.7504 0H20.7214L13.2868 8.82385L7.34878 0H0.5L9.47944 13.3432L0.5 24H2.5291L10.3802 14.6817L16.6512 24H23.5L14.1881 10.1624ZM11.409 13.4608L3.26021 1.55962H6.37679L20.7224 22.5113H17.6058L11.409 13.4613V13.4608Z" fill="currentColor"/></svg>
                    <a class="text-[13px] text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2" href="#">
                        @elianagarcia997
                    </a>
                </li>

                <li class="flex items-center gap-x-2.5">
                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M19.13 5.09C15.22 9.14 10 10.44 2.25 10.94"/><path d="M21.75 12.84c-6.62-1.41-12.14 1-16.38 6.32"/><path d="M8.56 2.75c4.37 6 6 9.42 8 17.72"/></svg>
                    <a class="text-[13px] text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-none focus:decoration-2" href="#">
                        @elianagarcia997
                    </a>
                </li>
            </ul>
        </div>
        <!-- End About -->
        <!-- Icon Blocks -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-center gap-6 md:gap-10">
                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Build your portfolio</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">The simplest way to keep your portfolio always up-to-date.</p>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h20"/><path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3"/><path d="m7 21 5-5 5 5"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Get freelance work</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">New design projects delivered to your inbox each morning.</p>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2v0a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12v0a2 2 0 0 1-2-2V7"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Sell your goods</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">Get your goods in front of millions of potential customers with ease.</p>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5.5 8.5 9 12l-3.5 3.5L2 12l3.5-3.5Z"/><path d="m12 2 3.5 3.5L12 9 8.5 5.5 12 2Z"/><path d="M18.5 8.5 22 12l-3.5 3.5L15 12l3.5-3.5Z"/><path d="m12 15 3.5 3.5L12 22l-3.5-3.5L12 15Z"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Get freelance work</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">New design projects delivered to your inbox each morning.</p>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16.466 7.5C15.643 4.237 13.952 2 12 2 9.239 2 7 6.477 7 12s2.239 10 5 10c.342 0 .677-.069 1-.2"/><path d="m15.194 13.707 3.814 1.86-1.86 3.814"/><path d="M19 15.57c-1.804.885-4.274 1.43-7 1.43-5.523 0-10-2.239-10-5s4.477-5 10-5c4.838 0 8.873 1.718 9.8 4"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Sell your goods</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">Get your goods in front of millions of potential customers with ease.</p>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="size-full bg-white shadow-lg rounded-lg p-5">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                            <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z"/><rect x="3" y="14" width="7" height="7" rx="1"/><circle cx="17.5" cy="17.5" r="3.5"/></svg>
                        </div>
                        <div class="shrink-0">
                            <h3 class="block text-lg font-semibold text-gray-800">Build your portfolio</h3>
                        </div>
                    </div>
                    <p class="text-gray-600">The simplest way to keep your portfolio always up-to-date.</p>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Icon Blocks -->
    </div>
    <!-- End Content -->
    <!-- ========== END MAIN CONTENT ========== -->
</x-guest-layout>
