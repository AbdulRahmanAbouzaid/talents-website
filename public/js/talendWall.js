function showPostArea(e) {
  e.classList.add("displayNO");
  e.parentNode.parentNode.querySelector('#postArea').classList.remove("displayNO")
}

function comment(e) { 
  e.classList.add("displayNO");
  e.parentNode.parentNode.querySelector('#commentArea').classList.remove("displayNO");
  
}

function removePost(e) {
  e.parentNode.parentNode.parentNode.parentNode.remove();
}

function like(e) {
  var material_id = $(e).parent().data('id');
  console.log(material_id);

  $.ajax
  ({ 
      url: '/material/like',
      data: {"material_id": material_id},
      type: 'post',
      success: function(result)
      {
          $(e).html('<span><i id="heartPost1" class="far fa-heart" style="color:red"></i></span> unlike');
          $(e).attr('onclick', 'unlike(this)');
      },
      error: function() {
          alert('Some Error');
      }
  });
  // e.childNodes[0].childNodes[0].classList.toggle("bg-red");
}



function unlike(e) {
  var material_id = $(e).parent().data('id');
  console.log(material_id);

  $.ajax
  ({ 
      url: '/material/unlike?id=' + material_id,
      type: 'get',
      success: function(result)
      {
          $(e).html('<span><i id="heartPost1" class="far fa-heart"></i></span> Like');
          $(e).attr('onclick', 'like(this)');
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
      },
      error: function() {
          alert('Some Error');
      }
  });
}
