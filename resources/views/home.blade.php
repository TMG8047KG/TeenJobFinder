<x-layout>
    <div x-data="{ filters: false }" @click.away="filters = false" class="flex flex-col h-screen max-h-screen overflow-y-auto">
        <div class="px-3 pt-6 pb-3 rounded-lg flex items-center space-x-2 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" viewBox="-4 -1 20 20" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 3V2.5C5.5 1.39543 6.39543 0.5 7.5 0.5C8.60457 0.5 9.5 1.39543 9.5 2.5V3M0.5 11.5H14.5M1.5 3.5H13.5C14.0523 3.5 14.5 3.94772 14.5 4.5V13.5C14.5 14.0523 14.0523 14.5 13.5 14.5H1.5C0.947716 14.5 0.5 14.0523 0.5 13.5V4.5C0.5 3.94772 0.947715 3.5 1.5 3.5Z" />
            </svg>
            <h4 class="text-black text-2xl font-semibold leading-tight truncate">Find your job</h4>
        </div>

        <div class="flex items-center justify-between mt-3 px-3 z-10 space-x-2">
            <div class="relative w-full">
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" class="bg-purple-white shadow rounded-xl border-0 p-3 w-full" placeholder="Search a job...">
            </div>
            <button class="bg-gray-500 text-white rounded-xl px-4 py-2 shadow-md hover:bg-gray-600 transition duration-200" @click="filters = ! filters" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.5 5.5A2.5 2.5 0 016 3h8a2.5 2.5 0 012.5 2.5v.607a1.5 1.5 0 01-.44 1.06l-4.56 4.557a1.5 1.5 0 00-.44 1.06V16.5a1.5 1.5 0 11-3 0v-3.716a1.5 1.5 0 00-.44-1.06l-4.56-4.557A1.5 1.5 0 013.5 6.107V5.5z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="p-3 space-y-4 z-0">
            <h4 class="font-semibold px-2">Recommended Jobs</h4>
            <div class="flex space-x-4 overflow-x-auto w-full shadow">
                <x-recommended-job>Job Example 1</x-recommended-job>
                <x-recommended-job>Job Example 2</x-recommended-job>
                <x-recommended-job>Job Example 3</x-recommended-job>
                <x-recommended-job>Job Example 4</x-recommended-job>
                <x-recommended-job>Job Example 5</x-recommended-job>
                <x-recommended-job>Job Example 6</x-recommended-job>
            </div>
        </div>

        <h4 class="font-semibold px-3">For you</h4>
        <div class="grid grid-cols-1 gap-4 px-3 pb-6">
            <div class="bg-white shadow-md rounded-2xl p-4">
                <div class="flex flex-col justify-center w-full">
                    <h2 class="text-sm font-medium text-gray-800">Job Example</h2>
                    <p class="text-xs text-gray-400 mt-1">Job Description</p>
                </div>
            </div>
        </div>

        <div x-show="filters" class="fixed inset-0 z-50 overflow-hidden hidden">
            <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                <div class="w-screen max-w-md">
                    <div class="h-full flex flex-col py-6 bg-white shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-xl font-semibold text-black">Filters</h2>
                            <button class="text-gray-500 hover:text-gray-700"
                                    onclick="document.getElementById('sidebar').classList.add('hidden');">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-4 px-4 h-full overflow-auto">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="bg-gray-50 hover:bg-gray-100 p-4 cursor-pointer rounded-md border border-gray-300 transition-colors duration-300">
                                    <h3 class="text-lg font-semibold text-black mb-2">Filter example</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
