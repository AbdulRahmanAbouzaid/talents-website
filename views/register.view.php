<?php 
  $title = 'Register';
  include 'layout/header.view.php'; 
?>

<!--REGISTER-->
<section id="form">
  <div class="container">
    <div class="row">
      <div class="col-md-5 br-15  bg-beige mx-auto">
        <h2
          class="text-center bg-dim-gray  badge-dark text-white py-2 mt-2 br-15"
        >
          Create an account
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 bg-beige br-15 mx-auto">
        <form id="form" method="POST" action="/register">
          <div class="form-group ">
            <label for="exampleInputEmail1">Name</label>
            <input
              type="text"
              class="form-control"
              id="name"
              name="full_name"
              aria-describedby="nameHelp"
              placeholder="Enter Name"
              onfocusout="nameV()"
              onfocusin="defultname()"
            />
            <small id="nameHelp" class="form-text text-muted"
              >please enter your Correct name.</small
            >
          </div>

          <div class="form-group ">
            <label for="exampleInputEmail1">User Name</label>
            <input
              type="text"
              class="form-control"
              id="userName"
              name="username"
              aria-describedby="nameHelp"
              placeholder="Enter User Name"
              onfocusout="userV()"
              onfocusin="defultuser()"
            />
            <small id="userNameHelp" class="form-text text-muted"
              >please enter your Uniqe User name.</small
            >
          </div>

          <div class="form-group ">
            <label for="exampleInputEmail1">Email Address</label>
            <input
              type="email"
              class="form-control"
              id="email"
              name="email"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              onfocusout="emailV()"
              onfocusin="defultemail()"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We'll never share your email with anyone else.</small
            >
          </div>

          <div class="container">
            <div class="row">
              <div class="col-md-6 ">
                <h6>Choose your career</h6>
                <select
                  class="btn bg-dim-gray py-2 text-white"
                  id="careerM"
                  onchange="talendM()"
                  name="user_type"
                >
                  <option value="1">Choose</option>
                  <option value="2">Talend</option>
                  <option value="3">Organization</option>
                  <option value="4">Vistor</option>
                </select>
              </div>

              <div class="col-md-6  displayNO" id="talendMenue">
                <h6>Choose your Talend</h6>
                <div class="dropdown " >
                  <button
                    class="btn dropdown-toggle bg-dim-gray text-white"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    Career
                  </button>
                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <?php foreach($talents as $talent) { ?>
                      <input type="checkbox" class="ml-2" value=<?=$talent->id?> name="talent-types" />
                      <?= $talent->name ?><br />
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group mt-2">
            <label for="exampleInputPassword1">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="Password"
              onfocusout="passwordV()"
              onfocusin="defultpassword()"
            />
            <small id="passwordHelp" class="form-text text-muted"
              >Enter your password</small
            >
          </div>

          <div class="form-group ">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="confirmPassword"
              placeholder="Password"
              onfocusout="passwordVC()"
              onfocusin="defultpasswordC()"
            />
            <small id="passwordConfirmHelp" class="form-text text-muted"
              >Confirm your password</small
            >
          </div>

          <button
            type="submit"
            class="btn text-white btn-block bg-dim-gray font-design"
            id="submit-btn"
          >
            REGIST
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- 
<script>
  $(function() {
    $('#talents').hide(); 
    $('#org-desc').hide(); 
    $('#type').change(function(){
        if($('#type').val() == 'Talented') {
            $('#talents').show(); 
        } else if($('#type').val() == 'Organization'){
            $('#org-desc').show(); 
        } else {
          $('#talents').hide(); 
          $('#org-desc').hide();
        }
    });
});
</script> -->

<?php include 'layout/footer.view.php'; ?>
