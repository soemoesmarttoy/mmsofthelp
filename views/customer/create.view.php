
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_cus; ?></h3>
        </div>
    </div>
    <div class="row">
    <a href="../customer">
    <?php echo back;?>
    </a>
    </div>
    
    
   <div>
       <form action="" method="POST">
          <div class="form-group">
          <input type="hidden" name="com_id" value="<?= $view_bag['com_id']; ?>">
              <label for="name"><?php echo cus_name; ?></label>
              <input class="form-control" type="text" name="name" id="name">
          </div> 
          <div class="form-group">          
              <label for="phone"><?php echo cus_phone; ?></label>
              <input class="form-control" type="text" name="phone" id="phone">
          </div>
          <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" value="<?php echo submit;?>">
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

       


