<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5"><?php echo login;?></h1>
    </div>
</div>
<div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email"><?php echo email;?></label>
            <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password"><?php echo password;?></label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="form-group">

            <input class="btn btn-outline-primary"  type="submit" name="login" value="<?php echo login;?>">
        </div>
    </form>
    <?php
    if (isset($view_bag['status'])){
        echo $view_bag['status'];
    }  
    if (isset($view_bag['message'])){
        echo $view_bag['message'];
    }    
    ?>
</div>
