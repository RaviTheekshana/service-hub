<x-dropdown class="relative">
    <x-slot name="trigger">
    <button @click="toggle()"
            class="ml-2 relative inline-block text-gray-700 focus:outline-none z-50">
        {{ config('app.languages')[app()->getLocale()] }}
    </button>
    </x-slot>
    <x-slot name="content">
        <ul class="py-1">
            @foreach(config('app.languages') as $key => $locale)
                <li>
                    <a href="{{ route('switch-language', ['language' => $key]) }}"
                       class="block px-4 py-2 text-gray-700 hover:bg-blue-100 hover:text-blue-700 transition-colors duration-150">
                        {{ $locale }}
                    </a>
                </li>
            @endforeach
        </ul>
    </x-slot>
</x-dropdown>
