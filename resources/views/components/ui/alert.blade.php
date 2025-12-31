@props([
    'type' => 'info', // success | error | warning | info
    'title' => null,
    'timeout' => 5000,
    'messages' => [],
])
@php
    $variants = [
        'success' => [
            'border' => 'border-emerald-200 dark:border-emerald-900/50',
            'text' => 'text-emerald-900 dark:text-emerald-100',
            'badge' => 'bg-emerald-100 text-emerald-900 dark:bg-emerald-900/40 dark:text-emerald-100',
            'progress' => 'bg-emerald-500',
        ],
        'error' => [
            'border' => 'border-rose-200 dark:border-rose-900/50',
            'text' => 'text-rose-900 dark:text-rose-100',
            'badge' => 'bg-rose-100 text-rose-900 dark:bg-rose-900/40 dark:text-rose-100',
            'progress' => 'bg-rose-500',
        ],
        'warning' => [
            'border' => 'border-amber-200 dark:border-amber-900/50',
            'text' => 'text-amber-900 dark:text-amber-100',
            'badge' => 'bg-amber-100 text-amber-900 dark:bg-amber-900/40 dark:text-amber-100',
            'progress' => 'bg-amber-500',
        ],
        'info' => [
            'border' => 'border-sky-200 dark:border-sky-900/50',
            'text' => 'text-sky-900 dark:text-sky-100',
            'badge' => 'bg-sky-100 text-sky-900 dark:bg-sky-900/40 dark:text-sky-100',
            'progress' => 'bg-sky-500',
        ],
    ];

    $icons = [
        'success' => '<svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path></svg>',
        'warning' => '<svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"></path></svg>',
        'error' => '<svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"></path></svg>',
        'info' => '<svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"></path></svg>',
    ];

    $variant = $variants[$type] ?? $variants['info'];
    $baseClasses = 'js-alert relative overflow-hidden rounded-xl border bg-white/95 shadow-lg backdrop-blur transition duration-300 dark:bg-gray-900/95';
    $icon = $icons[$type] ?? $icons['info'];
@endphp

   
<div class=" fixed right-4 top-4 z-50 space-y-3">
	<div
		data-alert
			data-timeout="{{ $timeout }}"
		{{ $attributes->merge(['class' => $baseClasses . ' ' . $variant['border']]) }}
	>
		<div class="flex items-start gap-3 p-4 pr-10 pointer-events-none">
					<span class="inline-flex h-9 w-9 items-center justify-center rounded-full {{ $variant['badge'] }}">
			<span class="h-5 w-5">{!! $icon !!}</span>
					</span>

			<div class="min-w-0">
					@if ($title)
						<p class="text-sm font-semibold {{ $variant['text'] }}">{{ $title }}</p>
					@endif

					@foreach ($messages as $message)
						<div class="text-sm text-gray-700 dark:text-gray-200">
							{{ $message }}
						</div>
					@endforeach
			</div>
		</div>
		<button
			type="button"
			class="js-alert-close absolute right-3 top-3 inline-flex h-7 w-7 items-center justify-center rounded-md text-gray-500 hover:bg-gray-100 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white dark:focus:ring-gray-700"
			aria-label="Close alert"
		>
			<svg viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4" aria-hidden="true">
					<path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 1 0-1.06-1.06L10 8.94 6.28 5.22Z" />
			</svg>
		</button>

		<div class="js-alert-progress absolute pointer-events-none bottom-0 left-0 h-1 w-full {{ $variant['progress'] }}"></div>
	</div>
</div>