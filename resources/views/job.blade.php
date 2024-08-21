<x-layout>
    <h2 class="text-2xl pb-6">
        Current Job
    </h2>
    <h2 class="text-xl">

        <div class = text-blue-600><strong> {{$job['title']}} </strong></div>
        <p>
        <div class=" block px-3 py-6 border border-gray-900 rounded-lg">The employer :<strong>{{ $job->employer->name }}</strong></div>
        </p>
    </h2>
    <p>
        This job requires {{$job['work-time']}} work-hours!
    </p>
    <p>
        This job pays ${{$job ['salary']}} per month.
    </p>

</x-layout>

