<x-layout>
    <div class="w-full min-h-screen flex flex-col items-center justify-center bg-blue-50 p-4">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-5xl font-extrabold text-blue-700">
                    Current Job
                </h2>
                <x-post.favorite id="{{ $post->id }}"/>
            </div>

            <div class="px-4 py-4 bg-blue-100 border border-blue-300 rounded-lg mb-6">
                <div class="text-2xl text-gray-700">
                    <strong>Employer:</strong>
                    <strong class="text-center text-3xl font-semibold text-blue-700 mb-6">
                        {{ $post->title }}
                    </strong>
                </div>
            </div>


            <div class="text-xl text-gray-800 mb-4">
                <p><strong>Work Hours Required:</strong> {{ $post->work_time }} hours/day</p>
            </div>

            <div class="text-xl text-gray-800 mb-6">
                <p><strong>Salary:</strong> ${{ $post->salary }} per month</p>
            </div>
        </div>
    </div>
</x-layout>
