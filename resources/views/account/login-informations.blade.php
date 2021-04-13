@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/post.css')}}">
@endsection

@section('content')
  <div class="row">
    <div class="card" style="width: 18rem;">
      @if(count($errors) > 0 && @$errors->messages()['new_email'] !== null)
        <div id="email-errors" class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $index => $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card-body">
        <h5 class="card-title">Adresse email</h5>
        <form action="{{route('account.update.email')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="current_email">Email actuelle</label>
            <input type="email" id="current_email" class="form-control" name="current_email" value="{{Auth::user()->email}}" readonly>
          </div>
          <div class="form-group">
            <label for="new_email">Nouvel email</label>
            <input type="email" id="new_email" class="form-control" name="new_email" value="">
          </div>
          <button type="submit" class="btn btn-primary">Changer l'adresse email</button>
        </form>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
          <strong>X {{$message}}</strong>
        </div>
      @endif
      @if(count($errors) > 0 && (@$errors->messages()['current_password'] !== null || @$errors->messages()['new_password'] !== null))
        <div id="password-errors" class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
      <div class="card-body">
        <h5 class="card-title">Mot de passe</h5>
        <form action="{{route('account.update.password')}}" method="post">
          @csrf
          <div class="form-group">
            <label for="current_email">Mot de passe actuel</label>
            <input type="password" id="current_password" class="form-control" name="current_password" value="">
          </div>
          <div class="form-group">
            <label for="new_password">Nouveau mot de passe</label>
            <input type="password" id="new_password" class="form-control" name="new_password" value="">
          </div>
          <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/account/myposts.js')}}"></script>
@endsection
