@extends('layouts.app')

@section('style')
  {{-- <link rel="stylesheet" href="{{asset('/css/home.css')}}"> --}}
@endsection

@section('content')
  <div class="content" style="width:95%; margin:auto;">
    <div id="presentation">
      <h3>Principe du site</h3>
      <p id="principe">Le principe est simple, quand vous arrivez sur le site, vous verrez les publications des autres utilisateurs.</p>

      <h3>Contenu d'une publication</h3>
      <p id="publication-presentation">Une publication contient une image (de vous, d'une illustration ou ce que vous voulez d'autre. Le but n'étant pas d'oppresser les personnes, mais au contraire de les permettre de s'exprimer), un titre (le sujet de la publication), et une description décrivant le sujet.</p>
      <h3>Possession d'une publication</h3>
      <p id="publication-content">
        Elle possède également une possibilité d'envoyer un commentaire, de like ou de disliker (commentaire, like et dislike uniquement visible par l'auteur de la publication et la personne ayant commenté, like ou dislike).
      </p>

      <h3>Principe Likes/Dislikes</h3>
      <p id="likes-dislikes">
        Les likes/dislikes ne sont pas là pour dire (c'est bien, c'est nul), mais dans le sens de dire (like: je m'en fou de comment tu es, je te trouve très bien comme ça, et dislike: je n'aime pas parce que .... (justification à l'aide du commentaire))
      </p>

      <h3>Condition de publication</h3>
      <p id="post">Afin de pouvoir poster, commenter ou liker, il vous faudra un compte. Un compte comprend uniquement vos publications, vos commentaires et vos liker/dislikes, aucune autre informations sûr vous. Et vous permet de supprimer ou modifier vos publications</p>

      <h3>Création d'un compte</h3>
      <p id="account-creation">
        Pour vous créez un compte vous possédez une adresse email et un mot de passe (adresse email qui pour augmenter l'anonymat peut être une adresse jetable comme yopmail ou autre, elle sert uniquement à vous connectez sur le site et à changer votre mot de passe en cas d'oublie)
      </p>

      <h3>Autres informations</h3>
      <p id="general">
        Le site est encore en cours de développement donc si vous avez des idées/conseils pour l'améliorer, n'hésitez pas ^^
      </p>

      <form method="post" class="col-md-6">
        @csrf
        <div class="form-group">
          <input type="text" name="subject" value="{{old('subject')}}" class="form-control" placeholder="Sujet">
        </div>
        <div class="form-group">
          <textarea name="content" rows="4" cols="40" class="form-control" placeholder="Idées/Conseils/Amélioration"></textarea>
        </div>
        <button type="submit" name="button" class="btn btn-primary">Envoyer</button>
      </form>
    </div>
  </div>
@endsection

@section('script')
  {{-- <script type="text/javascript" src="{{asset('/js/posts/like.js')}}"></script> --}}
@endsection
