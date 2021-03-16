<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'likes';

    // protected $fillable = [
    //     'user_id',

    // ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'likeable');
    }

    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'likeable');
    }
}
