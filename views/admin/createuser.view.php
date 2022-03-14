<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_user;?></h3>
        </div>
    </div>
    <div class="row">
        <a href="../user/index.php"><?php echo back;?></a>
    </div>
    
   <div>
       <form action="" method="POST">       
        <input type="hidden" name="com_id" value="<?= $model->com_id ?>">
          <div class="form-group">
              <label for="term"><?php echo email;?></label>
              <input class="form-control" type="text" name="email" id="email">
          </div>
          <div class="form-group">
              <label for="password"><?php echo password;?></label>
              <input class="form-control" type="text" name="password" id="password">
          </div>          
          <div class="form-group">
              <label for="role"><?php echo role;?></label>
              <input class="form-control" type="role" name="role" id="role">
          </div> 
          <div class="form-group">
              <label for="phone"><?php echo phone;?></label>
              <input class="form-control" type="text" name="phone" id="phone">
          </div> 
          <div class="form-group">
              <label for="address"><?php echo address;?></label>
              <input class="form-control" type="text" name="address" id="address">
          </div> 
          <div class="form-group">
              <input class="btn btn-outline-primary" type="submit" value="<?php echo submit;?>">
          </div>  
       </form>
       <div class="text-danger">
            <?php
            if (isset($view_bag['status'])){
            echo $view_bag['status'];
            }
            ?>
        </div>
   </div>
