<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $exerpt;
    public $date;
    public $slug;

    public $body;

    public function __construct($title, $exerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->exerpt = $exerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function all()
    {

        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("/posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn($document) => new Post(
                        $document->title,
                        $document->exerpt,
                        $document->date,
                        $document->slug,
                        $document->body()

                    )
                )
                ->sortByDesc('date');

        });
    }

    /**
     * Summary of find
     * @param mixed $slug
     * @return void
     */
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);

    }



}