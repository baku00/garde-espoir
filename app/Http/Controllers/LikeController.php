<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\PostsLiked;
use Auth;

class LikeController extends Controller
{
  public function like(Request $req,$post_id)
  {
    $where = [
      'user_id'=>Auth::id(),
      'post_id'=>$post_id
    ];

    $old_data = PostsLiked::where($where)->get()->first();

    if($old_data !== null && $old_data->liked){

      $likes = Like::where(['post_id'=>$post_id])->get()->first();

      Like::where(['post_id'=>$post_id])->update([
        'likes'=>($likes->likes-1),
      ]);

      PostsLiked::where($where)->update(['liked'=>0]);

      return redirect('/#'.$post_id);
    }

    $likes = Like::where(['post_id'=>$post_id])->get()->first();

    Like::where(['post_id'=>$post_id])->update([
      'likes'=>($likes->likes+1),
    ]);

    $update = [
      'liked'=>1,
      'disliked'=>0,
    ];


    if($old_data !== null && $old_data->disliked){
      Like::where(['post_id'=>$post_id])->update([
        'dislikes'=>($likes->dislikes-1)
      ]);
    }

    PostsLiked::updateOrCreate($where,$update);


    return redirect('/#'.$post_id);
  }

  public function dislike(Request $req, $post_id)
  {
    $where = [
      'user_id'=>Auth::id(),
      'post_id'=>$post_id
    ];

    $old_data = PostsLiked::where($where)->get()->first();

    if($old_data !== null && $old_data->disliked){

      $dislikes = Like::where(['post_id'=>$post_id])->get()->first();

      Like::where(['post_id'=>$post_id])->update([
        'dislikes'=>($dislikes->dislikes-1),
      ]);

      PostsLiked::where($where)->update(['disliked'=>0]);

      return redirect('/#'.$post_id);
    }

    $dislikes = Like::where(['post_id'=>$post_id])->get()->first();

    Like::where(['post_id'=>$post_id])->update([
      'dislikes'=>($dislikes->dislikes+1),
    ]);

    $update = [
      'liked'=>0,
      'disliked'=>1,
    ];


    if($old_data !== null && $old_data->liked){
      Like::where(['post_id'=>$post_id])->update([
        'likes'=>($dislikes->likes-1)
      ]);
    }

    PostsLiked::updateOrCreate($where,$update);

    return redirect('/#'.$post_id);
  }
}
