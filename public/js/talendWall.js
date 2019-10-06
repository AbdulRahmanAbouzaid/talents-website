const postArea1 = document.querySelector("#postArea");
const newPost1 = document.querySelector("#newPost");

function showPostArea() {
  newPost1.classList.add("displayNO");
  postArea1.classList.remove("displayNO")
}


$(document).ready(function(){
  $('.like-btn').click(function(){

      var material_id = $(this).parent().data('id');

      $.ajax
      ({ 
          url: '/material/like',
          data: {"material_id": material_id},
          type: 'post',
          success: function(result)
          {
              $($this).prev().text('unlike');
          },
          error: function() {
              alert('Some Error');
          }
      });
  });


  $('.comment').click(function(){
    var material_id = $(this).parent().data('id');

    $.ajax
    ({ 
        url: '/material/add-comment',
        data: {"material_id": material_id},
        type: 'post',
        success: function(result)
        {
        
        },
        error: function() {
            alert('Some Error');
        }
    });
  });

});