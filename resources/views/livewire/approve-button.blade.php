<div>
    @auth()
        <div class="py-2">
            @if (session()->has('flash.banner'))
                <div class="bg-{{ session('flash.bannerStyle') }} text-white p-2 rounded">
                    {{ session('flash.banner') }}
                </div>
            @endif
        </div>
    <div class="mt-3 flex items-center">
        <button wire:click="toggleApprove" class="inline-flex items-center px-4 py-2 text-white rounded-full transition duration-300"
                @if($hasApproved)
                    style="background-color: #38a169;" {{-- Green background when approved --}}
                @else
                    style="background-color: #8a939a;" {{-- Gray background when not approved --}}
            @endif
        >
            <!-- SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>

            <!-- Button Text -->
            @if($hasApproved)
                <span>Interested</span>
            @else
                <span>Interest</span>
            @endif

            <!-- Approve Count -->
            <span class="ml-2">{{ $approveCount }}</span>
        </button>
    </div>
    @endauth
</div>
