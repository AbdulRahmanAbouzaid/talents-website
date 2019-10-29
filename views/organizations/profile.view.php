<?php 
    $title = "Profile";
    include($_SERVER['DOCUMENT_ROOT'].'/views/layout/header.view.php')
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
                <p  class=" my-auto name-font-design"> <?= $user->full_name?></p>
              </div>
            </div>

          </div>
          <div class="col-md-8 " id="posts">
            <?php if($logged_user && $logged_user->id == $user->id) { ?>
              <div class="card " >
                <div class="card-header bg-light-coral" >
                  <img src="<?=$src?>" class="img-profile-post float-left" alt="">
                  <span class=" float-left ml-3 name-post "><?=$user->full_name?></span>
                </div>

                <div class="card-body bg-beige" id="postArea">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                    
                      <form form action="/add-event" method="POST" enctype="multipart/form-data" >
                        <?php include($_SERVER['DOCUMENT_ROOT'].'/views/layout/errors.view.php') ?>

                        <div class="container">
                          <label for="title">Title</label>
                          <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          
                          <label for="title">Content</label>
                          <textarea name="content" id="body" style="width: 100%" rows="5" class="d-block input-font-style"></textarea>
                          
                          <label for="title">Date</label>
                          <input type="datetime-local" name="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                          
                          <br>
                          <label for="title">Choose Talents of the event</label>                            
                          <div class="dropdown " >
                              <button
                                class="btn dropdown-toggle bg-dim-gray text-white"
                                type="button"
                                id="dropdownMenuButton"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                Choose
                              </button>
                              <div
                                class="dropdown-menu"
                                aria-labelledby="dropdownMenuButton"
                              >
                                <?php foreach($talents as $talent) { ?>
                                  <input type="checkbox" class="ml-2" value=<?=$talent->id?> name="talent-types[]" />
                                  <?= $talent->name ?><br />
                                <?php } ?>
                              </div>
                            </div>
                          

                          <!-- <div class="row"></div>
                          <div class="col-md-7 bg-sandy-brown p-1 mt-3 br-15">
                          
                            <span class="font-design">Insert File</span>
                            <input type="file" name="file" value="upload material">
                          
                          </div>
                          </div> -->
                          
                          <div class="row">
                            <div class="col-md-12">
                              <button type="submit" class="btn float-right text-white bg-dim-gray mt-2" > Create Event</button>
                            </div>
                          </div>
                        </div>            
                      </form>
                    </div>
                  </div>
                </div>  
              

              </div>

            <?php } ?>
            
            <?php foreach($events as $event) { ?>
                <div data-id="<?= $event->id?>" class="card  mt-3" id="<?=$event->id?>">
                    <div class="card-header bg-light-coral">
                        <img src="<?=$src?>" class="img-profile-post float-left" alt="">
                        <span class=" float-left ml-3 name-post " id="event-title<?=$event->id?>"><?= $event->title?></span>
                        <?php if($logged_user->id == $user->id) { ?>
                          <div class="btn-group float-right event-dots"> 
                            <button type="button" class="btn text-white" id="dropdownMenuReference"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                              <i class="fas fa-ellipsis-v"></i>
                            </button>
                            
                            <div class=" dropdown-menu" aria-labelledby="dropdownMenuReference" data-id="<?= $event->id?>">
                              <a class="dropdown-item text-center m-0 p-0" onclick="editEvent(this)" style="border-bottom:solid 1px #46393b" > Edit</a>
                              <a class="dropdown-item text-center m-0 p-0" onclick="removeEvent(this)"> Delete</a>
                            </div> 
                          </div>
                        <?php } ?>
                        <span class=" float-right ml-3 name-post" id="event-date<?=$event->id?>"><i class="far fa-calendar-alt"></i> <?= $event->date?> </span>

                    </div>
                    <div class="card-body bg-beige">
                        <div class="container">
                          <div class="row">
                              <div class="col-md-12">
                              <!-- <img src="/public/uploads/events/" class=" card-img"  alt=""> -->
                              
                              <div class="card-body">
                                  <p class="card-text" id="event-body-<?=$event->id?>" style="font-family: 'Chilanka', cursive; font-size:15px">
                                      <?= $event->content ?>
                                  </p>
                                  <div class="editSection m-0 p-1 displayNO " style="border: 1px solid #46393b" data-id="<?= $event->id?>">
                                    <textarea type="text" value="" name="" id="updated-body<?=$event->id?>"  class="d-block input-font-style height-input-font-style"></textarea>
                                    <input type="text"  class="form-control" id="updated-title<?=$event->id?>">
                                    <button class="btn cLH mt-2 btn-sm" style="border: 1px solid #46393b" onclick="updateEvent(this)"> Save</button>
                                    <button class="btn cLH mt-2 btn-sm" style="border: 1px solid #46393b" onclick="cancelUpdate()"> Cancle</button>
                                  </div>
                              </div>
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



<?php  include($_SERVER['DOCUMENT_ROOT'].'/views/layout/footer.view.php'); ?>
<script src="/public/js/talendWall.js"></script>