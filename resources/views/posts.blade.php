<!doctype html>


<title>FanStaF Learns Laravel</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach ($posts as $post) : ?>
    <article>

        <h1>
            <a href="posts/<?= $post->slug ?>">
                <?= $post->title; ?>
            </a>
        </h1>

        <div>
            <?= $post->exerpt; ?>
        </div>

    </article>

    <?php endforeach; ?>

</body>