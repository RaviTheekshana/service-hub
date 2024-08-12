<x-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('images/logo2.jpg')}}" width="135px" alt="ServiceHub" class="pt-10 mb-0">
        </x-slot>

        <x-validation-errors class="mb-3" />

        <form method="POST" action="{{ route('register') }}" x-data="{
            role: '{{ old('role', 'user') }}',
            category: '{{ old('category_id', '') }}',}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div class="mt-4">
                <x-label for="role" value="{{ __('Role') }}" />
                <select id="role" x-model="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <option value="user">Customer</option>
                    <option value="service_provider">Service Provider</option>
                </select>
            </div>
            <div class="mt-4" x-show="role === 'service_provider'">
                <x-label for="category" value="{{ __('Category') }}" />

                <select id="category" x-model="category" name="category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="">Select</option>
                    @foreach(get_categories() as $category)
                        <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>
             <div class="mt-4">
                <x-label for="phone" value="{{ __('Phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" maxlength="12" />

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
             </div>
        </form>
    </x-authentication-card>
</x-layout>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6 mt-5">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 ServiceHub. All rights reserved.</p>
            <p>Contact us: info@servicehub.com | +94123456789</p>
        </div>
    </footer>
