@props(['field-name' => '', 'value' => ''])

<x-label for="{{ $fieldName }}" value="{{ $value }}" class="mt-3"></x-label>

<x-input {{ $attributes }}
         id="{{ $fieldName }}"
         class="block mt-1 w-full"
         name="{{ $fieldName }}"
         required></x-input>
