@props([
    'type' => 'submit',
    'variant' => 'primary',
    'full' => true,
])

@php
    $variants = [
        'primary' => 'text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800',
    ];
    $baseClasses = 'font-medium rounded-lg text-sm px-5 py-2.5 text-center';
    $widthClass = $full ? 'w-full' : '';
    $buttonClasses = trim($baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . $widthClass);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $buttonClasses]) }}>
    {{ $slot }}
</button>
