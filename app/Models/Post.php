<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Comment;
use App\Models\PostsLiked;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
      'id',
      'user_id',
      'picture_url',
      'title',
      'description',
    ];

    public function getPictureUrlAttribute()
    {
      return '/storage/'.$this->attributes['picture_url'];
    }

    public function likes()
    {
      return $this->belongsTo(Like::class,'id','post_id');
    }

    public function comment()
    {
      return $this->hasMany(Comment::class,'post_id','id');
    }

    public function post_liked()
    {
      return $this->belongsTo(PostsLiked::class,'id','post_id','user_id','user_id');
    }
}
