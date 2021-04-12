@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/account/index.css')}}">
@endsection

@section('content')
  <div class="row">
    <div class="update col-md-2">
      <form action="{{route('account.update.information_login.email')}}" class="form-update-email" method="post">
        @csrf
        <input type="email" class="form-control update-email" name="old_email" value="{{Auth::user()->email}}" readonly>
        <input type="email" class="form-control update-email" name="new_email" value="" placeholder="Nouvelle adresse" required>
        <button type="submit" name="button" class="btn btn-primary">Changer d'email</button>
      </form>
    </div>
    <div class="update col-md-2">
      <form action="{{route('account.update.information_login.password')}}" class="form-update-password" method="post">
        @csrf
        <input type="password" class="form-control update-password" name="old_password" value="" placeholder="Ancien mot de passe">
        <input type="password" class="form-control update-password" name="new_password" value="" placeholder="Nouveau mot de passe" required>
        <button type="submit" name="button" class="btn btn-primary">Changer d'email</button>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/posts/like.js')}}"></script>
@endsection
