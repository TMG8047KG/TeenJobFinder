@props([
    'id',
    'title',
    'name',
    'work_time',
    'salary'
])

<div class="min-w-[200px] bg-white shadow-md rounded-xl p-4">
    <a href="{{ route('post.show', $id) }}">
        <div class=" relative flex justify-between overflow-hidden cursor-pointer w-full object-cover object-center rounded-lg shadow-md h-64" style="background-color: slategrey ">
            <div class="bg-violet-600 relative flex flex-row items-start h-full w-full ">
                <div class="p-5 rounded-lg w-full z-10">
                    <h4 class="mt-1 text-white text-xl font-semibold">{{ $title }}</h4>
                    <div class="mb-4">
                        <div class="text-lg font-bold">
                            {{ $name }}
                        </div>
                    </div>
                    <div class="text-sm text-violet-200">
                        <p><strong>Work-time:</strong></p>
                        <p>{{ $work_time }} hours/day</p>
                        <p><strong>Salary:</strong></p>
                        <p>${{ $salary }} per month</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

