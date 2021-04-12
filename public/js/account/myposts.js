function edit(post_id) {
  var picture = document.getElementById(post_id+'-picture').src
  var title = document.getElementById(post_id+'-title').textContent
  var description = document.getElementById(post_id+'-description').textContent

  document.getElementById('edit-picture').src = picture
  document.getElementById('picture-input').value = picture
  document.getElementById('edit-title').value = title
  document.getElementById('edit-description').value = description
  document.getElementById('post_id').value = post_id
}

function save() {
  document.getElementById('edit-form').submit()
}

function remove(post_id) {
  var picture = document.getElementById(post_id+'-picture').src
  var title = document.getElementById(post_id+'-title').textContent
  
  document.getElementById('remove-title').value = title
  document.getElementById('remove-picture').src = picture
  document.getElementById('remove-post_id').value = post_id
}

function confirm_remove() {
  document.getElementById('remove-form').submit()
}
