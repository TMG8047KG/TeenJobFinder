<x-layout>
    <div class="w-full h-screen bg-gradient-to-br from-purple-400 via-gray-100 to-purple-500 flex items-center justify-center overflow-hidden">
        <div class="relative w-full">
            <div class="relative mx-2">
                <div class="rounded-lg overflow-hidden shadow-lg bg-white">
                    <div class="absolute -mt-14 flex justify-center w-full">
                        <div class="z-20 h-28 w-28 bg-gray-50 dark:bg-gray-800 rounded-full">
                            <img src="{{ $user->photo_url }}" class="rounded-full object-cover h-full w-full shadow-md" />
                        </div>
                        <div class="absolute rounded-full z-0 h-28 w-28 bg-pink-400 blur"></div>
                    </div>
                    <div class="px-5 mt-20">
                        <h1 class="font-extrabold text-3xl text-center mb-2 text-violet-700 uppercase">{{ $user->username }}</h1>
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
                        <div x-data="{ tab: 'favorites' }" class="w-full font-semibold">
                            <div class="flex justify-center border-b border-gray-200 h-20 ">
                                <button @click="tab = 'favorites'" :class="tab === 'favorites' ? 'border-b-2 border-violet-500 text-violet-600' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                    <svg viewBox="0 0 24 24" fill="none" class="h-6 w-6 mx-auto">
                                        <g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"></path>
                                        </g>
                                    </svg>
                                    <span class="block mt-1">Favorites</span>
                                </button>
                                <button @click="tab = 'jobs'" :class="tab === 'jobs' ? 'border-b-2 border-violet-500 text-violet-600' : 'text-gray-500'" class="w-full p-3 text-center focus:outline-none">
                                    <svg class="w-6 h-6 mx-auto" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <span class="block mt-1">Jobs</span>
                                </button>
                            </div>

                            <div class="px-2 py-3 h-auto overflow-y-auto">
                                <div x-show="tab === 'favorites'" class="space-y-2">
                                    <div class="bg-blue-100 p-3 rounded-md shadow-md">
                                        <div class="text-md font-semibold text-blue-700">Favorite Example 1</div>
                                        <div class="text-gray-600">Description of a liked item.</div>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded-md shadow-md">
                                        <div class="text-md font-semibold text-blue-700">Favorite Example 2</div>
                                        <div class="text-gray-600">Description of a liked item.</div>
                                    </div>
                                </div>
                                <div x-show="tab === 'jobs'" class="space-y-2">
                                    <div class="bg-blue-100 p-3 rounded-md shadow-md">
                                        <div class="text-md font-semibold text-blue-700">Job Example 1</div>
                                        <div class="text-gray-600">Description of a job.</div>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded-md shadow-md">
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
    </div>
</x-layout>
