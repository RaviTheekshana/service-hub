<x-guest-layout>
    @include('layouts.slidebar')
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">

        <form id="profile-form" action="{{route('profile_management.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Card -->
            <div class="bg-white rounded-xl shadow">
                <div class="relative h-40 rounded-t-xl bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center">
                    <div class="absolute top-0 end-0 p-4">
                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            Upload Cover Photo
                        </button>
                    </div>
                </div>

                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">
                        <div>

                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5">
                                <img class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 rounded-full ring-4 ring-white" src="{{ Auth::user()->profile_photo_url }}" alt="Avatar">

                                <div class="mt-4 sm:mt-auto sm:mb-1.5 flex justify-center sm:justify-start gap-2">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                        Upload Profile Photo
                                    </button>

                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger text-red-700">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="sm:col-span-12">
                            <h2 class="text-lg font-semibold text-gray-800">
                                Profile Information
                            </h2>
                        </div>
                        <div>
                            <label for="full_name" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Full name
                            </label>
                            <input id="full_name" name="full_name" value="{{ $user->name }}" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                        </div>
                        <!-- End Col -->

                        <div>
                            <label for="email" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Email
                            </label>
                            <input id="email" name="email" value="{{$user->email}}" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        </div>
                        <!-- End Col -->

                        <div>
                                <label for="phone" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                    Phone
                                </label>
                                <input name="phone" id="phone" value="{{$user->phone}}" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        </div>
                        <!-- End Col -->
                    <!-- End Section -->
                        <div class="space-y-2">
                            <label for="experience_years" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Experience Years
                            </label>

                            <input name="experience_years" id="experience_years" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Enter Your Experience Years">
                        </div>

                        <div class="space-y-2">
                            <label for="hourly_rate" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Hourly Average Rate
                            </label>

                            <input id="hourly_rate" name="hourly_rate" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="LKR">
                        </div>
                        <!-- Section -->
                        <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                            <div class="sm:col-span-12">
                                <h2 class="text-lg font-semibold text-gray-800">
                                    Qualifications
                                </h2>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-3">
                                <label for="af-submit-application-resume-cv" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                    Certificate
                                </label>
                            </div>
                            <!-- End Col -->

                            <div class="sm:col-span-9">
                                <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                <input type="file" name="certificate" id="af-submit-application-resume-cv"
                                       class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4">
                            </div>
                            <!-- End Col -->
                            <div class="sm:col-span-3">
                                <div class="inline-block">
                                    <label for="af-submit-application-bio" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                        Personal Summary
                                    </label>
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="sm:col-span-9">
                                <textarea id="af-submit-application-bio" name="personal_summary" class="pt-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="Add a cover letter or anything else you want to share."></textarea>
                            </div>
                            <!-- End Col -->
                        </div>
                        <!-- End Section -->
                        <div class="sm:col-span-12">
                            <h2 class="text-lg font-semibold text-gray-800">
                                Work Details
                            </h2>
                        </div>

                        <div class="space-y-2">
                            <label for="category_id" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Category
                            </label>
                            <select name="category_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                <option value="{{auth()->user()->category_id}}">{{ ucfirst(get_categories()->where('id', auth()->user()->category_id)->first()->name)}}</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="work_experience" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Work Experience
                            </label>
                            <textarea id="work_experience" name="work_experience" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                        </div>
                    </div>
                    <!-- End Grid -->
                        @if($profile)
                    <div class="mt-5 flex justify-center gap-x-2 pb-4">
                        <button type="submit" form="profile-form" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Update your Application
                        </button>
                    </div>
                            @else
                            <div class="mt-5 flex justify-center gap-x-2 pb-4">
                                <button type="submit" form="profile-form" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    Submit your Application
                                </button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Error:</strong>
                                <span class="block sm:inline">{{ session('error') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 3.435a1 1 0 01-1.414-1.414l3.434-3.434-3.435-3.434a1 1 0 111.414-1.414L10 8.586l3.434-3.435a1 1 0 111.414 1.414L11.414 10l3.435 3.434a1 1 0 010 1.415z"/></svg>
        </span>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Success:</strong>
                                <span class="block sm:inline">{{ session('success') }}</span>
                                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 3.435a1 1 0 01-1.414-1.414l3.434-3.434-3.435-3.434a1 1 0 111.414-1.414L10 8.586l3.434-3.435a1 1 0 111.414 1.414L11.414 10l3.435 3.434a1 1 0 010 1.415z"/></svg>
        </span>
                            </div>
                        @endif

                    </div>
            </div>
        </div>
        </form>
        @if($profile)
        <form class="py-2" action="{{ route('profile_management.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this profile?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                Delete Your Profile
            </button>
        </form>
        @endif
    </div>
    <!-- End Card Section -->
</x-guest-layout>
