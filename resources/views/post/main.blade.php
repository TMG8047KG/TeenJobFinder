<x-layout class="bg-white dark:bg-gray-900">
    <div class="h-screen bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]" x-data="{ activeTab: 'jobs', filters: false }">
        <!-- Listings Bar -->
        <div class="relative">
            <div class="sticky top-0 z-10">
                <div class=" bg-violet-600 text-white py-2">
                    <div class="container mx-auto px-4 flex justify-center items-center">
                        <h1 class="text-2xl font-extrabold">Listings</h1>
                        <!-- Filter Button -->
                        <button class="absolute right-4 bg-violet-700 text-white rounded-xl px-4 py-2 shadow-md hover:bg-violet-600 transition duration-200" @click="filters = !filters">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.5 5.5A2.5 2.5 0 016 3h8a2.5 2.5 0 012.5 2.5v.607a1.5 1.5 0 01-.44 1.06l-4.56 4.557a1.5 1.5 0 00-.44 1.06V16.5a1.5 1.5 0 11-3 0v-3.716a1.5 1.5 0 00-.44-1.06l-4.56-4.557A1.5 1.5 0 013.5 6.107V5.5z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-md py-2">
                    <div class="container mx-auto px-4">
                        <div class="flex justify-center space-x-10 relative">
                            <!-- Jobs Tab -->
                            <button @click="activeTab = 'jobs'" :class="activeTab === 'jobs' ? 'text-violet-600 border-b-4 border-violet-600' : 'text-gray-600 dark:text-gray-400'" class="text-lg font-semibold focus:outline-none transition-colors duration-300">
                                Jobs
                            </button>
                            <!-- Seeks Tab -->
                            <button @click="activeTab = 'seeks'" :class="activeTab === 'seeks' ? 'text-violet-600 border-b-4 border-violet-600' : 'text-gray-600 dark:text-gray-400'" class="text-lg font-semibold focus:outline-none transition-colors duration-300">
                                Seeks
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-full pb-12 bg-white dark:bg-gray-900 inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] dark:bg-[radial-gradient(#3a3b3d_1px,transparent_1px)] [background-size:16px_16px]">
                <div class="h-full p-4">
                    <!-- Jobs Content -->
                    <div x-show="activeTab === 'jobs'" x-cloak class="max-h-screen overflow-y-auto space-y-4">
                        @if($jobs->count() <= 0)
                            <span class="text-xl text-gray-700 dark:text-gray-400">Nothing to see here... yet</span>
                        @endif
                        @foreach($jobs as $job)
                            <x-post.job
                                id="{{ $job->id }}"
                                name="{{ $job->user->username }}"
                                photo="{{ $job->user->photo_url }}"
                                created="{{ $job->created_at->diffForHumans() }}"
                                title="{{ $job->title }}"
                                description="{{ $job->description }}"
                                time="{{ $job->work_time }}"/>
                        @endforeach
                    </div>
                    <!-- Seeks Content -->
                    <div x-show="activeTab === 'seeks'" x-cloak class="max-h-screen overflow-y-auto space-y-5">
                        @if($seekers->count() <= 0)
                            <span class="text-xl text-gray-700 dark:text-gray-400">Nothing to see here... yet</span>
                        @endif
                        @foreach($seekers as $seeker)
                            <x-post.seek
                                id="{{ $seeker->id }}"
                                name="{{ $seeker->user->username }}"
                                photo="{{ $seeker->user->photo_url }}"
                                created="{{ $seeker->created_at->diffForHumans() }}"
                                title="{{ $seeker->title }}"
                                description="{{ $seeker->description }}"
                                age="{{ $seeker->user->age }}"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Sidebar -->
        <div x-show="filters" x-cloak class="fixed inset-0 z-50 overflow-hidden">
            <div class="absolute inset-0 bg-violet-800 bg-opacity-60 transition-opacity"></div>

            <section class="absolute inset-y-0 right-0 pl-10 max-w-full flex">
                <div class="w-screen max-w-md" @click.away="filters = false">
                    <div class="h-full flex flex-col py-6 bg-white dark:bg-gray-800 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-xl font-semibold text-violet-600">Filters</h2>
                            <button class="text-gray-600 hover:text-gray-700" @click="filters = !filters">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-4 px-4 h-full overflow-auto">
                            <div x-show="activeTab === 'jobs'" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach( $tags as $tag)
                                    <x-post.filter tag="{{ $tag->tag }}" />
                                @endforeach
                            </div>
                            <div x-show="activeTab === 'seeks'" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <h1 class="text-gray-600 text-lg">There are no filters for this section</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout>
