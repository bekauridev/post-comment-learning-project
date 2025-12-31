@props([
    'label' => null,
    'type' => 'text',
    'name' => null,
    'id' => null,
    'placeholder' => null,
    'required' => false,
    'displayError' => true,
])

@php
    $inputId = $id ?? $name;
    $inputClasses = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-600 dark:focus:border-primary-600';
@endphp

@if ($label)
    <label for="{{ $inputId }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }}@if($required)&#xa0;<span class="text-red-500 ">*</span>@endif
    </label>
@endif

<input
    type="{{ $type }}"
    @if ($name) name="{{ $name }}" @endif
    @if ($inputId) id="{{ $inputId }}" @endif
    @if (!is_null($placeholder)) placeholder="{{ $placeholder }}" @endif
    @if ($required) required @endif
    {{ $attributes->merge(['class' => $inputClasses]) }}
>
@if ($displayError)
    @error($name)
        <div class="mt-2 text-sm text-red-600">
            {{ $message }}
        </div>
    @enderror
@endif