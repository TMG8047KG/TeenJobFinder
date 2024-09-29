<x-layout class="bg-white dark:bg-gray-900">
    <div class="h-screen bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="relative">
            <div class="sticky top-0 left-0 bg-white dark:bg-gray-800 w-full border-b border-purple-900 drop-shadow-lg">
                <div class="p-3 inline-flex">
                    <div class="rounded-full h-10 w-10">
                        < img src="{{ auth()->user()->photo_url }}">
                    </div>
                    <div class="text-gray-600 text-2xl font-semibold pl-3 self-center">
                        {{ auth()->user()->username }}
                    </div>
                </div>
            </div>
            <div class="pb-12 h-full bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
                <div class="h-full px-2 py-2 space-y-2">
                    @if( $notifications->count()<= 0)
                        <span class="text-gray-600 font-semibold text-xl">You don't have any notifications!</span>
                    @endif
                    @foreach($notifications as $notification)
                        <x-notification time="{{ $notification->created_at }}" >{{ $notification->text }}</x-notification>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
