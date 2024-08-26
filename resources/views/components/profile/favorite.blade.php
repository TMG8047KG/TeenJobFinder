@props([
    'title',
    'description'
])

<div class="bg-violet-100 p-3 rounded-md shadow-md">
    <div class="text-md font-semibold text-violet-700">{{ $title }}</div>
    <div class="text-gray-600">{{ $description }}</div>
</div>
