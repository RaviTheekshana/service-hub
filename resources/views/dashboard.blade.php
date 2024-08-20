<x-layout/>
<x-app-layout>
    <a href="{{route('chat.index')}}">
        <button type="submit" class="py-2.5 px-3.5 inline-flex items-center gap-x-2 bg-blue-500 text-sm font-weight-bold rounded-2xl border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 fixed bottom-4 right-4 z-50">
            Message
        </button>
    </a>
    <!--Creat Post-->
            <div class="max-w-lg mx-auto p-5 bg-white shadow-md rounded-xl">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" x-data="{ title: '', description: '', image: null, imagePreview: '' }">
                    @csrf

                    <!-- Title Field -->
                    <div class="mb-5">
                        <label for="title" class="block text-sm font-medium text-gray-700">Post Title</label>
                        <input type="text" id="title" name="title" x-model="title" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500" placeholder="Enter your post title" required>
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="mb-5">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" x-model="description" class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500" rows="4" placeholder="Enter your post description" required></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div class="mb-5">
                        <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
                        <input type="file" id="image" name="image" @change="handleImageUpload" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <!-- Image Preview -->
                        <template x-if="imagePreview">
                            <img :src="imagePreview" alt="Image Preview" class="mt-4 w-full object-cover rounded-lg">
                        </template>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-5">
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Create Post
                        </button>
                    </div>
                </form>
            </div>

            <script>
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
</x-app-layout>
<x-footer/>
