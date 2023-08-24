@extends ('layout')

@section('content')
    <?php foreach ($posts as $post) : ?>
    <article>

        <h1>
            <a href="/posts/{{ $post->slug }}">
                {{ $post->title }}
            </a>
        </h1>
        <p>
            Category: <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
        </p>
        <div>
            {{ $post->exerpt }}
        </div>

    </article>

    <?php endforeach; ?>
@endsection
