@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/post.css')}}">
@endsection

@section('content')
  <div class="row">
    @foreach ($posts as $key => $value)
      <div id="{{$value->id}}" class="post col-md-2 col-12">

        {{-- Picture Information --}}
        <div class="post-info">

          {{-- Picture --}}
          <div class="picture">
            <img id="{{$value->id}}-picture" class="post-picture col-md-12 col-12" src="{{$value->picture_url}}" alt="{{$value->title}}-image">
          </div>


        </div>

        {{-- Menu --}}
        <div class="menu btn-primary">

          {{-- Title --}}
          <div id="{{$value->id}}-title" class="title"><!--
          -->{{$value->title}}<!--
        --></div>

          {{-- Description --}}
          <div id="{{$value->id}}-description" class="description"><!--
          -->{{$value->description}}<!--
          --></div>

          {{-- Comment --}}
          <div class="comment">
            {{-- Utilisateur principal --}}
            @if($value->user_id == Auth::id())
              <ul>
                @foreach ($value->comment as $key => $content)
                  @if($value->user_id == Auth::id())
                    <li>{{$content->content}}</li>
                  @endif
                @endforeach
              </ul>

            {{-- Utilisateur normal --}}
            @else

              {{-- Comment form --}}
              <form action="{{route('comment',$value->id)}}" method="post">
                @csrf

                {{-- Exprime-toi --}}
                <div class="form-group">
                  <label for="content">Exprime-toi: </label>
                  <input type="text" id="content" class="form-control" name="content" value="{{old('content')}}">
                </div>

                {{-- Send --}}
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>

              </form>

              {{-- Comment list --}}
              <ul>
                @foreach ($value->comment as $key => $content)
                  @if($content->owner_id == Auth::id())
                    <li>{{$content->content}}</li>
                  @endif
                @endforeach
              </ul>

            @endif

          </div>

            {{-- Stats like-dislike --}}
            <div class="stats-like-dislike">

              <label>Likes: {{$value->likes->likes}}</label>
              </div><div>
              <label>Dislikes: {{$value->likes->dislikes}}</label>

            </div>

            <div class="edit">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myposts-modal" onclick="edit({{$value->id}})">
                Edit
              </button>

              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#remove-modal" onclick="remove({{$value->id}})">
                Supprimer
              </button>

            </div>

          </div>
        </div>
      @endforeach
    </div>
    @include('account.modal.myposts')
    @include('account.modal.remove')
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/account/myposts.js')}}"></script>
@endsection
