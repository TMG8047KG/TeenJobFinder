@props([
    'id',
    'photo',
    'name',
    'created',
    'title',
    'description',
    'age'
])


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
    <div class="">
        <div class="text-center text-3xl font-bold text-violet-600 mb-2">
            {{ $title }}
        </div>
        <div class="text-sm font-bold text-gray-300 mb-2 indent-2 line-clamp-2">
            {{ $description }}
        </div>
        <div class="text-xl text-gray-600 dark:text-gray-400">
            <span><strong>Age:</strong> {{ $age }}</span><br>
        </div>
    </div>
</a>
