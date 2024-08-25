<x-layout>
    <div class="w-full h-screen bg-gradient-to-r from-blue-400 via-white to-blue-500 flex items-center justify-center overflow-hidden">
        <div class="relative max-w-sm mx-auto">
            <div class="rounded-lg overflow-hidden shadow-lg bg-white">
                <div class="absolute -mt-16 w-full flex justify-center">
                    <div class="h-28 w-28">
                        <img src="{{ $user->photo_url }}" class="rounded-full object-cover h-full w-full shadow-md border-4 border-blue-500" />
                    </div>
                </div>
                <div class="px-5 mt-20">
                    <h1 class="font-extrabold text-3xl text-center mb-2 text-blue-700">{{ $user->username }}</h1>
                    <div class="text-gray-700 text-sm text-center">{{ $user->email }}</div>
                    <div class="text-center text-gray-600 text-sm pt-2">
                        {{ $user->bio }}
                    </div>
                    <div class="w-full flex justify-center pt-6 pb-4">
                        <a href="/profile/edit" class="mx-2">
                            <button class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition duration-200">Edit Profile</button>
                        </a>
                        <form method="POST" action="/profile/logout">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded-full hover:bg-red-600 transition duration-200">Logout</button>
                        </form>
                    </div>
                </div>

                <div class="mt-4">
                    <div x-data="{ tab: 'favorites' }" class="w-full">
                        <div class="flex justify-center border-b border-gray-200">
                            <button @click="tab = 'favorites'" :class="tab === 'favorites' ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.636 7.208L10 13.572l6.364-6.364a3 3 0 1 0-4.243-4.243L10 5.086l-2.121-2.12a3 3 0 0 0-4.243 4.242z" />
                                </svg>
                                <span class="block mt-1">Favorites</span>
                            </button>
                            <button @click="tab = 'jobs'" :class="tab === 'jobs' ? 'border-b-2 border-blue-500 text-blue-600' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.507 12.324a7 7 0 0 0 .065-8.56A7 7 0 0 0 2 4.393V2H1v3.5l.5.5H5V5H2.811a6.008 6.008 0 1 1-.135 5.77l-.887.462a7 7 0 0 0 11.718 1.092zm-3.361-.97l.708-.707L8 7.792V4H7v4l.146.354 3 3z" />
                                </svg>
                                <span class="block mt-1">Jobs</span>
                            </button>
                        </div>

                        <div class="p-4 h-40 overflow-y-auto">
                            <div x-show="tab === 'favorites'">
                                <div class="bg-blue-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-blue-700">Favorite Example 1</div>
                                    <div class="text-gray-600">Description of a liked item.</div>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-blue-700">Favorite Example 2</div>
                                    <div class="text-gray-600">Description of a liked item.</div>
                                </div>
                            </div>
                            <div x-show="tab === 'jobs'">
                                <div class="bg-blue-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-blue-700">Job Example 1</div>
                                    <div class="text-gray-600">Description of a job.</div>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-blue-700">Job Example 2</div>
                                    <div class="text-gray-600">Description of a job.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
