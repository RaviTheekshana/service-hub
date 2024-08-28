<x-layout>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Our Service</h2>
            <p class="mt-1 text-gray-600">Stay in the know with insights from industry experts.</p>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card -->
            <a class="group flex flex-col focus:outline-none" href="#">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{asset('images/Electrician.jpg')}}" alt="Blog Image">
                    <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3">
          Sponsored
        </span>
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600">
                        Electrician
                    </h3>
                    <p class="mt-3 text-gray-800">
                        Ensure your home or business is safe and well-lit with our professional electrician services. Our licensed electricians are experts in installing, repairing, and maintaining electrical systems. Whether you need new wiring, lighting
                        installation, or troubleshooting of electrical issues, we provide reliable and efficient solutions. We prioritize safety and quality in every job, ensuring that your electrical systems operate smoothly and comply with all regulations. Trust us for all your electrical needs, from minor repairs to major installations.
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
                        Read more
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->

            <!-- Card -->
            <a class="group flex flex-col focus:outline-none" href="#">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{asset('images/Plumber.jpg')}}" alt="Blog Image">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600">
                       Plumber
                    </h3>
                    <p class="mt-3 text-gray-800">
                        Keep your plumbing systems running smoothly with our expert plumbing services. Our skilled plumbers are equipped to handle everything from routine maintenance to emergency repairs. Whether it's a leaking faucet, a clogged drain, or a major pipe installation, we offer fast and efficient service to ensure your water systems are functioning at their best. We use the latest tools and techniques to diagnose and resolve plumbing issues quickly, saving you time and money. Count on us for
                        and dependable plumbing services that you can trust.
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
                        Read more
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->
            <!-- Card -->
            <a class="group flex flex-col focus:outline-none" href="#">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{asset('images/gardener.jpg')}}" alt="">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600">
                        Gardener
                    </h3>
                    <p class="mt-3 text-gray-800">
                        Transform your outdoor space into a beautiful and thriving garden with our professional gardening services. Our experienced gardeners are passionate about creating and maintaining lush, green landscapes that enhance the beauty of your home or business. From lawn care and planting to pruning and landscape design, we offer a full range of gardening services tailored to your specific needs. Whether you're looking to maintain a healthy garden or create a new outdoor oasis, our team is here to bring your vision to life.
                        Enjoy a well-maintained garden all year round with our expert care.
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium">
                        Read more
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </p>
                </div>
            </a>
            <!-- End Card -->


        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Blog -->
</x-layout>
