
<?php require_once(DIR_ROOT.DS."box/session.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>

     <meta charset="UTF-8">
     <meta http-equiv="content-type" content="text/html, charset=utf-8">
     <meta name="keyword" content="">
     <meta name="descripiton" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<!--Boostrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!--Font Awesome CDN-->
  <script src="https://kit.fontawesome.com/f1548aa293.js"></script>

<!--Custon Css-->
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

    <title><?php if(isset($page)) echo $page; ?></title>

</head>
<body>
<div class="container-fluid bg-dark">
  <div class="row">
    <div class="col-lg-12">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="show.php?model=home"><span class="pl-2 text-secondary"><i class="fas fa-photo-video fa-2x"></i></span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
    </ul>
    <span class="navbar-text pr-5">
     <ul class="navbar-nav">
      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item bg-dark" href="show.php?model=categories">Categories</a>
          <a class="dropdown-item bg-dark" href="show.php?model=addposts">Add Posts</a>
      </div>
      </li>
      <li class="nav-item dropdown mr-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item bg-dark" href="show.php?model=newusers">New Users</a>
          <a class="dropdown-item bg-dark" href="show.php?model=profile">Profile</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="https://www.instagram.com" target="_blank">SignOut <i class="fas fa-sign-out-alt"></i></a>
      </li>
   </ul>
    </span>
  </div>
 </nav>
</div>
</div>
</div>

<div class="container-fluid">
    <div class="row bg-dark">
    <div class="col-lg-2 pt-3 rounded-bottom">
        <div class="list-group">
            <div class="list-group-item bg-dark text-secondary" id="sidenav">
              <a href="show.php?model=dashboard" class="text-secondary active"><i class="fas fa-tachometer-alt"> &nbsp;DASHBOARD</i></a>
            </div>
            <div class="list-group-item bg-dark text-secondary mt-2">
              <a href="show.php?model=posts" class="text-secondary"><i class="fas fa-mail-bulk"> &nbsp;POSTS</i></a>
            </div>
            <div class="list-group-item bg-dark text-secondary mt-2">
              <a href="show.php?model=users" class="text-secondary"><i class="fas fa-users"> &nbsp;USERS</i></a>
            </div>
            <div class="list-group-item bg-dark text-secondary mt-2">
             <a href="show.php?model=comments" class="text-secondary"><i class="fas fa-comments"> &nbsp;COMMENTS</i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-10 bg-white">

        

