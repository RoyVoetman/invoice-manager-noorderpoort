@props(['field-name' => '', 'label' => '', 'options' => [], 'selected' => ''])

<x-label for="{{ $fieldName }}" value="{{ $label }}" class="mt-3"></x-label>

<select {{ $attributes }}
        name="{{ $fieldName }}"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
        id="{{ $fieldName }}"
        required>
    @foreach($options as $index => $option)
        <option value="{{ $index }}" {{ ($index == $selected ? 'selected' : '') }}>{{ $option }}</option>
    @endforeach
</select>
