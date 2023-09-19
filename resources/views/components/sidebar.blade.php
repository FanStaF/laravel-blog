@props(['heading'])
<section class="px-6 py-8 max-w-5xl mx-auto">

    <h1 class="text-xl font-bold mb-8 pb-2 border-b border-gray-400">
        {{ $heading }}
    </h1>
    <div class="flex">

        {{ $sidebar }}

        <main class="flex-1 ml-8">
            <x-panel>

                {{ $slot }}

            </x-panel>
        </main>
    </div>
</section>
