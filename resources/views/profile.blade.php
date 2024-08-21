<x-layout>

    <div class="bg-gray-500 h-screen">
        <div class="h-full">
            <div class="text-center font-semibold text-2xl py-3">
                <p>Dashboard</p>
                <form method="post" action="/profile/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
            <div>
                <p>Posts</p>
                <div>
{{--                    @foreach($posts as $value)--}}
{{--                        <x-post>{{ $value }}</x-post>--}}
{{--                    @endforeach--}}
                </div>
            </div>
        </div>
    </div>
</x-layout>
