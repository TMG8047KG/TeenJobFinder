<!-- resources/views/company/dashboard.blade.php -->

<x-layout>
    <div class="w-full h-screen bg-gradient-to-br from-purple-400 via-gray-100 to-purple-500 dark:from-violet-900 dark:via-gray-900 dark:to-violet-800 flex items-center justify-center overflow-hidden">
        <div class="relative w-full">
            <div class="relative mx-2">
                <div class="rounded-lg overflow-hidden shadow-lg bg-white dark:bg-gray-800">

                    <div class="absolute top-2 right-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 text-violet-600 dark:text-violet-700">
                            <path fill="currentColor" d="M14.293 2.293a1 1 0 0 1 1.414 0l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414-1.414L16.586 8H5a1 1 0 0 1 0-2h11.586l-2.293-2.293a1 1 0 0 1 0-1.414zm-4.586 10a1 1 0 0 1 0 1.414L7.414 16H19a1 1 0 1 1 0 2H7.414l2.293 2.293a1 1 0 0 1-1.414 1.414l-4-4a1 1 0 0 1 0-1.414l4-4a1 1 0 0 1 1.414 0z"/>
                        </svg>
                    </div>

                    <div class="absolute -mt-14 flex justify-center  w-full">
                        <div class="absolute rounded-full z-0 h-28 w-28 bg-purple-800 dark:bg-violet-700 blur"></div>
                    </div>
                    <div class="px-5 mt-20">
                        <h1 class="font-extrabold text-3xl text-center mb-2 text-violet-600 uppercase">{{ $user->$company->name }}</h1>
                        <div class="text-gray-700 dark:text-gray-400 text-sm text-center">{{ $company->email }}</div>
                        <div class="text-center text-gray-600 dark:text-gray-300 text-sm pt-2">
                            {{ $company->description }}
                        </div>
                        <div class="w-full flex justify-center pt-3 pb-2 space-x-2">
                            <a href="/profile/edit" class="flex-1">
                                <button class="bg-violet-600 dark:bg-violet-700 text-white px-5 py-2 rounded-lg hover:bg-violet-800 transition duration-200 flex items-center w-full justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 23 23" stroke-width="1" stroke="currentColor" class="h-4 w-4 mr-2">
                                        <path d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V13A1,1,0,0,0,5,12h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.59,2.71a1,1,0,0,0-1.42,0L6,8.29Z"/>
                                    </svg>
                                    Edit Profile
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
