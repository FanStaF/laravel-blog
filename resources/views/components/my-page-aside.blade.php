<aside class="w-48 flex-shrink-0">
    <h4 class="font-semibold mb-4 border-b border-gray-200">Links</h4>
    <ul>
        <li class="mb-2">
            <a href="{{ route('feed') }}" class="{{ request()->routeIs('feed') ? 'text-blue-500' : '' }}">
                Feed
            </a>
        <li class="mb-2">
            <a href="{{ route('bookmarks') }}" class="{{ request()->routeIs('bookmarks') ? 'text-blue-500' : '' }}">
                Bookmarks
            </a>
        </li>
    </ul>
</aside>
