function like(liked,post_id) {

  var page = liked ? 'like' : 'dislike';

  const request = new XMLHttpRequest();
  request.open('POST','/'+page+'/'+post_id);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.send('_token='+document.getElementsByName('_token')[0].value);

  var like_button = document.getElementById(post_id+'-like-button');
  var dislike_button = document.getElementById(post_id+'-dislike-button');

  console.log('1 like_button.className: ' + like_button.className);
  console.log('1 dislike_button.className: ' + dislike_button.className);

  if(page === 'like'){
    if(like_button.className.includes("blue"))
      like_button.className = like_button.className.replace('blue','');

    else if(!like_button.className.includes('blue')){
      like_button.className += 'blue';
      dislike_button.className = dislike_button.className.replace('red','');
    }
  }

  if(page === 'dislike'){
    if(dislike_button.className.includes('red')){
      dislike_button.className = dislike_button.className.replace('red','');
    }
    else {
      dislike_button.className += 'red';
      like_button.className = like_button.className.replace('blue','')
    }
  }

  console.log('2 like_button.className: ' + like_button.className);
  console.log('2 dislike_button.className: ' + dislike_button.className);
}
