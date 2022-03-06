<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MMSH- <?= $view_bag['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>


  

  <body>
    <div class="container">
    <?php

if (!is_user_authenticated()){
?>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MMSH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">        
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo home;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo features;?></a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo prices;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo about;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo contact;?></a>
        </li>
      </ul>
      <a class="nav-link btn btn-outline-primary" href="login.php"><?php echo login;?></a>
      <a class="nav-link btn btn-outline-primary" href="register.php"><?php echo register;?></a>
      <?php
      }
      ?>
      <?php
      if (is_user_authenticated()){
      ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../company"><?= get_company_name(); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="../post"><?php echo post;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../category"><?php echo category;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../user"><?php echo users;?></a>
        </li>                 
      </ul>
      <?php
      }
      ?>      
      <?php
      if (is_user_authenticated()){
      ?>
      <p><?= get_user()->email; ?></p>
      <a class="nav-link btn btn-outline-primary" href="../logout.php">Log out</a>
      <?php
      }
      ?>

    </div>
  </div>
</nav>
</div>
    <div class="container">
<?php require("$name.view.php");?>
    </div>    
    </body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </html>