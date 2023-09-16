@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea class="w-full text-sm border border-gray-300 rounded-xl p-2 focus:outline-none focus:border-gray-400"
        name="{{ $name }}" id="{{ $name }}" required {{ $attributes }}>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
