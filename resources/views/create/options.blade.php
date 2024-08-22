<x-layout>
    <x-nav/>
    <div class="h-screen bg-white inset-0 w-full bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:16px_16px]">
        <div class="min-h-screen flex items-center justify-center w-full">
            <div class="bg-white shadow-md rounded-lg px-8 py-6 max-w-md">
                <div class="h-full flex justify-center items-center text-center">
                    <div class="px-2 font-semibold">
                        <a class="text-3xl mb-4 block">Create a post</a>
                        <div class="flex space-x-4">
                            <x-post.option option="company" class="btn btn-job-offer">
                                <span class="flex items-center justify-center text-gray-600 shadow-md px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                       <path class="cls-1" d="M15.28,14h0A5,5,0,0,0,16,11a3.16,3.16,0,0,0-3-3,3.16,3.16,0,0,0-3,3,5,5,0,0,0,.74,3h0c-.36.1-2.72,1.2-2.72,3a1,1,0,0,0,2,0c0-.28.89-.88,1.28-1l.11,0a2.3,2.3,0,0,0,1.1-.58,2.2,2.2,0,0,0,1,0,2.3,2.3,0,0,0,1.1.58l.07,0c.43.16,1.28.77,1.32,1.05a1,1,0,0,0,2,0C18,15.24,15.64,14.14,15.28,14ZM13,10a1.17,1.17,0,0,1,1,1,2.68,2.68,0,0,1-.71,2.29.39.39,0,0,1-.58,0A2.68,2.68,0,0,1,12,11,1.17,1.17,0,0,1,13,10Z"/><path class="cls-1" d="M28.21,26.79l-7.47-7.46a10,10,0,1,0-1.41,1.41l7.46,7.47a1,1,0,0,0,1.42,0A1,1,0,0,0,28.21,26.79ZM7.34,18.66A8,8,0,1,1,13,21,8,8,0,0,1,7.34,18.66Z"/>
                                    </svg>
                                    Job Offer
                                </span>
                            </x-post.option>
                            <x-post.option option="user" class="btn btn-job-seeker">
                                <span class="flex items-center justify-center text-gray-600 shadow-md px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200">
                                    Job Seek
                                 <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                     <path class="cls-1" d="M5.5 3V2.5C5.5 1.39543 6.39543 0.5 7.5 0.5C8.60457 0.5 9.5 1.39543 9.5 2.5V3M0.5 11.5H14.5M1.5 3.5H13.5C14.0523 3.5 14.5 3.94772 14.5 4.5V13.5C14.5 14.0523 14.0523 14.5 13.5 14.5H1.5C0.947716 14.5 0.5 14.0523 0.5 13.5V4.5C0.5 3.94772 0.947715 3.5 1.5 3.5Z" transform="scale(0.6) translate(14, 12)"/>
                                     <path class="cls-1" d="M28.21,26.79l-7.47-7.46a10,10,0,1,0-1.41,1.41l7.46,7.47a1,1,0,0,0,1.42,0A1,1,0,0,0,28.21,26.79ZM7.34,18.66A8,8,0,1,1,13,21,8,8,0,0,1,7.34,18.66Z" transform="scale(-1, 1) translate(-26, -1)"/>
                                 </svg>
                                </span>
                            </x-post.option>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
