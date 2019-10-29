<?php 
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
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
    <link rel="stylesheet" href="/public/css/admin.css" />

    <title>Admin Panel</title>
  </head>

  <style>
    td, th {
      vertical-align: middle;
      text-align: center;
    }
  </style>
<body>

    