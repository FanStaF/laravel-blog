<x-layout>
    <x-setting heading="Edit: {{ $post->title }}">
        <x-form.post :post=$post method="PATCH" />

      </x-setting>
</x-layout>
