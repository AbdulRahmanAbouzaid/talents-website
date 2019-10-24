<?php 
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }
  $logged_user = !isset($_SESSION['user_id']) ? false : User::find($_SESSION['user_id']);
  
  $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
  switch($uri){
    case '' : $home = true;
              break;
    case 'login' : $login = true;
                    break;
    case 'about' : $about = true;
                    break;
    default : break;                
  }

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
      <a class="navbar-brand" href="/">
        <img
          src="/public/img/talent.png"
          width="40"
          height="40"
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
          
          <?php if(!$logged_user){?>
            <li class="nav-item <?= $home ? 'active' : ''?> px-3">
              <a class="nav-link" href="/"
                >Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?= $about ? 'active' : ''?>">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= $login ? 'active' : ''?>" href="/login">Login</a>
            </li>
          <?php } else {?>
            <li class="nav-item nav-icon active px-2 ">
              <a class="nav-link py-0 my-0" href="#" ><i class="fas fa-home"></i></a>
            </li>
            <?php if($logged_user->isTalented() || $logged_user->isVisitor()){?>
              <li class="nav-item nav-icon dropdown px-2">
                <a class="nav-link  py-0 my-0" href="#" id="Message" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="far fa-envelope" style="position: relative; "></i>
                  <?php 
                    $msgNotifications = $logged_user->msgNotifications(); 
                    $count = count($msgNotifications);
                  ?>
                  <span class="notification-label msg-notify"><?=$count?></span>
                </a>
                <div class="dropdown-menu msg-dropdown" aria-labelledby="Message">
                  <?php if( $count < 1){?>
                    <p class="dropdown-item no-msg">No New Messages</p>
                    <div class="dropdown-divider"></div>                  
                  <?php }else{
                    foreach ($msgNotifications as $notification) { ?>
                    <a class="dropdown-item" href="<?=$notification->content . '&notification_id='.$notification->id?>">You have new message</a>
                    <div class="dropdown-divider"></div>
                  <?php }} ?>
                  <a class="dropdown-item" href="/chat">View All</a>
                </div>
              </li>
            <?php } ?>
            <li class="nav-item nav-icon dropdown px-2 ">
              <a class="nav-link  py-0 my-0" href="#" id="Notification" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <?php 
                    $commentNotifications = $logged_user->commentNotifications(); 
                    $notif_count = count($commentNotifications);
                  ?>
                <i class="far fa-bell" style="position: relative;"></i>
                <span class="notification-label notification-count"><?=$notif_count?></span>
              </a>
              <div class="dropdown-menu notify-dropdown" aria-labelledby="Notification">
                <?php if( $notif_count < 1){?>
                    <p class="dropdown-item no-notifications">All is Read</p>             
                <?php }else{ ?>
                <?php foreach ($commentNotifications as $notification) { ?>
                  <a class="dropdown-item" href="/profile?id=<?=$logged_user->id?>&notification_id=<?=$notification->id?>#<?=$notification->related_element_id?>">
                    <?=$notification->content?>
                  </a>
                  <?= $notif_count > 1 ? '<div class="dropdown-divider"></div>' : '' ?>
                <?php } }?>
              </div>
            </li>
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
                <?= $logged_user->full_name?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile?id=<?=$logged_user->id?>">View Profile</a>
                <a class="dropdown-item" href="/user/update-profile">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          <?php } ?>
          
        </ul>
      </div>
    </nav>