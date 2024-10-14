<x-layout>
    <div class="w-full h-screen bg-gradient-to-br from-purple-400 via-gray-100 to-purple-500 dark:from-violet-900 dark:via-gray-900 dark:to-violet-800 flex items-center justify-center overflow-hidden">
        <div class="relative w-full">
            <div class="absolute top-5 left-7 flex items-center justify-center z-10">
                <a href="/footer">
                    <svg viewBox="0 0 32 32" fill="currentColor" class="h-8 w-8 text-violet-600 dark:text-violet-700">
                        <path d="M12,14a1.25,1.25,0,1,0,1.25,1.25A1.25,1.25,0,0,0,12,14Zm0-1.5a1,1,0,0,0,1-1v-3a1,1,0,0,0-2,0v3A1,1,0,0,0,12,12.5ZM12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Z"/>
                    </svg>
                </a>
            </div>
            <div class="relative mx-2">
                <div class="rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">
                    @cannot('createCompany')
                        <div class="absolute top-2 right-2" style="z-index: 1;">
                            <a href="/company/dashboard">
                                <button class="bg-transparent text-white hover:bg-violet-800 transition duration-200 px-5 py-2 rounded-lg flex items-center w-full justify-center" style="z-index: 1;">
                                    <svg id="navigate-icon" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-violet-600 dark:text-violet-700 cursor-pointer">
                                        <path fill="currentColor" d="M14.293 2.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L16.586 8H5a1 1 0 0 1 0-2h11.586l-2.293-2.293a1 1 0 0 1 0-1.414zm-4.586 10a1 1 0 0 1 0 1.414L7.414 16H19a1 1 0 1 1 0 2H7.414l2.293 2.293a1 1 0 0 1-1.414 1.414l-4-4a1 1 0 0 1 0-1.414l4-4a1 1 0 0 1 1.414 0z"/>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    @endcannot
                    <div class="absolute -mt-14 flex justify-center w-full">
                        <div class="z-20 h-28 w-28 bg-gray-50 dark:bg-gray-800 rounded-full">
                            <img src="{{ $user->photo_url }}" class="rounded-full object-cover h-full w-full shadow-md" />
                        </div>
                        <div class="absolute rounded-full z-0 h-28 w-28 bg-purple-800 dark:bg-violet-700 blur"></div>
                    </div>
                    <div class="px-5 mt-20">
                        <h1 class="font-extrabold text-3xl text-center mb-2 text-violet-600 uppercase">{{ $user->username }}</h1>
                        <div class="text-gray-700 dark:text-gray-400 text-sm text-center">{{ $user->email }}</div>
                        <div class="text-gray-700 dark:text-gray-400 text-sm text-center">{{ $user->age }} years old</div>
                        <div class="text-gray-700 dark:text-gray-400 text-sm text-center">{{ $user->location }}</div>
                        <div class="text-gray-700 dark:text-gray-400 text-sm text-center">{{ $user->phone }}</div>
                        <div class="text-center text-gray-600 dark:text-gray-300 text-sm pt-2">
                            {{ wordwrap($user->bio, 10, " ") }}
                        </div>
                        <div class="w-full flex justify-center pt-3 pb-2 space-x-2">
                            <a href="/profile/edit" class="flex-1">
                                <button class="bg-violet-600 dark:bg-violet-700 text-white px-5 py-2 rounded-lg hover:bg-violet-800 transition duration-200 flex items-center w-full justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 23 23" stroke-width="1" stroke="currentColor" class="h-4 w-4 mr-2">
                                        <path d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z"/>
                                    </svg>
                                    Edit Profile
                                </button>
                            </a>

                            <form method="POST" action="/profile/logout" class="flex-1">
                                @csrf
                                <button type="submit" class="bg-violet-600 dark:bg-violet-700 text-white px-5 py-2 rounded-lg hover:bg-violet-800 transition duration-200 flex items-center w-full justify-center">
                                    Logout
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="-1 -0 16 16" stroke-width="1" stroke="currentColor" class="h-4 w-4 ml-2">
                                        <path d="M1 1L8 1V2L2 2L2 13H8V14H1L1 1ZM10.8536 4.14645L14.1932 7.48614L10.8674 11.0891L10.1326 10.4109L12.358 8L4 8V7L12.2929 7L10.1464 4.85355L10.8536 4.14645Z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div x-data="{ tab: 'favorites' }" class="w-full font-semibold">
                            <div class="flex justify-center border-b border-gray-300 dark:border-gray-600 h-20">
                                <button @click="tab = 'favorites'" :class="tab === 'favorites' ? 'border-b-2 border-violet-500 text-violet-600' : 'text-gray-500 dark:text-gray-300'" class="w-full p-3 text-center focus:outline-none">
                                    <svg viewBox="0 0 24 24" fill="none" class="h-6 w-6 mx-auto">
                                        <g stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"></path>
                                        </g>
                                    </svg>
                                    <span class="block mt-1">Favorites</span>
                                </button>
                                <button @click="tab = 'jobs'" :class="tab === 'jobs' ? 'border-b-2 border-violet-500 text-violet-600' : 'text-gray-500 dark:text-gray-300'" class="w-full p-3 text-center focus:outline-none">
                                    <svg class="w-6 h-6 mx-auto" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <span class="block mt-1">Jobs</span>
                                </button>
                            </div>

                            <div class="px-2 py-3 h-40 overflow-y-auto">
                                <div x-show="tab === 'favorites'" x-cloak class="space-y-2">
                                    @if($favorites->isEmpty())
                                        <div class="text-center text-gray-500 dark:text-gray-400">
                                            There's nothing here... yet
                                        </div>
                                    @else
                                        @foreach($favorites as $post)
                                            <x-profile.favorite title="{{ $post->title }}" description="{{ $post->description }}"/>
                                        @endforeach
                                    @endif
                                </div>
                                <div x-show="tab === 'jobs'" x-cloak class="space-y-2">
                                    <div class="text-center text-gray-500 dark:text-gray-400">
                                        Coming soon!
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
