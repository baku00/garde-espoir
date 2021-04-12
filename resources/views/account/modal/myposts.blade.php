<!-- Modal -->
<div class="modal fade" id="myposts-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modification d'un post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-form" action="{{route('account.myposts')}}" method="post">
          @csrf
          <div class="form-group">
            <img id="edit-picture" src="" alt="" style="width:100%;">
            <input type="hidden" id="picture-input" name="picture_input" value="">
          </div>
          <div class="form-group">
            <label for="edit-picture">Nouvelle photo (Optionnel)</label>
            <input type="file" id="edit-picture" name="picture" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="edit-title">Titre (Optionnel) (255 caractères max)</label>
            <input type="text" id="edit-title" name="title" maxlength="255" class="form-control" value="">
          </div>
          <div class="form-group">
            <label for="edit-description">Description (Optionnel) (255 caractères max)</label>
            <textarea name="description" id="edit-description" class="form-control" rows="4" cols="40" maxlength="255"></textarea>
          </div>
          <div class="form-group">
            <input type="hidden" id="post_id" name="post_id" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" onclick="save()">Appliquer</button>
      </div>
    </div>
  </div>
</div>
