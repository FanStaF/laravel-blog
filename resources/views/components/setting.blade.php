@props(['heading'])
<section class="px-6 py-8 max-w-4xl mx-auto">

    <h1 class="text-xl font-bold mb-8 pb-2 border-b border-gray-400">
        {{ $heading }}
    </h1>
    <div class="flex">

        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4 border-b border-gray-200">Links</h4>
            <ul>
                <li class="mb-2">
                    <a href="/admin/posts" class="{{ request()->routeIs('all-posts') ? 'text-blue-500' : '' }}">
                        All Posts
                    </a>
                <li class="mb-2">
                    <a href="/admin/posts/create" class="{{ request()->routeIs('create-post') ? 'text-blue-500' : '' }}">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 ml-8">
            <x-panel>

                {{ $slot }}

            </x-panel>
        </main>
    </div>
</section>
