<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
// use App\Models\Stats;

class HomeController extends Controller
{
    public function index(Request $req)
    {
      // for ($i=0; $i < 100; $i++) {
      //   $posts = Post::inRandomOrder()->get();
      //
      //   foreach ($posts as $key => $value) {
      //     Stats::create(['round'=>($i+1),'post_id'=>$value->id]);
      //   }
      // }

      // $rank = 1;
      //
      // // for ($i=0; $i < 3; $i++) {
      //   $stats = Stats::all();
      //
      //   foreach ($stats as $key => $value) {
      //     dump('Rank: ' . $rank . ' Post: ' . Stats::where(['id'=>$value->id])->get()->first()->post_id);
      //
      //     $rank++;
      //
      //     if($rank > 20){
      //       $rank = 1;
      //     }
      //   }
      // // }
      //
      // dd();

      return view('home',['posts'=>Post::inRandomOrder()->get()]);
    }
}
