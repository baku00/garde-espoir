<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\PostsLiked;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Storage;

class MyPostsController extends Controller
{
    public function index(Request $req)
    {
      return view('account.myposts',['posts'=>Post::where(['user_id'=>Auth::id()])->get()]);
    }

    public function save(Request $req)
    {
      $req->validate([
        'title'=>'max:255',
        'description'=>'max:255',
      ]);
      
      $picture = $req->file('picture');
      $picture_input = $req->input('picture_input');
      $post_id = $req->input('post_id');
      $title = $req->input('title');
      $description = $req->input('description');

      if(!empty($title) && $title !== null){
        Post::where(['id'=>$post_id,'user_id'=>Auth::id()])->update(['title'=>$title]);
      }

      if(!empty($description) && $description !== null){
        Post::where(['id'=>$post_id,'user_id'=>Auth::id()])->update(['description'=>$description]);
      }

      return redirect()->route('account.myposts');
    }

    public function remove(Request $req)
    {
      $req->validate([
        'post_id'=>'required'
      ]);

      $post_id = $req->input('post_id');

      $post = Post::where(['id'=>$post_id,'user_id'=>Auth::id()]);

      if($post->get()->first() !== null){
        Like::where(['post_id'=>$post_id])->delete();
        PostsLiked::where(['post_id'=>$post_id])->delete();
        Comment::where(['post_id'=>$post_id])->delete();
        $post->delete();
      }

      return redirect()->route('account.myposts');
    }
}
