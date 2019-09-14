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
    <link
      rel="stylesheet"
      href="/public/css/font-awesome.min.css"
    />
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
          src="/docs/4.3/assets/brand/bootstrap-solid.svg"
          width="30"
          height="30"
          class="d-inline-block align-top"
          alt=""
        />
        Bootstrap
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
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown px-3">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"
              >Disabled</a
            >
          </li>
          <li class="nav-item px-3">
            <a class="nav-link " href="#" tabindex="-1" aria-disabled="true"
              >Log In</a
            >
          </li>
        </ul>
      </div>
    </nav>