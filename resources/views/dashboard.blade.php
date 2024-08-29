<x-layout>
    <x-banner/>
    <nav class="relative z-0 flex border rounded-xl overflow-hidden" aria-label="Tabs" role="tablist"
         aria-orientation="horizontal">
        <button type="button"
                class="hs-tab-active:border-b-blue-600 hs-tab-active:text-black relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-3 px-3 text-gray-500 hover:text-gray-700 text-lg font-bold text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none active"
                id="bar-with-underline-item-1" aria-selected="true" data-hs-tab="#bar-with-underline-1"
                aria-controls="bar-with-underline-1" role="tab">
            Job Post
        </button>
        <button type="button"
                class="hs-tab-active:border-b-blue-600 hs-tab-active:text-black relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-3 px-3 text-gray-500 hover:text-gray-700 text-lg font-bold text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
                id="bar-with-underline-item-2" aria-selected="false" data-hs-tab="#bar-with-underline-2"
                aria-controls="bar-with-underline-2" role="tab">
            Create Job Post
        </button>
        <button type="button"
                class="hs-tab-active:border-b-blue-600 hs-tab-active:text-black relative min-w-0 flex-1 bg-white first:border-s-0 border-s border-b-2 py-3 px-3 text-gray-500 hover:text-gray-700 text-lg font-bold text-center overflow-hidden hover:bg-gray-50 focus:z-10 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none"
                id="bar-with-underline-item-3" aria-selected="false" data-hs-tab="#bar-with-underline-3"
                aria-controls="bar-with-underline-3" role="tab">
            Booking
        </button>
    </nav>

    <div>
        <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto min-h-screen">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg overflow-hidden drop-shadow-md">
                                <table class="bg-white min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Title
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Category
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Image
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Approved
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                    @if($blog->isEmpty())
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="pl-3 py-3">
                                                    <span class="text-md-center font-semibold text-gray-600">No Job post found</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach($blog as $blogs)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{$blogs->title}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ucfirst(get_categories()->where('id', $blogs->category_id)->first()->name)}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{$blogs->description}}</td>
                                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-800"><img
                                                    class="size-20" src="{{ asset('storage/' . $blogs->image_path) }}"
                                                    alt="{{ $blogs->title }}"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                <select
                                                    class="block w-full text-sm text-gray-800 rounded-4 border-blue-500"
                                                    onchange="redirectToPortfolio(this)">
                                                    <option value="">Select a Service Provider</option>
                                                    @foreach($approves->where('blog_post_id', $blogs->id) as $approve)
                                                        @php
                                                            $serviceProvider = get_service_providers()->where('id', $approve->user_id)->first();
                                                            $profile = \App\Models\Profile_Management::where('service_provider_id', $approve->user_id)->first();
                                                        @endphp
                                                        <option value="{{ $profile->id }}">
                                                            {{ $serviceProvider->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="{{route('job.destroy', $blogs->id)}}"
                                                   class="p-1 bg-white inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">
            <div class="max-w-4xl px-4 py-8 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-800">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('job.store') }}" method="POST" enctype="multipart/form-data"
                      x-data="{ title: '', description: '', image: null, imagePreview: '' }">
                    @csrf
                    <h2 class="text-2xl font-bold text-gray-700 text-center">Create a Job Post</h2>
                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                        <input type="text" id="title" name="title" x-model="title"
                               class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500"
                               placeholder="Enter your post title" required>
                    </div>
                    <div class="mb-3" x-data="{category: '{{ old('category_id', '') }}',}">
                        <label for="title" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category" x-model="category" name="category_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Select</option>
                            @foreach(get_categories() as $category)
                                <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" x-model="description"
                                  class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500"
                                  rows="4" placeholder="Enter your post description" required></textarea>
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-3">
                        <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                        <input type="file" id="image" name="image" @change="handleImageUpload"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               required>
                        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <!-- Image Preview -->
                        <template x-if="imagePreview">
                            <img :src="imagePreview" alt="Image Preview" class="mt-4 w-full object-cover rounded-lg">
                        </template>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-3">
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Post
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div id="bar-with-underline-3" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-3">
            <!-- Table Section -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto min-h-screen-75">
                <!-- Card -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                <!-- Header -->
                                <div
                                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-900">
                                            Booking
                                        </h2>
                                        <p class="text-lg text-gray-700">
                                            This is a list of all bookings you have created.
                                        </p>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">
                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                               href="#">
                                                View all
                                            </a>

                                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                               href="{{route('bookings.book')}}">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                     width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                    <path d="M5 12h14"/>
                                                    <path d="M12 5v14"/>
                                                </svg>
                                                Create
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Header -->

                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="pl-3 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        ID
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Service Provider
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Service Date & Time
                    </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Description
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Status
                    </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Address
                    </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Phone
                    </span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                      Created
                    </span>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200">
                                    @if($book->isEmpty())
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="pl-3 py-3">
                                                    <span class="text-md-center font-semibold text-gray-600">No bookings found</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach($book as $books)
                                        <tr>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="pl-3 py-3">
                                                    <span class="text-sm text-gray-600">{{$books->id}}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                @php
                                                    $profiles = \App\Models\Profile_Management::where('service_provider_id', $books->service_provider_id)->first();
                                                @endphp
                                                <a class="block"
                                                   href="{{route('profile_management.show', ['profile_management' => $profiles->id])}}">
                                                    <div class="px-6 py-3">
                                                        <div class="flex items-center gap-x-2">
                                                            <img class="inline-block size-10 rounded-full"
                                                                 src="{{get_service_providers()->where('id', $books->service_provider_id)->first()->profile_photo_url}}"
                                                                 alt="Avatar">
                                                            <div class="grow">
                                                                <span
                                                                    class="text-sm text-gray-950">{{get_service_providers()->where('id', $books->service_provider_id)->first()->name}}</span>
                                                                <span
                                                                    class="block text-sm text-gray-500">{{get_service_providers()->where('id', $books->service_provider_id)->first()->email}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800">{{\Carbon\Carbon::parse($books->service_date)->format('F j, Y')}}</span>
                                                    <span
                                                        class="block text-sm text-gray-500">{{$books->service_time}}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800">{{$books->description}}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    @php
                                                        $statusClasses = [
                                                            'Pending' => 'bg-gray-100 text-gray-800',
                                                            'Confirmed' => 'bg-yellow-100 text-yellow-800',
                                                            'Completed' => 'bg-green-100 text-green-800',
                                                            'Cancelled' => 'bg-red-100 text-red-800'
                                                        ];
                                                    @endphp

                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-full {{ $statusClasses[$books->status] }}">
            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>{{ $books->status }}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="text-sm text-gray-600">{{$books->address}}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span class="block text-sm text-gray-800">{{$books->phone}}</span>
                                                    <span
                                                        class="block text-sm text-gray-500">{{$books->phone_two}}</span>
                                                </div>
                                            </td>
                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="text-sm text-gray-600">{{\Carbon\Carbon::parse($books->created_at)->format('F j, Y')}}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table -->

                                <!-- Footer -->
                                <div
                                    class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                                    <div>
                                        <p class="text-sm text-gray-600">
                                            <span class="font-semibold text-gray-800">{{count($book)}}</span> results
                                        </p>
                                    </div>

                                    <div>
                                        <div class="inline-flex gap-x-2">
                                            <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                     width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                    <path d="m15 18-6-6 6-6"/>
                                                </svg>
                                                Prev
                                            </button>

                                            <button type="button"
                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                Next
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                     width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                    <path d="m9 18 6-6-6-6"/>
                                                </svg>
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
        </div>
    </div>
    <a href="{{route('chat.index')}}">
        <button type="submit"
                class="py-2.5 px-3.5 inline-flex items-center gap-x-2 bg-blue-500 text-sm font-weight-bold rounded-2xl border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 fixed bottom-4 right-4 z-50">
            Message
        </button>
    </a>
    <script>
        function redirectToPortfolio(selectElement) {
            let profileId = selectElement.value;
            if (profileId) {
                window.location.href = `/profile_management/${profileId}`;
            }
        }
        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.image = file;
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imagePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-layout>
