<x-layout>
    <div class="h-screen flex flex-col items-center justify-center bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px] px-3">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-3 pt-5">
            <div class="relative w-full flex">
                <div class="absolute flex justify-end w-full -mt-5">
                    @auth
                        <div class="absolute flex -mt-6 justify-center drop-shadow-lg z-0 rounded-full h-11 w-11 bg-white dark:bg-gray-800 shadow-2xl">
                            <x-post.favorite id="{{ $post->id }}"/>
                        </div>
                    @endauth
                </div>
            </div>
            <div class=" flex mb-2">
                <h2 class="text-2xl text-center font-extrabold text-purple-700 w-full">{{ $post->title }}</h2>
            </div>

            @if( $type == 'Job Offer')
                <div class="px-2 py-1 bg-purple-100 dark:bg-purple-600/20 border border-purple-400 dark:border-purple-600 rounded-lg">
                    <p class="text-sm text-gray-500 dark:text-gray-500 text-center">Company Info</p>
                    <div class="text-gray-700 dark:text-gray-300">
                        <p class="text-xl">{{ $post->user->company->name }}</p>
                        <p class="text-md">{{ $post->user->company->description }}</p>
                    </div>
                </div>
                <div class="inline-flex pt-2 space-x-2 justify-center w-full border-b-2 border-purple-700/50 pb-2">
                    <div class="text-xl text-gray-800 dark:text-gray-300 border-r border-purple-700/50 pr-2">
                        <h1>Work Day</h1>
                        <p>{{ $post->work_time }} hours/day</p>
                    </div>
                    <div class="text-xl text-gray-800 dark:text-gray-300">
                        @if( $post->salary > 0)
                            <h1>Salary</h1>
                            <p>${{ $post->salary }} per month</p>
                        @else
                            <p>Pay is decided upon negotiation</p>
                        @endif
                    </div>
                </div>
                <div class="text-center text-gray-700 dark:text-gray-300 border-b border-purple-700/50 py-2">
                    <p>{{ $post->user->company->email }}</p>
                </div>
            @elseif( $type == 'Job Seeker')
                <p class="text-sm text-gray-500 dark:text-gray-500 text-center">About Me</p>
                <div class="text-gray-700 dark:text-gray-300 border-b border-purple-700/50 pb-2">
                    <p class="text-base font-semibold text-center">{{ $post->user->bio ?? $post->description }}</p>
                </div>
                <div class="text-gray-700 dark:text-gray-300 border-b border-purple-700/50 py-2">
                    <div class="w-full justify-center text-base font-semibold inline-flex space-x-2 border-b border-purple-700/50 pb-2">
                        <div class="border-r border-purple-700/50 pr-2">
                            <p>Age: {{ $post->user->age }}</p>
                        </div>
                        <div>
                            <p>Hours per day: {{ $post->work_time }}</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="font-semibold text-xl">Skills</h1>
                        <p>{{ $post->skills }}</p>
                    </div>
                </div>
                <div class="text-center text-gray-700 dark:text-gray-300 border-b border-purple-700/50 py-2">
                    <p>{{ $post->user->email }}</p>
                </div>
            @endif
            <div class="pt-3">
                <div class="flex justify-start w-full">
                    <div class="z-20 h-8 w-8 bg-gray-50 dark:bg-gray-800 rounded-full">
                        <img src="{{ $post->user->photo_url }}" class="rounded-full object-cover h-full w-full shadow-md" />
                    </div>
                    <h1 class="text-gray-700 dark:text-gray-300 font-semibold self-center pl-2">{{ $post->user->username }}</h1>
                </div>
            </div>
        </div>
    </div>
</x-layout>
