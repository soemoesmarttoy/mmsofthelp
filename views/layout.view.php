<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MMSH - <?= $view_bag['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../ckeditor5-build-classic/ckeditor.js"></script>
    <script>
          function load_new_content(){
     var selected_option_value=$("#cat_id option:selected").val(); //get the value of the current selected option.

     $.post("../user/data.php", {option_value: selected_option_value},
        
     );
} 

    </script>

    
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
        <?php 
        $posts = PostData::get_posts_default();
        foreach($posts as $item){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/detail.php/?key=<?= $item -> id ?>"><?= $item -> title?></a>
        </li>
        <?php
        }
        ?>
      </ul>
      <a class="nav-link btn btn-outline-primary" href="../login.php"><?php echo login;?></a>
      <a class="nav-link btn btn-outline-primary" href="../register.php"><?php echo register;?></a>
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
   
<div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo people_menu; ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="../post"><?php echo post;?></a></li>
    <li><a class="dropdown-item" href="../user"><?php echo users;?></a></li>
    <li><a class="dropdown-item" href="../customer"><?php echo customers;?></a></li>
    <li><a class="dropdown-item" href="../workorder"><?php echo work_type;?></a></li>
  </ul>
</div> 

<div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo item_location_menu; ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="../category"><?php echo category;?></a></li>
    <li><a class="dropdown-item" href="../item"><?php echo item;?></a></li>
    <li><a class="dropdown-item" href="../location"><?php echo location;?></a></li>
  </ul>
</div>   

<div class="dropdown">
  <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo forms; ?>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="../user/buy.php"><?php echo buy;?></a></li>
    <li><a class="dropdown-item" href="../ueser/sell.php"><?php echo sell;?></a></li>
    <li><a class="dropdown-item" href="../user/rent.php"><?php echo rent;?></a></li>
    <li><a class="dropdown-item" href="../user/produce.php"><?php echo produce;?></a></li>
  </ul>
</div>              
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
      <script>
    ClassicEditor
    .create( document.querySelector( '#body' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
    </html>