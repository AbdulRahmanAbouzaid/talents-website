<?php 
    $title = "Profile";
    include($_SERVER['DOCUMENT_ROOT'].'/views/layout/header.view.php');
?>

<section id="body" class="main-body">
      <div class="container">
        <div class="row mt-5"  >
          <div class="col-md-3 my-3 text-center"  id="profileImage">
            <div class="row">
              <div class="col-md-12">
                <?php $src = $user->photo ? 'data:image/png;base64,'.base64_encode($user->photo) : '/public/img/profile.png'?>
                <img src="<?=$src?>" class="img-profile" alt="">
              </div>
            </div>
            <div class="row ">
              <div class="col-md-8 mx-auto  text-center br-15" style="background:#f1e3d6" >
                <p  class=" my-auto name-font-design"><?= $user->full_name?></p>
              </div>
            </div>

          </div>
          <div class="col-md-8 " id="posts">
            <?php if($logged_user->id == $user->id) {?>
              <div class="card " >
                <div class="card-header bg-light-coral" >
                  <img src="<?=$src?>" class="img-profile-post float-left" alt="">
                  <span class=" float-left ml-3 name-post "><?=$user->full_name?></span>
                  <!-- <button id="newPost" onclick="showPostArea()" class="btn bg-dim-gray text-white float-right mt-2"> New Post</button> -->
                </div>

                <div class="card-body bg-beige" id="postArea">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                      
                        <form form action="/add-material" method="post" enctype="multipart/form-data" >
                          <?php include($_SERVER['DOCUMENT_ROOT'].'/views/layout/errors.view.php') ?>
                          <div class="container">
                            <textarea name="body" id="body" style="width: 100%" rows="5" class="d-block input-font-style"></textarea>
                            
                            <div class="row"></div>
                            <div class="col-md-7 bg-sandy-brown p-1 mt-3 br-15">
                            
                              <span class="font-design">Insert File</span>
                              <input type="file" name="file" value="upload material">
                            
                            </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-12">
                                <button type="submit" class="btn float-right text-white bg-dim-gray mt-2" > POST</button>
                              </div>
                            </div>
                          </div>            
                        </form>
                      </div>
                    </div>
                  </div>  
                

              </div>

            <?php } ?>
            
            <?php foreach ($materials as $material) { ?>
                <div class="card  mt-3" id="<?=$material->id?>">
                    <div class="card-header bg-light-coral">
                        <img src="<?=$src?>" class="img-profile-post float-left" alt="">
                        <span class=" float-left ml-3 name-post "><?= $user->full_name?></span>
                        <?php if($logged_user->id == $user->id) { ?>
                          <div class="btn-group float-right"> 
                            <button type="button" class="btn text-white" id="dropdownMenuReference"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                              <i class="fas fa-ellipsis-v"></i>
                            </button>
                            
                            <div class=" dropdown-menu" aria-labelledby="dropdownMenuReference" data-id="<?= $material->id?>">
                              <a class="dropdown-item text-center m-0 p-0" onclick="editPost(this)" style="border-bottom:solid 1px #46393b" > Edit</a>
                              <a class="dropdown-item text-center m-0 p-0" onclick="removePost(this)"> Delete</a>
                            </div> 
                          </div>
                        <?php } ?>
                    </div>
                    <div class="card-body bg-beige">
                        <div class="container" data-id="<?= $material->id?>">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="card-body post-body">
                                    <div class="mb-2 displayNO insertPic">
                                      <span class="font-design">Insert Img</span>
                                      <input class="inputImage" type="file" name="pic" accept="image/*" value="Insert photo">
                                    </div>
                                    <p class="card-text " style="font-family: 'Chilanka', cursive; font-size:15px">
                                        <?= $material->body ?>
                                    </p>
                                    <div class="editSection m-0 p-1 displayNO " style="border: 1px solid #46393b" data-id="<?= $material->id?>">
                                      <textarea type="text" value="" name="" id="updated-body<?=$material->id?>"  class="d-block input-font-style height-input-font-style"></textarea>
                                      <button class="btn cLH mt-2 btn-sm" style="border: 1px solid #46393b" onclick="updatePost(this)"> Save</button>
                                      <button class="btn cLH mt-2 btn-sm" style="border: 1px solid #46393b" onclick="cancelUpdate()"> Cancle</button>
                                    </div>
                                </div>
                                <img src="<?= isset($material->media) ? '/public/uploads/materials/'.$material->media : '' ?>" class=" card-img"  alt="">
                                </div>
                            </div>
                            <!-- start of comment area -->
                            <div class="interaction-area">
                              <div class="interaction-count">
                                  <small class="comments"><span class="comments-count"> <?= $material->comments ?> </span> Comment(s) </small>
                                  <small class="likes"><span class="likes-count"> <?= $material->likes ?> </span> Like(s) </small>
                              </div>
                              <?php if($logged_user->isVisitor() || $logged_user->isTalented()) { ?>
                                <div style="border-top : solid 1px #bfb8b9" data-id="<?= $material->id?>">
                                  <?php 
                                    if($material->isLikedBy($logged_user->id)){
                                      $function_name = 'unlike(this)';
                                      $likedOrNot = 'Unlike';
                                      $red = 'bg-red';
                                    }else{
                                      $function_name = 'like(this)';
                                      $likedOrNot = 'Like';
                                      $red = '';
                                    }
                                ?>
                                  <button class=" btn my-1  mr-2 cLH"  onclick=<?=$function_name?>>
                                      <span><i id="heartPost1" class="far fa-heart <?=$red?>"></i></span> <?= $likedOrNot?>
                                  </button>
                                  <button class=" btn my-1  cLH " id="commentbtn1" onclick="comment(this)">Comment</button>
                                </div>
                                
                                <div class="py-1 displayNO" id="commentArea" style="border-top : solid 1px #bfb8b9">  
                                  <div class="container">
                                    <div class="row" >
                                      <input type="hidden" name="material_id" id="material_id" value="<?=$material->id?>">
                                      <textarea class="d-block input-font-style" name="body" id="comment-body"></textarea>
                                      <small style="display:none;" class="body-error"></small>
                                      <button class="btn cLH" id="commentbtn1" onclick="addComment()"><i class="fas fa-comment-dots"></i></button>
                                    </div>  
                                  </div>
                                       
                                </div>
                              <?php } ?>
                            </div>
                            <?php foreach($material->comments() as $comment){?>
                              <div  style="border-top : solid 1px #bfb8b9" class="material-comments">
                                <div class="my-1" data-id="<?=$comment->id?>">
                                  <?php if($logged_user->id == $comment->user_id) { ?>
                                    <div class="btn-group float-right">
                                      <button type="button" class="btn" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" data-reference="parent">
                                        <i class="fas fa-ellipsis-v"></i>
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuReference" data-id="<?=$comment->id?>">
                                        <a class="dropdown-item  text-center m-0 p-0" onclick="removeParentComment(this)"
                                          >
                                          Delete</a>
                                      </div>
                                    </div>
                                  <?php } ?>
                                  <h5 class="text-muted"> <?= $comment->user()->full_name ?> </h5>
                                  
                                  <p class="card-text ml-3" style="font-size:15px"><?=$comment->body?></p>
                                </div>
                              </div>
                            <?php } ?>
                              <!-- end of comment area -->
                        <!-- end of container -->
                        </div>
                            
                    
                    </div>
                </div>
            <?php } ?>
              
            </div>
          </div>

        </div>
      </div>
    </section>



<?php 
    include($_SERVER['DOCUMENT_ROOT'].'/views/layout/footer.view.php');
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/public/js/talendWall.js"></script>

  <script>
    // function sendNotification() {
    //   console.log('here');
      

    //   return false; // return false to cancel form action
    // }

    function addComment(e) {
      var material_id = $('#material_id').val();
      var body = $('#comment-body').val();
      console.log(body);
      if (!$.trim(body)) {
        $('.body-error').html('Body cannot be empty!');
      }
      $.ajax
      ({ 
          url: '/material/add-comment',
          data: {"material_id": material_id, "body": body},
          type: 'post',
          success: function(result)
          {
            <?php if($logged_user->id != $user->id){?>
              var msg = { 
                  text : '<?= $logged_user->full_name?>  Add comment to your post',
                  type : 'comment',
                  from : <?= $logged_user->id?>,
                  to : <?= $user->id ?>,
                  relatedId : material_id
              };
              conn.send(JSON.stringify(msg));

            <?php } ?>

            location.reload();
          },
          error: function() {
              alert('Some Error');
          }
      });
    }
  </script>
