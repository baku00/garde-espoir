function create() {
  var picture = document.getElementById('picture');
  var title = document.getElementById('title');
  var description = document.getElementById('description');

  var canSubmit = true

  if(!picture.files.length){
    picture.style.border = "1px solid red";
    canSubmit = false;
  }

  if(!title.value){
    title.style.border = "1px solid red";
    canSubmit = false;
  }

  if(!description.value){
    description.style.border = "1px solid red";
    canSubmit = false;
  }

  if(canSubmit)
    document.getElementById('form').submit();
}
