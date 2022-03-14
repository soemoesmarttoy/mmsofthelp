<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user;?></h3>
        </div>
    </div>
    <div class="row">
        <a href="../user"><?php echo back;?></a>
    </div>
    
   <div>
       <form action="" method="POST">
           <input type="hidden" name="id" value="<?= $model->id ?>">
           <input type="hidden" name="com_id" value="<?= $model->com_id ?>">
          <div class="form-group">
              <label for="term"><?php echo email;?></label>
              <input class="form-control" type="text" name="email" id="email" value="<?= $model->email ?>">
          </div>
          <div class="form-group">
              <label for="definition"><?php echo password;?></label>
              <input class="form-control" type="text"  name="password" id="password" value="<?= $model->password ?>">
          </div>
          <?php
                    if (is_user_admin() && $model->role != "admin"){
                ?>
                    <div class="form-group">
                    <label for="definition"><?php echo role;?></label>
                    <input class="form-control" type="text"  name="role" id="role" value="<?= $model->role ?>">
                    </div>
                <?php
                    }else{
                ?>
                 <input type="hidden" name="role" value="<?= $model->role ?>">

                <?php
                    }
                ?>               
          
          <div class="form-group">
              <label for="phone"><?php echo phone;?></label>
              <input class="form-control" type="text"  name="phone" id="phone" value="<?= $model->phone ?>">
          </div>
          <div class="form-group">
              <label for="address"><?php echo address;?></label>
              <input class="form-control" type="text"  name="address" id="address" value="<?= $model->address ?>">
          </div>
          <div class="form-group">
              <input class="btn btn-outline-primary" type="submit" value="<?php echo edit_user;?>">
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
   
