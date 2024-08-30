@props([
    'time'
])

<div class="rounded-xl p-[3px] bg-gradient-to-b from-purple-300 to-purple-500 dark:from-purple-800/20 dark:to-purple-900 text-base font-semibold text-gray-600">
    <div class="bg-white dark:bg-gray-800 py-2 px-3 rounded-lg">
        <p>
            {{ $slot }}
        </p>
        <div class="text-xs">
            {{ $time }}
        </div>
    </div>

</div>
