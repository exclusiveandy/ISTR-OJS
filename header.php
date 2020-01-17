<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ISTR - OJS</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-light navbar-white border-bottom">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="img/istrlogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">ISTR-OJS</span>
      </a>

      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 60px; padding-right: 20px;">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="publish.php" class="nav-link">Publish</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="journals.php" class="nav-link">Journals</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="guide.php" class="nav-link">Guide</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="about.php" class="nav-link">About</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="login.php" class="nav-link">Login</a>
        </li>

         <li class="nav-item d-none d-sm-inline-block" style="padding-left: 20px; padding-right: 20px;">
          <a href="register.php" class="nav-link">Register</a>
        </li>
      </ul>
     
      <!-- SEARCH FORM -->
      <ul class="navbar-nav ml-auto">
      <form class="form-inline ml-3" action="Publish.php">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="keyword"  onsubmit="window.location.href='Publish.php?keyword=<?php echo $_POST['keyword'];?>' type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      </ul>

      <!-- Right navbar links -->
      
        <!-- Messages Dropdown Menu -->
       
    </div>
  </nav>
  <!-- /.navbar -->

  