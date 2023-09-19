<x-layout>
    <x-sidebar heading="Edit: {{ $post->title }}">

        <x-slot name="sidebar"><x-admin-aside /></x-slot>

        <x-form.post :post=$post method="PATCH" />

      </x-setting>
</x-layout>
