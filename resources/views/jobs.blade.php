<x-layout>
    <h1>

            <div class="space-y-4">
                @foreach ($jobs as $job)
                    <a href="/jobs/{{ $job['id'] }}" class = "block px-3 py-8 border border-gray-900 rounded-lg">
{{--                        <div>--}}
{{--                         {{ $job->employer->name }}--}}
{{--                        </div>--}}
                        <div>
                            <strong>{{  $job['title' ] }}</strong> <p><strong>Work-time</strong>: {{ $job['work-time'] }} a day</p> <p><strong>Salary:</strong>
                                ${{ $job['salary'] }} per month</p>
                        </div>
                    </a>
                @endforeach
            </div>


    </h1>
</x-layout>

