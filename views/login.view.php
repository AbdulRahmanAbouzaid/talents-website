<?php
    $title = "Login";
    include 'layout/header.view.php';     
?>

<section id="form">
    <div class="container">
    <div class="row">
        <div class="col-md-4 br-15 mx-auto bg-beige">
        <h3 class="text-center bg-dim-gray br-15 py-2 mt-3 text-white">
            LOGIN
        </h3>
        <?php include('layout/errors.view.php') ?>
        <form method="POST" action="/login">
            <div class="form-group ">
            <label for="email">Email</label>
            <input
                type="text"
                class="form-control"
                id="email"
                aria-describedby="nameHelp"
                placeholder="Email"
                name="email"
            />
            </div>

            <div class="form-group ">
            <label for="exampleInputPassword1">Password</label>
            <input
                type="password"
                class="form-control"
                id="password"
                placeholder="Password"
                name="password"
            /><span id="eye" class="fa fa-fw fa-eye field-icon toggle-password" onclick="showAndHide(this, 'password')" title="click to show or hide password"></span>
            </div>
            <input type="checkbox" name="remember" id="rememberMe"> Remember Me

            <button
            type="submit"
            class="btn font-design bg-dim-gray text-white mb-3 btn-block "
            >
            LOGIN
            </button>
        </form>

        <center> <p> Don't have an account? <a href="/register"> Create an account </a></p> </center>
        </div>
    </div>
    </div>
</section>

<?php include 'layout/footer.view.php'; ?>