<x-layout>
    <!-- Table Section -->
    <div class="max-w-[85rem] min-h-screen px-4 py-10 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <!-- Input -->
                            <div class="sm:col-span-1">
                                <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <form method="GET" action="{{ route('portfolio') }}">
                                        <input type="text" id="search-provider" name="search"
                                               class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                               placeholder="Search" value="{{ request()->get('search') }}">
                                        <button type="submit" class="hidden"></button> <!-- Optional, submit when typing or press enter -->
                                    </form>
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->
                            <div class="sm:col-span-2 md:grow">
                                <div class="flex justify-end gap-x-2">
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block" data-hs-dropdown-auto-close="inside">
                                        <form method="GET" action="{{ route('portfolio') }}">
                                        <select id="category" name="category" onchange="this.form.submit()" class="py-2 pl-2 pr-9 appearance-none bg-blue-500 border-transparent rounded-lg text-md text-white font-semibold">
                                            <option class="bg-white text-gray-950 font-semibold" value="">All Categories</option>
                                            @foreach($categories as $category)
                                                <option class="bg-white text-gray-950 font-semibold" value="{{ $category->id }}" {{ request()->input('category') == $category->id ? 'selected' : '' }}>
                                                    {{ ucfirst($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                <svg class="w-6 h-6 fill-white text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Name
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Category
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Details
                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Rating
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Experience Years
                    </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Hourly Rate
                    </span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Active
                    </span>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                            @foreach($profile as $profiles)
                            <tr class="bg-white hover:bg-gray-50">
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="{{route('profile_management.show', ['profile_management' => $profiles->id])}}">
                                        <div class="flex items-center gap-x-4">
                                            <img class="shrink-0 size-[50px] rounded-lg" src="{{ get_service_providers()->where('id', $profiles->service_provider_id)->first()->profile_photo_url}}" alt="Product Image">
                                            <div>
                                                <span class="block text-sm font-semibold text-gray-800">{{ ucfirst(get_service_providers()->where('id', $profiles->service_provider_id)->first()->name)}}</span>
                                                <span class="block text-sm text-gray-500">{{ ucfirst(get_service_providers()->where('id', $profiles->service_provider_id)->first()->email)}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                        <div class="flex items-center gap-x-3 mt-2">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800">{{ ucfirst(get_categories()->where('id', $profiles->category_id)->first()->name)}}</span>

                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                        <div class="flex gap-x-1 mt-1 mb-2">
                                            <span class="block text-sm text-gray-500">{{ Str::limit($profiles->personal_summary, 20) }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                        <div class="flex p-6 gap-x-1 mb-2">
                                            @php
                                                $rate= number_format(get_reviews('service_provider_id', $profiles->service_provider_id), 1) ?? 'No reviews yet'
                                            @endphp
                                            <p class="text-2xl">
                                                @php
                                                    $fullStars = floor($rate); // Number of full stars
                                                    $halfStar = ($rate - $fullStars) >= 0.5; // Determine if there should be a half star
                                                    $emptyStars = 5 - $fullStars - $halfStar; // Remaining empty stars
                                                @endphp

                                                @for ($i = 1; $i <= $fullStars; $i++)
                                                    <span class="text-yellow-400">&#9733;</span> <!-- Full star -->
                                                @endfor

                                                @if ($halfStar)
                                                    <span class="text-yellow-400">&#9734;</span> <!-- Half star -->
                                                @endif

                                                @for ($i = 1; $i <= $emptyStars; $i++)
                                                    <span class="text-gray-300">&#9733;</span> <!-- Empty star -->
                                                @endfor
                                                <span class="text-md-center text-gray-500">{{$rate}}</span>
                                            </p>
                                        </div>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                        <span class="text-sm text-gray-600">{{ $profiles->experience_years }}</span>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                                        <span class="text-sm text-gray-600">{{ $profiles->hourly_rate }}</span>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                    <a class="block p-6" href="#">
                    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </svg>
                      {{ ucfirst($profiles->status) }}
                    </span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->

                        <!-- Footer -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div class="max-w-sm space-y-3">
                                <select class="py-2 pl-5 pe-9 block border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                </select>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                                        Prev
                                    </button>

                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        Next
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <script>
            let typingTimer;
            let debounceInterval = 500; // Delay time in milliseconds (0.5 seconds)

            document.getElementById('search-provider').addEventListener('keyup', function() {
                clearTimeout(typingTimer);
                typingTimer = setTimeout(function() {
                    document.getElementById('search-provider').form.submit();
                }, debounceInterval);
            });

        </script>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
</x-layout>
