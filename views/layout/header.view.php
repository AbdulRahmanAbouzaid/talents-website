<?php 
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  $user = !isset($_SESSION['user_id']) ? false : User::find($_SESSION['user_id']);
  // die($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="/public/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/public/css/all-fonts.css" />
    <link rel="stylesheet" href="/public/css/fontawesome.css" />
    <!-- <link rel="stylesheet" href="/public/css/font-awesome.min.css" /> -->
    <link rel="stylesheet" href="/public/css/style.css" />
    <title><?= $title ?> </title>
  </head>

  <body id="layer">
    <!--NAVIGATION-->
    <nav
      class="navbar  navbar-expand-lg navbar-dark bg-light-coral text-white px-2"
    >
      <a class="navbar-brand" href="#">
        <img
          src=""
          width="30"
          height="30"
          class="d-inline-block align-top"
          alt=""
        />
        <b> Talents Website </b>
      </a>

      <button
        class="navbar-toggler bg-dim-gray"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active px-3">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <?php if(!$user){?>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
          <?php } else {?>
            <li class="nav-item dropdown px-3">
              <a
                class="nav-link dropdown-toggle active"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <?= $user->full_name?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile?id=<?=$user->id?>">View Profile</a>
                <a class="dropdown-item" href="/user/update-profile">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          <?php } ?>
          
        </ul>
      </div>
    </nav>