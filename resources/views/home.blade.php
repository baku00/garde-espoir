@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="{{asset('/css/home.css')}}">
@endsection

@section('content')
  <div class="row">
    @foreach ($posts as $key => $value)
      <div id="{{$value->id}}" class="post col-md-2 col-12">

        {{-- Picture Information --}}
        <div class="post-info">

          {{-- Picture --}}
          <div class="picture">
            <img class="post-picture col-md-12 col-12" src="{{$value->picture_url}}" alt="{{$value->title}}-image">
          </div>


        </div>

        {{-- Menu --}}
        <div class="menu btn-primary">

          {{-- Title --}}
          <div class="title">
            {{$value->title}}
          </div>

          {{-- Description --}}
          <div class="description" style="word-wrap: break-word;">
            {{$value->description}}
          </div>

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
                  <button type="submit" class="btn blue" style="color:white;">Envoyer</button>
                </div>

              </form>

              {{-- Comment list --}}
              <ul>
                @foreach ($value->comment as $key => $content)
                  @if($content->owner_id == Auth::id())
                    <li style="word-wrap: break-word;">{{$content->content}}</li>
                  @endif
                @endforeach
              </ul>

            @endif

          </div>


            {{-- Utilisateur principal --}}
            @if($value->user_id == Auth::id())
              {{-- Stats like-dislike --}}
              <div class="stats-like-dislike">

                <label>Likes: {{$value->likes->likes}}</label>
                </div><div>
                <label>Dislikes: {{$value->likes->dislikes}}</label>

              </div>

            {{-- Utilisateur normal --}}
            @else

              {{-- Like --}}
              <div class="like">

                {{-- Like form --}}
                <form action="{{route('like',$value->id)}}" method="post">
                  @csrf
                  <button type="button" id="{{$value->id}}-like-button" name="like" class="like-button like btn  {{@$value->post_liked->liked ? 'liked blue' : ''}}"><img class="like-logo like-button-logo" src="{{asset('img/home/like.webp')}}" onclick="like(true,{{$value->id}})"></button>
                </form>

              </div>

              {{-- Dislike --}}
              <div class="dislike">

                {{-- Dislike form --}}
                <form action="{{route('dislike',$value->id)}}" method="post">
                  @csrf
                  <button type="button" id="{{$value->id}}-dislike-button" name="dislike" class="like-button dislike btn  {{@$value->post_liked->disliked ? 'disliked red' : ''}}"><img class="dislike-logo like-button-logo" src="{{asset('img/home/like.webp')}}" onclick="like(false,{{$value->id}})"></button>
                </form>

              </div>

            @endif

          </div>
        </div>
      @endforeach
    </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('/js/posts/like.js')}}"></script>
@endsection
