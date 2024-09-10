<x-layout>
@include('components.guestvisibility')
    <x-banner/>
    @auth
    <!-- component -->
{{--    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">--}}
{{--    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">--}}

        <section class="pt-4 bg-blue-100" x-data="{
        email: '',
        phone: '',
        phoneTwo: '',
        validEmail: true,
        validPhone: true,
        validPhoneTwo: true,
        validateEmail() {
            const emailPattern = /^[^@]+@[^@]+\.[^@]+$/;
            this.validEmail = emailPattern.test(this.email);
        },
        validatePhone(field) {
            const phonePattern = /^\+94[0-9]{9}$/;
            if(field === 'phone') {
                this.validPhone = phonePattern.test(this.phone);
            } else {
                this.validPhoneTwo = phonePattern.test(this.phoneTwo);
            }
        }
    }">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-2xl bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-800 text-3xl font-bold">
                            {{_t('Booking Form')}}
                        </h6>
                        <button form="booking-form" class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" type="submit">
                            {{_t('Confirm')}}
                        </button>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form id="booking-form" action="{{ route('bookings.store') }}" method="POST" x-data="{
                        category : null
                    }">
                        @csrf
                        <h6 class="text-blueGray-400 text-lg mt-3 mb-6 font-bold uppercase">
                            {{_t('Booking Information')}}
                        </h6>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="service_date">
                                        {{_t('Service Date')}}
                                    </label>
                                    <input type="date" name="service_date" id="service_date" min="{{ \Carbon\Carbon::now()->toDateString() }}" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="service_time">
                                        {{_t('Service Time')}}
                                    </label>
                                    <select name="service_time" id="service_time" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                        <!-- Options for times between 8 AM and 4 PM -->
                                        @for ($hour = 8; $hour <= 16; $hour++)
                                            <option value="{{ sprintf('%02d:00', $hour) }}">
                                                {{ date('h:i A', strtotime(sprintf('%02d:00', $hour))) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="category_id">
                                        {{_t('Category')}}
                                    </label>
                                    <select id="category" x-model="category" name="category_id" id="category_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                        <option value="">Select</option>
                                        @foreach(get_categories() as $category)
                                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="service_provider_id">
                                        {{_t('Service Provider')}}
                                    </label>
                                    <select name="service_provider_id" id="service_provider_id" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                        <option value="">Select</option>
                                        @foreach(get_approved_service_providers() as $provider)
                                            <option value="{{ $provider->id }}" x-show="category == {{ $provider->category_id }}">{{ ucfirst($provider->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">

                        <h6 class="text-blueGray-400 text-lg mt-3 mb-6 font-bold uppercase">
                            {{_t('Contact Information')}}
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="address">
                                        {{_t('Address')}}
                                    </label>
                                    <input type="text" name="address" id="address" value="{{ old('address') }}" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="city">
                                        {{_t('City')}}
                                    </label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="phone">
                                        {{_t('Phone Number')}}
                                    </label>
                                    <input type="tel" name="phone" x-model="phone" @input="validatePhone('phone')" id="phone" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" maxlength="12" required>
                                    <template x-if="!validPhone">
                                        <p class="text-red-500 text-xs italic">Invalid phone number. Must be 10-12 digits.</p>
                                    </template>
                                </div>
                            </div>

                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="phone_two">
                                        {{_t('Phone Number 2')}}
                                    </label>
                                    <input type="tel" name="phone_two" x-model="phoneTwo" @input="validatePhone('phoneTwo')" id="phone_two" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" maxlength="12" required>
                                    <template x-if="!validPhoneTwo">
                                        <p class="text-red-500 text-xs italic">Invalid phone number. Must be 10-12 digits.</p>
                                    </template>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="email">
                                        {{_t('Email')}}
                                    </label>
                                    <input type="email" name="email" x-model="email" @input="validateEmail" id="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                    <template x-if="!validEmail">
                                        <p class="text-red-500 text-xs italic">Invalid email address format.</p>
                                    </template>
                                </div>
                            </div>
                            <div class="w-full lg:w-8/12 px-4">
                                <div class="bg-red-100 rounded">
                                    <h2 class="font-bold text-xl">{{_t('Instructions')}}</h2>
                                    <ul class="list-disc mt-1 list-inside">
                                        <li>All users must provide a valid email address and password to create an account.</li>
                                        <li>Users must not use offensive, vulgar, or otherwise inappropriate language in their username or profile information.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-3 border-b-1 border-blueGray-300">
                        <h6 class="text-blueGray-400 text-lg mt-3 mb-6 font-bold uppercase">
                            {{_t('About Service')}}
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-sm font-bold mb-2" for="description">
                                        {{_t('Service Description')}}
                                    </label>
                                    <textarea name="description" id="description" value="{{old('description')}}" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" rows="4" placeholder="Say Something about Your job" required></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endauth
</x-layout>
