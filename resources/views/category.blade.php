<!doctype html>


<title>FanStaF Learns Laravel</title>
<link rel="stylesheet" href="/app.css">

<body>
    <article>
        <h1>
            <?= $post->title ?>
        </h1>

        <p>
            Category: <a href="#">{{ $post->category->name }}</a>
        </p>

        <div>
            <?= $post->body ?>
        </div>
    </article>

    <a href="/">Go Back</a>
</body>
