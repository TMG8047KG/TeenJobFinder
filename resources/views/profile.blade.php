<x-layout>
    <div class="w-full h-screen bg-gray-100 flex items-center justify-center overflow-hidden">
        <div class="relative mt-23 mb-31 max-w-sm mx-auto">
            <div class="rounded overflow-hidden shadow-md bg-white">
                <div class="absolute -mt-16 w-full flex justify-center">
                    <div class="h-28 w-28">
                        <img src="{{ $user->photo_url }}" class="rounded-full object-cover h-full w-full shadow-md" />
                    </div>
                </div>
                <div class="px-5 mt-16">
                    <h1 class="font-bold text-2xl text-center mb-1">{{ $user->username }}</h1>
                    <div class="text-gray-800 text-sm text-center">{{ $user->email }}</div>
                    <div class="text-center text-gray-600 text-sm pt-2 font-normal">
                        {{ $user->bio }}
                    </div>
                    <div class="w-full flex justify-center pt-4 pb-4">
                        <a href="{{ route('profile_edit') }}" class="mx-2">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded">Edit Profile</button>
                        </a>
                        <form method="POST" action="{{ route('profile.logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                        </form>
                    </div>
                </div>

                <div class="flex flex-col mt-2">
                    <div x-data="{ tab: 'favorites' }" class="w-full">
                        <div class="flex justify-center border-b border-gray-200">
                            <button @click="tab = 'favorites'" :class="tab === 'favorites' ? 'border-b-2 border-blue-500' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3.636 7.208L10 13.572l6.364-6.364a3 3 0 1 0-4.243-4.243L10 5.086l-2.121-2.12a3 3 0 0 0-4.243 4.242zM9.293 1.55l.707.707.707-.707a5 5 0 1 1 7.071 7.071l-7.07 7.071a1 1 0 0 1-1.415 0l-7.071-7.07a5 5 0 1 1 7.07-7.071z" />
                                </svg>
                            </button>
                            <button @click="tab = 'jobs'" :class="tab === 'jobs' ? 'border-b-2 border-blue-500' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13.507 12.324a7 7 0 0 0 .065-8.56A7 7 0 0 0 2 4.393V2H1v3.5l.5.5H5V5H2.811a6.008 6.008 0 1 1-.135 5.77l-.887.462a7 7 0 0 0 11.718 1.092zm-3.361-.97l.708-.707L8 7.792V4H7v4l.146.354 3 3z" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-3 h-40 overflow-y-auto">
                            <div x-show="tab === 'favorites'">
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Favorite Example</div>
                                    <div class="text-gray-600">Here is something you liked</div>
                                </div>
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Favorite Example</div>
                                    <div class="text-gray-600">Here is something you liked</div>
                                </div>
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Favorite Example</div>
                                    <div class="text-gray-600">Here is something you liked</div>
                                </div>
                            </div>
                            <div x-show="tab === 'jobs'">
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Job Example</div>
                                    <div class="text-gray-600">Haha hey I worked here</div>
                                </div>
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Job Example</div>
                                    <div class="text-gray-600">Haha hey I worked here</div>
                                </div>
                                <div class="bg-gray-100 p-3 rounded-md shadow-md mb-3">
                                    <div class="text-md font-semibold text-gray-800">Job Example</div>
                                    <div class="text-gray-600">Haha hey I worked here</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
