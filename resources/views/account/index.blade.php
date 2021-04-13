@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/account/information_login/index.css')}}">
@endsection

@section('content')
  <div class="row">
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{asset('/storage/account/img/information_login.jpg')}}" alt="Card image cap">
      <div class="card-body">
        <a href="{{route('account.information_login')}}" class="btn btn-link">Information de connexion</a>
      </div>
    </div>
    {{-- <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{asset('/storage/account/img/connecting_option.png')}}" alt="Card image cap">
      <div class="card-body">
        <a href="{{route('account.information_login')}}" class="btn btn-link">Options de connexion</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{asset('/storage/account/img/security_settings.jpg')}}" alt="Card image cap">
      <div class="card-body">
        <a href="{{route('account.information_login')}}" class="btn btn-link">Paramètre de sécurité</a>
      </div>
    </div> --}}
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/posts/like.js')}}"></script>
@endsection
