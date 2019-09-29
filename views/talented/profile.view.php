<?php 
    $title = "Profile";
    include($_SERVER['DOCUMENT_ROOT'].'/views/layout/header.view.php');
?>

<section id="body">
      <div class="container">
        <div class="row mt-5"  >
          <div class="col-md-3 my-3 text-center"  id="profileImage">
            <div class="row">
              <div class="col-md-12">
                <img src="/public/img/profile.jpeg" class="img-profile" alt="">
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
                  <img src="/public/img/profile.jpeg" class="img-profile-post float-left" alt="">
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
                <div data-id="<?= $material->id?>" class="card  mt-3" >
                    <div class="card-header bg-light-coral">
                        <img src="/public/img/profile.jpeg" class="img-profile-post float-left" alt="">
                        <span class=" float-left ml-3 name-post "><?= $user->full_name?></span>
                    </div>
                    <div class="card-body bg-beige">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-12  "  >
                            <div class="card-body ">
                                <p class="card-text " style="font-family: 'Chilanka', cursive; font-size:15px">
                                    <?= $material->body ?>
                                </p>
                            </div>
                            <img src="/public/uploads/materials/<?=$material->media?>" class=" card-img"  alt="">
                            
                            
                            </div>
                        </div>
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
<!-- <script src="/public/js/talendWall.js"></script> -->
<script>
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
    });
</script>