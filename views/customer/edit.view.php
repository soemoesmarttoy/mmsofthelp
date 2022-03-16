    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user ?></h3>
        </div>
    </div>

    <div class="row">
    <a href="../customer">
    <?php echo back;?>
    </a>
    </div>
    
   <div>
       <form action="" method="POST">
           <input type="hidden" name="id" value="<?= $model->id ?>">
           <input type="hidden" name="com_id" value="<?= $model->com_id ?>">
          <div class="form-group">
              <label for="name"><?php echo cus_name; ?></label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $model->name ?>">
          </div>
          <div class="form-group">
              <label for="phone"><?php echo cus_phone ?></label>
              <input class="form-control" type="text" name="phone" id="phone" value="<?= $model->phone ?>">
          </div>        
          <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" value="<?php echo edit_user;?>">
          </div>  
       </form>
   </div>
   <div class="text-danger">
            <?php
            if (isset($view_bag['status'])){
            echo $view_bag['status'];
            }
            ?>
        </div>

