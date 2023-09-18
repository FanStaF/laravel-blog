@props(['post'])

<span class="mt-2 block text-gray-400 text-xs">
    Published <time>{{ $post->published_at->diffForHumans() }}. </time>
    <br>This post has been viewed {{ $post->view_count }} times.
</span>
