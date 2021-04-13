<!-- Modal -->
<div class="modal fade" id="modal-post-without-account" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Post sans connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Es-tu sûr de vouloir publier ton post sans être connecté au site ?</p>
        <p>Tu seras dans l'obligation de contacter le support si tu souhaites supprimer/modifier ta publication</p>
      </div>
      <div class="modal-footer">
        <a href="{{route('login')}}">Me créer un compte</a>
        <button type="button" class="btn btn-primary">Je suis sûr</button>
      </div>
    </div>
  </div>
</div>
