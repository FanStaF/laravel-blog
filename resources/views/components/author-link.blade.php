<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    <img src="{{ asset('storage/' . $post->author->avatar)}}" alt="User Avatar" class="max-h-20 mx-w-20 rounded-lg">
    <div class="ml-3 flex flex-col items-center">
        <h4 class="font-bold">
            <a href="/?author={{ $post->author->username }}"> {{ $post->author->name }} </a>
        </h4>
        @auth
            @php
                $is_following = auth()
                    ->user()
                    ?->followed_authors->contains($post->user_id);
                $is_bookmarked = auth()
                    ->user()
                    ?->bookmarks->contains($post->id)
            @endphp
            <form method="POST" action="{{ route($is_following ? 'unfollow' : 'follow') }}">
                @csrf
                <button type="submit"
                    class="font-semibold text-xs text-white bg-blue-500 p-1 mt-2 border border-gray-600 rounded-xl" <input
                    type="hidden" name="author_id" value="{{ $post->author->id }}">
                    {{ $is_following ? 'Unfollow Author' : 'Follow Author' }}
                </button>
            </form>
            <form method="POST" action="{{ route('bookmark') }}">
                @csrf
                <button type="submit"
                    class="font-semibold text-xs text-white bg-blue-500 p-1 mt-2 border border-gray-600 rounded-xl" <input
                    type="hidden" name="post_id" value="{{ $post->id }}">
                    {{ $is_bookmarked ? 'Remove Bookmark' : 'Bookmark' }}
            </form>
        @endauth
    </div>
</div>
