<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
  public function comment(Request $req,$post_id)
  {
    $req->validate([
      'content'=>'required|string',
    ]);

    $user_data = [
      'owner_id'=>Auth::id(),
      'post_id'=>$post_id,
      'content'=>$req->input('content'),
    ];

    Comment::create($user_data);

    return redirect('/#'.$post_id);
  }
}
