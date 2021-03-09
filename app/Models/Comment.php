<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // public function __construct($comment, $user_id, $post_id)
    // {
    //     $this->comment = $comment;
    //     $this->user_id = $user_id;
    //     $this->post_id = $post_id;
    //  }

    protected $fillable = [
        'comment',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        $this->morphTo();
    }
}
