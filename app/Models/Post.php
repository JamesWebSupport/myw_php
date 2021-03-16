<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\PseudoTypes\True_;

class Post extends Model
{
    use HasFactory;

    protected   $table = 'posts';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'content',
        'subject_id',
        'user_id',
    ];

    // Post <= morph one to many => Comment
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Post <= many to one => User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Post <= many to one => Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Post <= morpy many to many => Tag
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // Post <= morpy many to many => Like
    public function likes()
    {

        return $this->morphToMany(Like::class, 'likeable');
    }

    // follow
    public function getIsLiked()
    {
        $liked = $this->likes()
            ->where('user_id', auth()->user()->id)
            ->first();
            
        return ($liked) ? true : false;
    }
}
