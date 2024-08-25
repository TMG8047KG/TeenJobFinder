<x-layout>
    <div class="w-full min-h-screen flex flex-col items-center justify-center bg-blue-50 p-4">
        <div class="w-full max-w-md bg-white shadow-2xl rounded-lg p-6">
            <h2 class="text-5xl font-extrabold text-blue-700 mb-6 text-center">
                Current Job
            </h2>
            <div class="px-4 py-4 bg-blue-100 border border-blue-300 rounded-lg mb-6">
                <div class="text-2xl text-gray-700">
                    <strong>Employer:</strong> <strong class="text-center text-3xl font-semibold text-blue-700 mb-6">{{ $job['title'] }}</strong>
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
