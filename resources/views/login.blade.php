@extends('layouts.app')

@section('style')
  <style media="screen">
    .login-page{
      width: 100%;
      height: 100%;
    }

    .login-form{
      margin: auto;
      margin-top: 10%;
    }
  </style>
@endsection

@section('content')
  <div class="login-page">
    @if($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <strong>X {{$message}}</strong>
      </div>
    @endif
    @if(count($errors))
      <div id="login-errors" class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $index => $error)
            <li>
              {{$error}}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
    <form method="post" class="col-md-2 login-form">
      @csrf
      <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
      <input type="password" class="form-control" name="password" value="" placeholder="Password">
      <button type="submit" class="btn btn-primary">Se connecter / S'inscrire</button>
    </form>
  </div>
@endsection

@section('script')

@endsection
