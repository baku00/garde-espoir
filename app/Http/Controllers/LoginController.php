<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class LoginController extends Controller
{

  public function index(Request $req)
  {
    return view('login');
  }

  public function connect(Request $req)
  {
    $req->validate([
      'email'=>'required|email:rfc,dns',
      'password'=>'required',
    ]);

    $user_datas = [
      'email'=>$req->input('email'),
      'password'=>$req->input('password'),
    ];

    if(User::where(['email'=>$user_datas['email']])->get()->first() === null){
      User::create([
        'uuid'=>hash('sha256',mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999).mt_rand(100000,999999)),
        'email'=>$user_datas['email'],
        'password'=>Hash::make($user_datas['password']),
      ]);
    }

    if(Auth::attempt($user_datas)){
      return redirect()->route('home');
    }

    return back();
  }

  public function logout(Request $req)
  {
    $req->session()->remove('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
    return redirect()->route('home');
  }
}
