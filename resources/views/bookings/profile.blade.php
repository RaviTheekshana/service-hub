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
                                    <input type="text" id="hs-as-table-product-review-search" name="hs-as-table-product-review-search" class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                    </div>
                                </div>
                            </div>
                            <!-- End Input -->
                            <div class="sm:col-span-2 md:grow">
                                <div class="flex justify-end gap-x-2">
                                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block" data-hs-dropdown-auto-close="inside">
                                        <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                                            Filter
                                            <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200">
                        1
                      </span>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                                            <div class="divide-y divide-gray-200">
                                                <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-all" checked>
                                                    <span class="ms-3 text-sm text-gray-800">All</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-published" class="flex py-2.5 px-3">
                                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-published">
                                                    <span class="ms-3 text-sm text-gray-800">Published</span>
                                                </label>
                                                <label for="hs-as-filters-dropdown-pending" class="flex py-2.5 px-3">
                                                    <input type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-as-filters-dropdown-pending">
                                                    <span class="ms-3 text-sm text-gray-800"></span>
                                                </label>
                                            </div>
                                        </div>
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
                                            <span class="block text-sm text-gray-500">{{ Str::limit($profiles->personal_summary, 160) }}</span>
                                        </div>
                                    </a>
                                </td>
                                <td class="size-px whitespace-nowrap align-top">
                                        <div class="flex block p-6 gap-x-1 mb-2">
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
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
</x-layout>
