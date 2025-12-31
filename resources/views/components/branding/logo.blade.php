@props([
    'size' => 'small',           // small | medium | large
    'layout' => 'image',         // image | text | full
    'href' => '#',
    'src' => null,               // allow override
    'label' => 'BEKAURI',
])

@php
    $sizeMap = [
        'small'  => ['text' => 'text-lg',  'img' => 'w-8 h-8'],
        'medium' => ['text' => 'text-xl',  'img' => 'w-10 h-10'],
        'large'  => ['text' => 'text-2xl', 'img' => 'w-11 h-11'],
    ];

    $sizeClasses = $sizeMap[$size] ?? $sizeMap['small'];

    $showImage = in_array($layout, ['image', 'full'], true);
    $showText  = in_array($layout, ['text', 'full'], true);

    $logoSrc = $src ?? 'data:image/webp;base64,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';
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'flex items-center font-semibold text-gray-900 dark:text-white'
    ]) }}
>
    @if ($showImage && filled($logoSrc))
        <img
            class="{{ $sizeClasses['img'] }} mr-2 rounded-full"
            src="{{ $logoSrc }}"
            alt="brand-logo"
        >
    @endif

    @if ($showText)
        <span class="{{ $sizeClasses['text'] }}">{{ $label }}</span>
    @endif
</a>
