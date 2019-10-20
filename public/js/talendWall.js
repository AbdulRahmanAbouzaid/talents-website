function showPostArea(e) {
  e.classList.add("displayNO");
  e.parentNode.parentNode.querySelector('#postArea').classList.remove("displayNO")
}

function comment(e) { 
  e.classList.add("displayNO");
  e.parentNode.parentNode.querySelector('#commentArea').classList.remove("displayNO");
  
}

function removePost(e) {
  var material_id = $(e).parent().data('id');

  $.ajax
  ({ 
      url: '/material/delete?id='+material_id,
      type: 'get',
      success: function(result)
      {
        e.parentNode.parentNode.parentNode.parentNode.remove();
        // e.parentElement.parentElement.parentElement.remove();        
      },
      error: function() {
          alert('Some Error');
      }
  });
}

function like(e) {
  var material_id = $(e).parent().data('id');
  
  $.ajax
  ({ 
      url: '/material/like',
      data: {"material_id": material_id},
      type: 'post',
      success: function(result)
      {
          $(e).html('<span><i id="heartPost1" class="far fa-heart" style="color:red"></i></span> Unlike');
          $(e).attr('onclick', 'unlike(this)');
          $('.likes-count').html(parseInt($('.likes-count').html(), 10)+1)
      },
      error: function() {
          alert('Some Error');
      }
  });
  // e.childNodes[0].childNodes[0].classList.toggle("bg-red");
}



function unlike(e) {
  var material_id = $(e).parent().data('id');
  
  $.ajax
  ({
      url: '/material/unlike?id=' + material_id,
      type: 'get',
      success: function(result)
      {
          $(e).html('<span><i id="heartPost1" class="far fa-heart"></i></span> Like');
          $(e).attr('onclick', 'like(this)');
          $('.likes-count').html(parseInt($('.likes-count').html(), 10)-1)

      },
      error: function() {
          alert('Some Error');
      }
  });
}




function removeParentComment(e) {
  var comment_id = $(e).parent().data('id');

  $.ajax
  ({ 
      url: '/material/delete-comment?comment_id='+comment_id,
      type: 'get',
      success: function(result)
      {
        e.parentElement.parentElement.parentElement.remove();
        $('.comments-count').html(parseInt($('.comments-count').html(), 10)-1)

      },
      error: function() {
          alert('Some Error');
      }
  });
}




function editPost(e) {
  const x = e.parentNode.parentNode.parentNode.parentNode.querySelector(
    ".card-body"
  ).childNodes[1].childNodes[1].childNodes[1].childNodes[1];
  
  const postText = x.querySelector("p");
  const editText = x.querySelector(".editSection").childNodes[1];
  const deletLable = x.querySelector("span");

  editText.parentNode.classList.remove("displayNO");
  postText.remove();
  editText.value = postText.textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
  deletLable.classList.remove("displayNO");
}

function deletPic(e) {
  const postPic = e.parentNode.childNodes[1];
  const insertPic = e.parentNode.querySelector(".insertPic");
  postPic.remove();
  e.remove();
  insertPic.classList.remove("displayNO");
}



function updatePost(e) {
  var material_id = $(e).parent().data('id');
  var body = $('#updated-body'+material_id).val().replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
  
  if (body === "") {
      alert('Material body can not be empty');
  }else{
    $.ajax
    ({
        url: '/material/update',
        data : {'material_id': material_id, 'body': body},
        type: 'post',
        success: function(result)
        {
          location.reload();      
        },
        error: function() {
            alert('Some Error');
        }
    });
  }
}




function cancelUpdate(){
  location.reload();
}





function removeEvent(e) {
  var event_id = $(e).parent().data('id');

  $.ajax
  ({ 
      url: '/event/delete?id='+event_id,
      type: 'get',
      success: function(result)
      {
        e.parentNode.parentNode.parentNode.parentNode.remove();
      },
      error: function() {
          alert('Some Error');
      }
  });
}





function editEvent(e) {
  var event_id = $(e).parent().data('id');

  const x = e.parentNode.parentNode.parentNode.parentNode.querySelector(
    ".card-body"
  ).childNodes[1].childNodes[1];

  const title = document.getElementById('event-title'+event_id).innerHTML;

  const postText = x.querySelector("p");
  const editText = x.querySelector(".editSection").childNodes[1];
  const editTitle = document.getElementById('updated-title'+event_id);
  const editDate = document.getElementById('updated-date'+event_id);

  editText.parentNode.classList.remove("displayNO");
  postText.remove();
  editText.value = postText.textContent.replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
  editTitle.value = title;
  
}




function updateEvent(e) {
  var event_id = $(e).parent().data('id');
  var body = $('#updated-body'+event_id).val().replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
  var title = $('#updated-title'+event_id).val().replace(/[\n\r]+|[\s]{2,}/g, ' ').trim();
  
  if (body === "" || title === "") {
      alert('Event body Or Title can not be empty');
  }else{
    $.ajax
    ({
        url: '/event/update',
        data : {'event_id': event_id, 'content': body, 'title': title},
        type: 'post',
        success: function(result)
        {
          location.reload();      
        },
        error: function() {
            alert('Some Error');
        }
    });
  }
}