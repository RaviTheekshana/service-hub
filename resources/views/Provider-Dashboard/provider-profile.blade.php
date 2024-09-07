<x-guest-layout>
    @include('components.guestvisibility')
    @auth
    @include('layouts.slidebar')
    <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
        <form id="profile-form" action="{{route('profile_management.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Card -->
            <div class="bg-white rounded-xl shadow">
                @if($profile)
                    <div class="relative h-40 rounded-t-xl bg-no-repeat bg-cover bg-center" style="background-image: url('{{ $profile->profile_bg_path }}');">
                @else
                            <div class="relative h-40 rounded-t-xl bg-[url('https://preline.co/assets/svg/examples/abstract-bg-1.svg')] bg-no-repeat bg-cover bg-center">
                @endif
                    <!-- Cover Photo Upload Form -->
                    <div class="absolute top-0 end-0 p-4">
                        @if($profile)
                        <form></form>
                        <form action="{{ route('profile.bg.update') }}" enctype="multipart/form-data" method="POST"  id="coverPhotoForm">
                            @csrf
                            <input type="file" name="cover" id="cover_photo" class="hidden" onchange="document.getElementById('coverPhotoForm').submit();">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                                    onclick="document.getElementById('cover_photo').click();">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                    <polyline points="17 8 12 3 7 8"/>
                                    <line x1="12" x2="12" y1="3" y2="15"/>
                                </svg>
                                Upload Cover Photo
                            </button>
                        </form>
                        @endif
                    </div>
                </div>

                <div class="pt-0 p-4 sm:pt-0 sm:p-7">
                    <!-- Grid -->
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-5">
                                <img class="-mt-8 relative z-10 inline-block size-24 mx-auto sm:mx-0 rounded-full ring-4 ring-white" src="{{ Auth::user()->profile_photo_url }}" alt="Avatar">

                                <!-- Profile Photo Upload Form -->
                                <div class="mt-4 sm:mt-auto sm:mb-1.5 flex justify-center sm:justify-start gap-2">
                                    <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" id="profilePhotoForm">
                                        @csrf
                                        <input type="file" name="photo" id="profile_photo" class="hidden" onchange="document.getElementById('profilePhotoForm').submit();">
                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                                                onclick="document.getElementById('profile_photo').click();">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                                <polyline points="17 8 12 3 7 8"/>
                                                <line x1="12" x2="12" y1="3" y2="15"/>
                                            </svg>
                                            Upload Profile Photo
                                        </button>
                                    </form>
                                </div>
                            </div>
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
                            <input id="email" name="email" value="{{$user->email}}" type="email" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" required>
                        </div>
                        <!-- End Col -->

                        <div>
                                <label for="phone" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                    Phone
                                </label>
                                <input name="phone" id="phone" value="{{$user->phone}}" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" maxlength="12" required>
                        </div>
                        <!-- End Col -->
                    <!-- End Section -->
                        <div class="space-y-2">
                            <label for="experience_years" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Experience Years
                            </label>

                            <input name="experience_years" id="experience_years" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Enter Your Experience Years" required>
                        </div>

                        <div class="space-y-2">
                            <label for="hourly_rate" class="inline-block text-sm font-medium text-gray-800 mt-2.5">
                                Hourly Average Rate
                            </label>

                            <input name="hourly_rate" id="hourly_rate_price" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="LKR" required>
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
                                    Certificates
                                </label>
                            </div>
                            <!-- End Col -->
                            <div class="sm:col-span-9">
                                <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                <input type="file" name="certificate" id="af-submit-application-resume-cv"
                                       class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-2 file:px-4" required>
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
                                <textarea id="af-submit-application-bio" name="personal_summary" class="pt-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="Briefly add your personal information and service details" required></textarea>
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
                            <textarea id="work_experience" name="work_experience" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" rows="6" placeholder="A detailed summary will better explain your project to the audiences. Our users will see this in your dedicated Portfolio page." required></textarea>
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
        </form>
        @if($profile)
        <form class="py-2 lg:ps-72" action="{{ route('profile_management.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this profile?');">
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
        @if($profile)
        <!-- component -->
        <form action="{{ route('profile_management.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-transparent h-screen w-full sm:px-8 md:px-16 sm:py-8 lg:ps-72">
                <main class="container mx-auto max-w-screen-lg h-full">
                    <!-- file upload modal -->
                    <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white shadow-xl rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                        <!-- overlay -->
                        <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                            <i>
                                <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                </svg>
                            </i>
                            <p class="text-lg text-blue-700">Drop files to upload</p>
                        </div>

                        <!-- scroll area -->
                        <section class="h-full overflow-auto p-8 w-full flex flex-col">
                            <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                    <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                </p>
                                <input id="hidden-input" type="file" name="project[]" multiple class="hidden" />
                                <button type="button" id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none" onclick="document.getElementById('hidden-input').click();">
                                    Upload a file
                                </button>
                            </header>

                            <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                To Upload
                            </h1>

                            <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                <li id="empty" class="h-75 w-full text-center flex flex-col justify-center items-center">
                                    <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                    <span class="text-small text-gray-500">No files selected</span>
                                </li>
                            </ul>
                        </section>

                        <!-- sticky footer -->
                        <footer class="flex justify-end px-8 pb-8 pt-4">
                            <button type="submit" id="submit" class="rounded-xl px-3 py-1 bg-blue-600 hover:bg-blue-700 hover:text-white text-white focus:shadow-outline focus:outline-none">
                                Upload now
                            </button>
                            <button id="cancel" class="ml-3 rounded-xl px-3 py-1 bg-gray-300 hover:bg-gray-500 hover:text-white focus:shadow-outline focus:outline-none">
                                Cancel
                            </button>
                        </footer>
                    </article>
                </main>
            </div>
        </form>

        <template id="image-template">
            <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/3 xl:w-1/8 h-1/3">
                <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                    <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                    <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                        <h1 class="flex-1"></h1>
                        <div class="flex">
              <span class="p-1">
                <i>
                  <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                  </svg>
                </i>
              </span>

                            <p class="p-1 size text-xs"></p>
                            <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                </svg>
                            </button>
                        </div>
                    </section>
                </article>
            </li>
        </template>

        <script>
            const fileTempl = document.getElementById("file-template"),
                imageTempl = document.getElementById("image-template"),
                empty = document.getElementById("empty");

            // use to store pre selected files
            let FILES = {};

            // check if file is of type image and prepend the initialied
            // template to the target element
            function addFile(target, file) {
                const isImage = file.type.match("image.*"),
                    objectURL = URL.createObjectURL(file);

                const clone = isImage
                    ? imageTempl.content.cloneNode(true)
                    : fileTempl.content.cloneNode(true);

                clone.querySelector("h1").textContent = file.name;
                clone.querySelector("li").id = objectURL;
                clone.querySelector(".delete").dataset.target = objectURL;
                clone.querySelector(".size").textContent =
                    file.size > 1024
                        ? file.size > 1048576
                            ? Math.round(file.size / 1048576) + "mb"
                            : Math.round(file.size / 1024) + "kb"
                        : file.size + "b";

                isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });

                empty.classList.add("hidden");
                target.prepend(clone);

                FILES[objectURL] = file;
            }

            const gallery = document.getElementById("gallery"),
                overlay = document.getElementById("overlay");

            // click the hidden input of type file if the visible button is clicked
            // and capture the selected files
            const hidden = document.getElementById("hidden-input");
            document.getElementById("button").onclick = () => hidden.click();
            hidden.onchange = (e) => {
                for (const file of e.target.files) {
                    addFile(gallery, file);
                }
            };

            // use to check if a file is being dragged
            const hasFiles = ({ dataTransfer: { types = [] } }) =>
                types.indexOf("Files") > -1;

            // use to drag dragenter and dragleave events.
            // this is to know if the outermost parent is dragged over
            // without issues due to drag events on its children
            let counter = 0;

            // reset counter and append file to gallery when file is dropped
            function dropHandler(ev) {
                ev.preventDefault();
                for (const file of ev.dataTransfer.files) {
                    addFile(gallery, file);
                    overlay.classList.remove("draggedover");
                    counter = 0;
                }
            }

            // only react to actual files being dragged
            function dragEnterHandler(e) {
                e.preventDefault();
                if (!hasFiles(e)) {
                    return;
                }
                ++counter && overlay.classList.add("draggedover");
            }

            function dragLeaveHandler(e) {
                1 > --counter && overlay.classList.remove("draggedover");
            }

            function dragOverHandler(e) {
                if (hasFiles(e)) {
                    e.preventDefault();
                }
            }

            // event delegation to caputre delete events
            // fron the waste buckets in the file preview cards
            gallery.onclick = ({ target }) => {
                if (target.classList.contains("delete")) {
                    const ou = target.dataset.target;
                    document.getElementById(ou).remove(ou);
                    gallery.children.length === 1 && empty.classList.remove("hidden");
                    delete FILES[ou];
                }
            };

            // print all selected files
            document.getElementById("submit").onclick = () => {
                // alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
                console.log(FILES);
            };

            // clear entire selection
            document.getElementById("cancel").onclick = () => {
                while (gallery.children.length > 0) {
                    gallery.lastChild.remove();
                }
                FILES = {};
                empty.classList.remove("hidden");
                gallery.append(empty);
            };

        </script>

        <style>
            .hasImage:hover section {
                background-color: rgba(5, 5, 5, 0.4);
            }
            .hasImage:hover button:hover {
                background: rgba(5, 5, 5, 0.45);
            }

            #overlay p,
            i {
                opacity: 0;
            }

            #overlay.draggedover {
                background-color: rgba(255, 255, 255, 0.7);
            }
            #overlay.draggedover p,
            #overlay.draggedover i {
                opacity: 1;
            }

            .group:hover .group-hover\:text-blue-800 {
                color: #2b6cb0;
            }
        </style>

        @endif
    </div>
    <!-- End Card Section -->
    @endauth
</x-guest-layout>
