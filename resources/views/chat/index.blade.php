<x-layout/>
    @include('components.guestvisibility')
<div x-data="" class="lg:pt-28">
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
{{--    <div x-data="" class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">--}}
{{--        <form action="{{ route('chat.store') }}" method="post">--}}
{{--            @csrf--}}
{{--                @foreach($service_providers as $provider)--}}
{{--                        <button type="submit" value="{{ $provider->id }}" name="user_id" class="w-full px-4 py-2 font-medium text-left rtl:text-right text-white bg-blue-700 border-b border-gray-200 rounded-t-lg cursor-pointer focus:outline-none dark:bg-gray-800 dark:border-gray-600">--}}
{{--                            Start chat with {{ $provider->name }}--}}
{{--                        </button>--}}
{{--                @endforeach--}}
{{--        </form>--}}
{{--    </div>--}}
<x-footer/>


