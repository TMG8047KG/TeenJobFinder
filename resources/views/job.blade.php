<x-layout>
    <div class="w-full min-h-screen flex flex-col items-center justify-center bg-blue-50 p-4">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-5xl font-extrabold text-blue-700">
                    Current Job
                </h2>
                <div x-data="{ saved: false }" @click="saved = !saved" class="cursor-pointer ml-4">
                    <svg :class="{'text-blue-700': !saved, 'text-blue-700': saved}" class="w-8 h-8 hover:text-blue-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 56 56" stroke="currentColor" stroke-width="2">
                        <path :class="{'fill-current': saved}" stroke-linecap="round" stroke-linejoin="round" d="M30.051 45.6071L17.851 54.7401C17.2728 55.1729 16.5856 55.4363 15.8662 55.5008C15.1468 55.5652 14.4237 55.4282 13.7778 55.1049C13.1319 54.7817 12.5887 54.2851 12.209 53.6707C11.8293 53.0563 11.6281 52.3483 11.628 51.626V15.306C11.628 13.2423 12.4477 11.2631 13.9069 9.8037C15.3661 8.34432 17.3452 7.52431 19.409 7.52405H45.35C47.4137 7.52431 49.3929 8.34432 50.8521 9.8037C52.3112 11.2631 53.131 13.2423 53.131 15.306V51.625C53.1309 52.3473 52.9297 53.0553 52.55 53.6697C52.1703 54.2841 51.6271 54.7807 50.9812 55.1039C50.3353 55.4272 49.6122 55.5642 48.8928 55.4998C48.1734 55.4353 47.4862 55.1719 46.908 54.739L34.715 45.6071C34.0419 45.1031 33.2238 44.8308 32.383 44.8308C31.5422 44.8308 30.724 45.1031 30.051 45.6071V45.6071Z"/>
                    </svg>
                </div>
            </div>

            <div class="px-4 py-4 bg-blue-100 border border-blue-300 rounded-lg mb-6">
                <div class="text-2xl text-gray-700">
                    <strong>Employer:</strong>
                    <strong class="text-center text-3xl font-semibold text-blue-700 mb-6">
                        {{ $job['title'] }}
                    </strong>
                </div>
            </div>


            <div class="text-xl text-gray-800 mb-4">
                <p><strong>Work Hours Required:</strong> {{ $job['work-time'] }} hours/day</p>
            </div>

            <div class="text-xl text-gray-800 mb-6">
                <p><strong>Salary:</strong> ${{ $job['salary'] }} per month</p>
            </div>
        </div>
    </div>
</x-layout>
