<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <x-banner />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0 pb-4">
                <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data" class="flex items-center justify-between bg-white p-4 rounded-lg drop-shadow-lg">
                    @csrf
                    <div class="flex items-center space-x-4">
                        <label for="photo" class="font-medium text-xl text-gray-800">Upload Profile Photo:</label>
                    </div>
                    <input type="file" name="photo" id="photo" required class="border rounded-lg border-gray-300 pr-3 file:py-3 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-2xl hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Upload</button>
                </form>
            </div>
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-layout>

