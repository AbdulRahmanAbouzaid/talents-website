<?php 
  $title = 'Update Profile';
  include($_SERVER['DOCUMENT_ROOT'].'/views/layout/header.view.php');
?>
<style>
    .upload-form > input {
        display: none;
    }
    .upload-icon {
        position: absolute;
        top: 2px;
        right: 2px;
        z-index: 100;
        font-size: 30px;
        cursor: pointer;
    }
</style>

<!--BODY-->
<section id="body">
    <div class="container">
        <div class="row" >   
            <div class="col-md-4 mt-3 ">
                <div class="card bg-beige text-center">
                    <div class="card-body">
                    <form id="change-picture-form" runat="server" method="POST" action="/change-picture" enctype="multipart/form-data" class="upload-form">
                        <label for="file-input" class="label">
                            <span class="upload-icon fa fa-camera" title="upload new picture" onchange="readURL(this);"> </span>
                        </label>
                        <input id="file-input" type="file" onchange="readURL(this);" name="profilePicture"/>
                        <div style="font-size:200px ; position: relative;height:1em">
                            <i class=" fas fa-id-badge"style="margin: 0;
                                                            position: absolute;
                                                            top: 50%;
                                                            left: 50%;
                                                            transform: translate(-50%, -50%)"
                            ></i>
                            <img src="" alt="" id="profile-pic" />
                        </div>
                        </div>
                        <div class="card-footer" style="display:none">
                            <button type="submit" class="btn bg-dim-gray text-white ">Change</button>
                            <button class="btn bg-dim-gray text-white">Cancel</button>
                        </div>
                    </form>                    
                </div>
                </div>
                    <div class="col-md-8 mt-3" id="profileInfo">
                        <div class="card bg-beige text-center">
                            <div class="card-header bg-light-coral">
                            <h1 class="text-left text-white titleText">Profile Information</h1>
                            </div>
                        <form method="post" action="<?= $update_action ?>">
                            <?php include($_SERVER['DOCUMENT_ROOT'].'/views/layout/errors.view.php') ?>                            
                            <div class="card-body">
                            <div class='info '>
                                <div class="input-group mb-3 ">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Name</span>
                                </div>
                                <input type="text" name="name" class="form-control" value="<?=$logged_user->full_name?>" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>

                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Email</span>
                                    </div>
                                    <input type="email" name="email" class="form-control" value="<?=$logged_user->email?>" aria-label="Default"
                                        aria-describedby="inputGroup-sizing-default" disabled>
                                </div>
                                <?php if(isset($organization)){ ?>
                                    <div class="input-group mb-3 ">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Description</span>
                                        </div>
                                        <input type="text" name="description" class="form-control" value="<?=$organization->description?>" aria-label="Default"
                                            aria-describedby="inputGroup-sizing-default">
                                    </div>
                                <?php }elseif(isset($user_talents)){ ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Talents</span>
                                        </div>
                                        <div>
                                            <div class="dropdown ">
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
                                                <?php foreach($talents as $talent) { 
                                                    $checked = in_array($talent->id, array_column($user_talents, 'id')) ? 'checked' : '';
                                                ?>
                                                <input type="checkbox" class="ml-2" value=<?=$talent->id?> name="talent-types[]" <?=$checked?>/>
                                                <?= $talent->name ?><br />
                                                <?php } ?>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">New Password</span>
                                    </div>
                                    <input type="password" name="password" class="form-control" aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Confirm New Password</span>
                                    </div>
                                    <input type="password" name="password-confirm" class="form-control"  aria-label="Default"
                                    aria-describedby="inputGroup-sizing-default">
                                </div>
                                <div class="input-group mb-3 ">
                                    <div class="input-group-prepend ">
                                        <span class="input-group-text text-white bg-sandy-brown" id="inputGroup-sizing-default">Current Password</span>
                                    </div>
                                    <input type="password" name="current-password" class="form-control"  aria-label="Default"
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

<?php 
  include($_SERVER['DOCUMENT_ROOT'].'/views/layout/footer.view.php');
?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-pic').attr('src', e.target.result);
            }
            $('.card-footer').attr('style', 'display:block');
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>