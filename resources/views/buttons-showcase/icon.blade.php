// resources/views/components/Icon.blade.php

@props(['name'])

@php
$iconPath = match ($name) {
'search' => '
<path d="M10 4a6 6 0 100 12 6 6 0 000-12zm-1.78 6.22a4.94 4.94 0 111.56-1.56l3.36 3.36a1 1 0 01-1.41 1.41l-3.36-3.36z" />',
// Add other icons as needed
default => '',
};
@endphp

<svg {{ $attributes->merge(['class' => 'inline-block w-6 h-6']) }} fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    {!! $iconPath !!}
</svg>