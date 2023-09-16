@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="w-full text-sm border border-gray-300 rounded-xl p-2 focus:outline-none focus:border-gray-400"
        name="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }}>

    <x-form.error name="{{ $name }}" />
</x-form.field>
