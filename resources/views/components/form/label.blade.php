@props([
    'margin' => 'mb-2'
])

<label {{ $attributes->merge(['class' => "block text-sm font-semibold font-medium text-gray-700 dark:text-gray-300 " .$margin]) }}>{{ $slot }}</label>
