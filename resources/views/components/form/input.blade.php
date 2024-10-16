@props([
    'size' => 'w-full ',
    'text_color' => 'text-gray-900 dark:text-gray-100'
])

<input {{ $attributes->merge(['class' => "bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block p-2.5 dark:bg-gray-700 dark:bg-opacity-60 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-violet-500 dark:focus:border-violet-500 " . $size . $text_color ]) }} />
