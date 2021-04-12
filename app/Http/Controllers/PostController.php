<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Auth;

class PostController extends Controller
{
    public function index(Request $req)
    {
      return view('post');
    }

    public function post(Request $req)
    {
      $req->validate([
        'picture'=>'required',
        'title'=>'required|string|max:20',
        'description'=>'required|string|max:255',
      ]);

      $file['file'] = $req->file('picture');
      $file['name'] = (hash('sha256',mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999))).'.'.$file['file']->getClientOriginalExtension();
      $file['content'] = $file['file']->getContent();

      $post_data = [
        'user_id'=>Auth::id(),
        'picture_url'=>'pictures/'.$file['name'],
        'title'=>$req->input('title'),
        'description'=>$req->input('description'),
      ];

      Storage::disk('public')->put($post_data['picture_url'],$file['content']);

      $post = Post::create($post_data);
      Like::create(['post_id'=>$post->id]);

      return redirect()->route('home');
    }
}
