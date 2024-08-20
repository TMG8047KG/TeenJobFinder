<x-layout>
    <x-nav/>

    <div class="px-3 rounded-lg  flex flex-col w-full">
        <h4 class="text-black text-xl font-semibold  leading-tight truncate">Find your job</h4>
    </div>
    <div class="flex items-center justify-between mt-3 px-3 z-10">
        <div class="relative w-full">
            <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pr-3">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" class="bg-purple-white shadow rounded-xl border-0 p-3 w-full" placeholder="Search a job...">

        </div>
    </div>
    <div class=" p-3 space-y-4 z-0">
        <h4 class="font-semibold">Recommended Jobs</h4>
        <div class="grid grid-cols-2 space-x-4 overflow-y-scroll justify-center items-center w-full ">
            <x-recommended-job>Job Example 1</x-recommended-job>
            <x-recommended-job>Job Example 2</x-recommended-job>
        </div>
    </div>
        <h4 class="font-semibold">For you</h4>
        <div class="grid grid-cols-1">
            <div class="">
                <div class="flex  bg-white shadow-md  rounded-2xl p-2">
                    <div class="flex flex-col justify-center w-full px-2 py-1">
                        <div class="flex justify-between items-center ">
                            <div class="flex flex-col">
                                <h2 class="text-sm font-medium">Job Example</h2>
                            </div>
                        </div>
                        <div class="flex pt-2  text-sm text-gray-400">
                            <div class="flex items-center mr-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
