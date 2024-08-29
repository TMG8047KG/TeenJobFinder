@php use App\Models\Post; @endphp
@props([
    'id',
    'photo',
    'name',
    'created',
    'title',
    'description',
    'time'
])

@php
    $tags = Post::findOrFail($id)->tags;
@endphp


<a href="/posts/{{ $id }}" class="block w-full p-4 border-2 border-violet-500 dark:border-violet-700 rounded-lg shadow-lg transform transition-transform hover:scale-105 hover:bg-violet-100 dark:hover:bg-violet-900 bg-white dark:bg-gray-800 bg-opacity-90">
    <div class="flex items-center justify-between mb-4">
        <div class="text-lg font-bold text-violet-700 inline-flex">
            <img class="h-8 w-8" src="{{ $photo }}">
            <p class="pl-2">{{ $name }}</p>
        </div>
        <div class="text-sm font-semibold text-gray-400 dark:text-gray-500">
            Posted: {{ $created }}
        </div>
    </div>
    <div class="inline-flex mb-2">
        @foreach( $tags as $tag )
            <div class="bg-green-50 hover:bg-green-100 dark:hover:shadow-green-700/20 dark:bg-green-500/10 dark:text-green-500 text-green-600 dark:border-green-500/10 border-green-100 pointer-events-none px-2 py-0.5 flex items-center text-xs font-medium rounded-md border">
                {{ $tag->tag }}
            </div>
        @endforeach
    </div>
    <div class="text-3xl font-bold text-violet-600 mb-2">
        {{ $title }}
    </div>
    <div class="text-xl text-gray-600 dark:text-gray-400">
        <span><strong>Work-time:</strong> {{ $time }} hours/day</span><br>
    </div>
</a>
