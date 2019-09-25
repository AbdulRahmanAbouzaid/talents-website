<?php 
  $title = 'Update Profile';
  include('/../layout/header.view.php'); 
?>


<!--BODY-->
<section id="body">
    <div class="container">
        <div class="row" >   
            <div class="col-md-4 mt-3 ">
                <div class="card bg-beige text-center">
                    <div class="card-body">
                    <div style="font-size:200px ; position: relative;height:1em">
                        <i class=" fas fa-id-badge"style="margin: 0;
                                                        position: absolute;
                                                        top: 50%;
                                                        left: 50%;
                                                        transform: translate(-50%, -50%)"
                        ></i>
                        <img src="" alt="" class="" />
                    </div>
                    </div>
                    <div class="card-footer">
                    <button class="btn bg-dim-gray text-white ">Change</button>
                    </div>
                </div>
                </div>
                    <div class="col-md-8 mt-3" id="profileInfo">
                        <div class="card bg-beige text-center">
                            <div class="card-header bg-light-coral">
                            <h1 class="text-left text-white titleText">Profile Information</h1>
                            </div>
                        <form method="post" action="/organization/update-profile">

                            <div class="card-body">
                            <div class='info '>
                                <div class="input-group mb-3 ">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" name="name" class="form-control" value="<?=$user->full_name?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class='info '>
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                    <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">User Name</span>
                                    </div>
                                    <input type="text" name="username" class="form-control" value="<?=$user->username?>" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Email</span>
                                    </div>
                                    <input type="email" name="email" class="form-control" value="<?=$user->email?>" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Description</span>
                                    </div>
                                    <input type="text" name="description" class="form-control" value="<?=$organization->description?>" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default">
                                </div>
                            <button type="submit" class="btn bg-dim-gray text-white float-right">Save Changes</button>

                        </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</section>
<script src="kit-fontawesome.js"></script>
<?php include('/../layout/footer.view.php');  ?>
