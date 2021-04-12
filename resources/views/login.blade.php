@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/login.css')}}">
@endsection

@section('content')
  <div class="login-page">
    <form method="post" class="col-md-2 login-form">
      @csrf
      @if(count($errors) > 0)
        <div class="alert alert-danger col-md-12">
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{$error}}
              </li>
            @endforeach
          </ul>
        </div>
      @endif
      <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
      <input type="password" class="form-control" name="password" value="" placeholder="Mot de passe" required>
      <button type="submit" class="btn btn-primary">Se connecter / S'inscrire</button>
    </form>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src=""></script>
@endsection
