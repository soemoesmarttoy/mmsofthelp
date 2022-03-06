<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user;?></h3>
        </div>
    </div>
    <div class="row">
        <a href="../company"><?php echo back;?></a>
    </div>
    
   <div>
       <form action="" method="POST">
           <input type="hidden" name="id" value="<?= $model->id ?>">           
          <div class="form-group">
              <label for="term"><?php echo company_name_fill;?></label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $model->name ?>">
          </div>         
          <div class="form-group">
              <label for="phone"><?php echo company_phone_fill;?></label>
              <input class="form-control" type="text"  name="phone" id="phone" value="<?= $model->phone ?>">
          </div>
          <div class="form-group">
              <label for="address"><?php echo company_address_fill;?></label>
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
   
