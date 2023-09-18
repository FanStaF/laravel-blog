<?=
'<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL ?>
<rss version="2.0">
    <channel>
        <title>
            <![CDATA[ fanstaf.com ]]>
        </title>
        <link>
        <![CDATA[ http://127.0.0.1:8000/feed ]]>
        </link>
        <description>
            <![CDATA[ FanStaF Learns Laravel! ]]>
        </description>
        <language>en</language>
        <pubDate>{{ now()->toRssString() }}</pubDate>

        @foreach ($posts as $post)
            <item>
                <title>{{ $post->title }}</title>
                <link>{{ $post->slug }}</link>
                <description>
                    <![CDATA[{!! $post->body !!}]]>
                </description>
                <category>{{ $post->category }}</category>
                <author>$post->author</author>
                <guid>{{ $post->id }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
            </item>
        @endforeach
    </channel>
</rss>
