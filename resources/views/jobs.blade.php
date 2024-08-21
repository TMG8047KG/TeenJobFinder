<x-layout>
    <h1>

            <div class="space-y-8">
                @foreach ($jobs as $job)
                    <a  href="/jobs/{{ $job['id'] }}" class = " block px-3 py-6 border border-gray-900 rounded-lg text-2xl">
                        <div class="font-bold text-blue-500 pb-4">
                         {{ $job->employer->name }}
                        </div>
                        <div>
                            <strong>{{  $job['title' ] }}</strong> <p><strong>Work-time</strong>: {{ $job['work-time'] }} hours a day</p> <p><strong>Salary:</strong>
                                ${{ $job['salary'] }} per month</p>
                        </div>
                    </a>
                @endforeach
            </div>


    </h1>
</x-layout>

