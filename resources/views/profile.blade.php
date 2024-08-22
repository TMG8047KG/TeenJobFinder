<x-layout>
    <div class="w-full h-screen bg-gray-100 px-10 pt-10">
        <div class="relative mt-16 mb-32 max-w-sm mx-auto mt-24">
            <div class="rounded overflow-hidden shadow-md bg-white">
                <div class="absolute -mt-20 w-full flex justify-center">
                    <div class="h-32 w-32">
                        <!-- Display uploaded profile picture or default if not available -->
                        <img
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://randomuser.me/api/portraits/women/49.jpg' }}"
                            class="rounded-full object-cover h-full w-full shadow-md"
                        />
                    </div>
                </div>
                <div class="px-6 mt-16">
                    <h1 class="font-bold text-3xl text-center mb-1">{{ $user->username }}</h1>
                    <p class="text-gray-800 text-sm text-center">{{ $user->email }}</p>
                    <p class="text-center text-gray-600 text-base pt-3 font-normal">
                        {{ $user->bio }}
                    </p>
                    <div class="w-full flex justify-center pt-5 pb-5">
                        <a href="{{ route('profile_edit') }}" class="mx-5">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit Profile</button>
                        </a>
                        <form method="POST" action="{{ route('profile.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
