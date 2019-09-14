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
              REGISTER
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 bg-beige br-15 mx-auto">
            <h3
              class="text-center  bg-dim-gray badge-dark text-white mt-1 py-2 br-15 "
            >
              FORM
            </h3>
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
                />
                <small id="emailHelp" class="form-text text-muted"
                  >We'll never share your email with anyone else.</small
                >
              </div>

              <div class="form-group ">
                <label for="exampleInputPassword1">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Password"
                />
              </div>

              <!-- <div class="form-group ">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="confirmPassword"
                  name="confirmed-password"
                  placeholder="Password"
                />
              </div> -->

              <button
                type="submit"
                class="btn text-white btn-block bg-dim-gray font-design"
                id="submit-btn"
              >
                Sign Up
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>


<?php include 'layout/footer.view.php'; ?>
