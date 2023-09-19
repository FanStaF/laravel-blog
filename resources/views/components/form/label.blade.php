@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="{{ $name }}">
    {{ str_replace('_', ' ', $name) }}

</label>
