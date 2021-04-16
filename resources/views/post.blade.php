@extends('layouts.app')

@section('style')
  {{-- <link rel="stylesheet" href="{{asset('/css/post.css')}}"> --}}
  <style media="screen">
    .post-page{
      width: 100%;
      height: 100%;
    }

    .post-form{
      margin: auto;
      margin-top: 10%;
    }
  </style>
@endsection

@section('content')
  <div class="post-page">
    <form id="form" class="post-form col-md-2" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" id="picture" class="form-control" name="picture" value="{{old('picture')}}" placeholder="Picture">
      <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}" placeholder="Title (20 caractères max)" maxlength="20">
      <input type="text" id="description" class="form-control" name="description" value="{{old('description')}}" placeholder="Description (300 caractères max)" maxlength="300">
      <button type="button" name="button" class="btn btn-primary" onclick="create()">Ajouter</button>
    </form>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/posts/create.js')}}"></script>
@endsection
