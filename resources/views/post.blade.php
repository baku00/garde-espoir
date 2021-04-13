@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/post.css')}}">
@endsection

@section('content')
  <div class="post-page">
    <form id="form" class="post-form col-md-2" method="post" enctype="multipart/form-data">
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
      @csrf
      <input type="file" id="picture" class="form-control" name="picture" value="{{old('picture')}}" placeholder="Picture" required>
      <input type="text" id="title" class="form-control" name="title" value="{{old('title')}}" placeholder="Title (20 caractères max)" maxlength="20" required>
      <input type="text" id="description" class="form-control" name="description" value="{{old('description')}}" placeholder="Description (255 caractères max)" maxlength="255" required>

      @if(Auth::user())
        <button type="button" name="button" class="btn btn-primary" onclick="create()">Ajouter</button>
      @else
        <button type="button" name="button" class="btn btn-primary" onclick="create()" data-bs-toggle="modal" data-bs-target="#modal-post-without-account">Ajouter</button>
      @endif
    </form>
    @include('modals.post')
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/posts/create.js')}}"></script>
@endsection
