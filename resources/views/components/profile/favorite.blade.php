@props([
    'title',
    'description'
])

<div class="bg-violet-600 dark:bg-violet-700 p-3 rounded-md shadow-md">
    <div class="text-md font-semibold text-white">{{ $title }}</div>
    <div class="text-violet-300">{{ $description }}</div>
</div>
