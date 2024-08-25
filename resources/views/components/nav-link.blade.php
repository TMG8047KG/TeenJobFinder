@props([
    'route'
])

@php
    $classes = Request::routeIs($route) ? 'text-blue-700' : 'text-gray-500 hover:text-gray-700'
@endphp

<li>
    <a href="{{ route($route) }}" class="block py-2 px-2 {{ $classes }}">{{ $slot }}</a>
</li>
