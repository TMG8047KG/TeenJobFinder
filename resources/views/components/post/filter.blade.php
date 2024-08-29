@props([
    'tag'
])

<div class="bg-violet-600 dark:bg-violet-700 hover:bg-violet-800 p-4 cursor-pointer rounded-md border border-violet-900 transition-colors duration-300">
    <form method="post" action="/posts">
        @csrf
        <input class="hidden" name="tag" value="{{ $tag }}">
        <button type="submit" class="w-full h-full text-lg font-semibold text-white">{{ $tag }}</button>
    </form>
</div>
