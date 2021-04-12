<!-- Modal -->
<div class="modal fade" id="remove-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression d'un post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Es-tu sûr de vouloir supprimer ce post ?
        <h3><input type="text" id="remove-title" class="form-control-plaintext" name="" value="" readonly></h3>
        <form id="remove-form" action="{{route('account.myposts.remove')}}" method="post">
          @csrf
          <div class="form-group">
            <img id="remove-picture" src="" alt="" style="width:100%;">
          </div>
          <div class="form-group">
            <input type="hidden" id="remove-post_id" name="post_id" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="confirm_remove()">Supprimer</button>
      </div>
    </div>
  </div>
</div>
