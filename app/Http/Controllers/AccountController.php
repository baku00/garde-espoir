<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
      return view('account.index');
    }

    public function email(Request $req)
    {
      $req->validate([
        'new_email'=>'required|email:rfc,dns'
      ]);

      User::where(['id'=>Auth::id()])->update(['email'=>$req->input('new_email')]);

      return redirect()->route('account');
    }

    public function password(Request $req)
    {
      $req->validate([
        'old_password'=>'required|string',
        'new_password'=>'required|string'
      ]);

      if(Hash::check($req->input('old_password'),Auth::user()->password))
        User::where(['id'=>Auth::id()])->update(['password'=>Hash::make($req->input('new_password'))]);

      return redirect()->route('account');
    }
}
