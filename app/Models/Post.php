<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
    // Alternative way to specify key for finding route (currently in web.php: "post:slug")
    // public function getRouteKey()
    // {
    //     return 'slug';
    // }
}

