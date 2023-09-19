<div {{ $attributes->merge(['class' => 'flex items-center text-sm']) }}>
    <img src="/images/lary-avatar.svg" alt="Lary avatar">
    <div class="ml-3">
        <h5 class="font-bold">
            <a href="/?author={{ $post->author->username }}"> {{ $post->author->name }} </a>
            @php
                $is_following = auth()
                    ->user()
                    ?->followed_authors->contains($post->user_id);
            @endphp
            <form method="POST" action="{{ route($is_following ? 'unfollow' : 'follow') }}">
                @csrf
                <button type="submit"
                    class="font-semibold text-xs text-white bg-blue-500 p-1 mt-2 border border-gray-600 rounded-xl"
                    <input type="hidden" name="author_id" value="{{ $post->author->id }}">
                    {{ $is_following ? 'Unfollow Author' : 'Follow Author' }}
                </button>
            </form>
        </h5>
    </div>
</div>
