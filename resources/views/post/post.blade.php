<x-layout class="bg-white dark:bg-gray-900">
    <div class="h-screen px-3 pb-12 bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="relative">
            <div class="sticky top-0 right-0">
                <div class="inline-flex justify-center py-2 space-x-2">
                    <div class="flex rounded-full h-9 w-9 bg-gray-300/50 dark:bg-gray-800/50 text-gray-600 justify-center">
                        <a href="/posts" class="flex items-center">
                            <svg class="h-8 w-8 text-gray-600 dark:text-gray-200 self-center" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"></path>
                            </svg>
                        </a>
                    </div>
                    @can('deletePost', $post)
                        <form method="post" action="/posts/{{ $post->id }}/delete">
                            @csrf
                            <div class="flex rounded-full h-9 w-9 bg-gray-300/50 dark:bg-gray-800/50 text-gray-600 justify-center items-center">
                                <button type="submit" class="flex justify-center">
                                    <svg class="w-6 h-6 text-gray-600 dark:text-gray-200" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    @endcan
                    @can('updatePost', $post)
                        <div class="flex rounded-full h-9 w-9 bg-gray-300/50 dark:bg-gray-800/50 text-gray-600 justify-center">
                            <a href="/posts/{{ $post->id }}/edit" class="flex items-center">
                                <svg class="h-6 w-6 text-gray-600 dark:text-gray-200" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.4998 5.49994L18.3282 8.32837M3 20.9997L3.04745 20.6675C3.21536 19.4922 3.29932 18.9045 3.49029 18.3558C3.65975 17.8689 3.89124 17.4059 4.17906 16.9783C4.50341 16.4963 4.92319 16.0765 5.76274 15.237L17.4107 3.58896C18.1918 2.80791 19.4581 2.80791 20.2392 3.58896C21.0202 4.37001 21.0202 5.63634 20.2392 6.41739L8.37744 18.2791C7.61579 19.0408 7.23497 19.4216 6.8012 19.7244C6.41618 19.9932 6.00093 20.2159 5.56398 20.3879C5.07171 20.5817 4.54375 20.6882 3.48793 20.9012L3 20.9997Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    @endcan

                </div>
            </div>
            <div class="h-full pb-16 bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
                <div class="h-full w-full max-w-md bg-white dark:bg-gray-800 shadow-2xl rounded-lg p-3 pt-5">
                    <div>
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
                                    <p class="text-xl font-bold">{{ $post->user->company->name }}</p>
                                    <p class="text-md">{{ $post->user->company->description }}</p>
                                </div>
                            </div>
                            <div class="inline-flex pt-2 space-x-2 justify-center w-full border-b-2 border-purple-700/50 pb-2">
                                <div class="text-xl text-gray-800 dark:text-gray-300 border-r border-purple-700/50 pr-2">
                                    <h1 class="font-bold">Work Day</h1>
                                    <p class="text-gray-400">{{ $post->work_time }} hours/day</p>
                                </div>
                                <div class="text-xl text-gray-800 dark:text-gray-300">
                                    @if( $post->salary > 0)
                                        <h1 class="font-bold">Salary</h1>
                                        <p class="text-gray-400">${{ $post->salary }} per month</p>
                                    @else
                                        <p>Pay is decided upon negotiation</p>
                                    @endif
                                </div>
                            </div>
                            <div class="py-2 text-base text-center text-gray-800 dark:text-gray-300 border-b-2 border-purple-700/50 pr-2">
                                <h1 class="text-xl font-semibold">Description</h1>
                                <p class="text-gray-400">{{ $post->description }}</p>
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
            </div>
        </div>
    </div>
</x-layout>
