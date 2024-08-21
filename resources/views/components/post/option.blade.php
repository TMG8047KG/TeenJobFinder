@props([
    'option'
])

<a href="/post/create/{{ $option }}">
    {{ $slot }}
</a>
