<x-layout>
    <div x-data="{ filters: false }" class="flex flex-col h-screen max-h-screen overflow-y-auto bg-gradient-to-r from-violet-600 dark:from-violet-900 via-violet-600 dark:via-violet-800 to-violet-500 dark:to-violet-700">

        <!-- Header Section -->
        <div class="px-3 pt-6 pb-3 rounded-lg flex items-center space-x-2 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white dark:text-gray-900" viewBox="-4 -1 20 20" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 3V2.5C5.5 1.39543 6.39543 0.5 7.5 0.5C8.60457 0.5 9.5 1.39543 9.5 2.5V3M0.5 11.5H14.5M1.5 3.5H13.5C14.0523 3.5 14.5 3.94772 14.5 4.5V13.5C14.5 14.0523 14.0523 14.5 13.5 14.5H1.5C0.947716 14.5 0.5 14.0523 0.5 13.5V4.5C0.5 3.94771 0.947715 3.5 1.5 3.5Z" />
            </svg>
            <h4 class="text-white dark:text-gray-900 text-2xl font-semibold leading-tight truncate">Find Your Job</h4>
        </div>

        <!-- Search and Filters -->
        <div class="flex items-center justify-between mt-3 px-3 z-10 space-x-2">
            <form action="{{ route('search') }}" method="GET" class="relative w-full">
                <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pr-3">
                    <svg class="h-5 w-5 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input name="query" type="text" class="bg-white dark:bg-gray-800 shadow-lg rounded-xl border-0 p-3 w-full text-gray-700 dark:text-gray-600 focus:ring-violet-700" placeholder="Search for a job...">
            </form>
        </div>

        <!-- Recent Jobs Section -->
        <div class="p-3 space-y-4 z-0">
            <h4 class="font-semibold text-white dark:text-gray-900 px-2">Recent Jobs</h4>
            <div class="flex-grow flex items-center justify-center">
                @if($posts->isEmpty())
                    <div class="w-full h-64 flex items-center justify-center shadow-lg bg-white dark:bg-gray-800 rounded-lg">
                        <div class="text-violet-600 dark:text-violet-700 font-semibold text-xl">
                            No recommended jobs yet
                        </div>
                    </div>
                @else
                    <div class="w-full flex overflow-x-auto space-x-4">
                        @foreach($posts as $post)
                            <x-recommended-job id="{{ $post->id }}" title="{{ $post->title }}" name="{{ $post->user->name }}" work_time="{{ $post->work_time }}" salary="{{ $post->salary }}"/>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- "For You" Section -->
        <h4 class="font-semibold text-white dark:text-gray-900 px-3">Recommended Jobs</h4>
        <div class="grid grid-cols-1 gap-4 px-3 pb-6">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-2xl p-4">
                <div class="flex flex-col justify-center w-full">
                    <h2 class="text-sm font-medium text-violet-600">Job Example</h2>
                    <p class="text-xs text-gray-500 mt-1">Job Description</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
