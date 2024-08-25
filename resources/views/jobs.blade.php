<x-layout>
    <!-- Background -->
    <div class="min-h-screen bg-gradient-to-r from-blue-400 via-white to-blue-500 pt-20"> <!-- Added pt-20 for spacing -->
        <!-- Content -->
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-extrabold text-blue-700 text-center mb-12">Job Listings</h1>

            <div class="flex space-x-5 overflow-x-auto"> <!-- Used flexbox to arrange items horizontally -->
                @foreach ($jobs as $job)
                    <a href="/jobs/{{ $job['id'] }}" class="flex-shrink-0 w-80 px-6 py-8 border-2 border-blue-500 rounded-lg shadow-lg transform transition-transform hover:scale-105 hover:bg-blue-100 bg-white bg-opacity-90">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-lg font-bold text-blue-700">
                                {{ $job->user->name }}
                            </div>
                            <div class="text-sm font-semibold text-gray-600">
                                Posted: {{ $job->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="text-3xl font-bold text-blue-700 mb-2">
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
    </div>
</x-layout>
