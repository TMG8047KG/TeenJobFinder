<x-layout>
    <x-nav/>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-extrabold text-blue-700 text-center mb-12">Job Listings</h1>

        <div class="space-y-8">
            @foreach ($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}" class="block px-6 py-8 border-2 border-blue-500 rounded-lg shadow-lg transform transition-transform hover:scale-105 hover:bg-blue-100">
                    <div class="flex items-center justify-between mb-4">
                        <div class="text-lg font-bold text-blue-700">
                            {{ $job->user->name }}
                        </div>
                        <div class="text-sm font-semibold text-gray-600">
                            Posted: {{ $job->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-3xl font-bold text-blue-800 mb-2">
                        {{ $job['title'] }}
                    </div>
                    <div class="text-xl text-gray-700">
                        <p><strong>Work-time:</strong> {{ $job['work-time'] }} hours/day</p>
                        <p><strong>Salary:</strong> ${{ $job['salary'] }} per month</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
