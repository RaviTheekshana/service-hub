<x-layout>
    @include('components.guestvisibility')
<div x-data="" class="pt-8 lg:pt-8 min-h-screen">
    <form action="{{ route('chat.store') }}" method="post" class="py-2">
        <h1 class="text-2xl font-bold text-center mb-4">Select a Service Provider</h1>
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($service_providers as $provider)
                <button type="submit" value="{{ $provider->id }}" name="user_id" class="flex items-center justify-center font-semibold text-2xl hover:bg-blue-300 rounded-xl p-4 shadow-md">
                    {{ $provider->name }}
                </button>
            @endforeach
        </div>
    </form>
</div>
</x-layout>


