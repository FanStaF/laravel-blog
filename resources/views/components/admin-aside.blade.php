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
