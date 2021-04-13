<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class LoginInformationsController extends Controller
{
    public function index(Request $req)
    {
      return view('account.login-informations');
    }

    public function email(Request $req)
    {
      $req->validate([
        'new_email'=>'required|email:rfc,dns',
      ]);

      User::where(['id'=>Auth::id()])->update(['email'=>$req->input('new_email')]);

      return back();
    }

    public function password(Request $req)
    {
      $req->validate([
        'current_password'=>'required|string',
        'new_password'=>'required|string',
      ]);

      $current_password = $req->input('current_password');
      $new_password = $req->input('new_password');
      $current_password_data = User::where(['id'=>Auth::id()])->get()->first()->password;

      if(Hash::check($current_password,$current_password_data)){
        User::where(['id'=>Auth::id()])->update(['password'=>Hash::make($new_password)]);
      }else {
        return back()->with('error','Mot de passe invalid');
      }

      return redirect()->back();
    }
}
