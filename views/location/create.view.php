
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_location; ?></h3>
        </div>
    </div>
    <div class="row">
    <a href="../location">
    <?php echo back;?>
    </a>
    </div>
    
    
   <div>
       <form action="" method="POST">
          <div class="form-group">
          <input type="hidden" name="com_id" value="<?= $view_bag['com_id']; ?>">
          <input type="hidden" name="cat_id" value="<?= $view_bag['cat_id']; ?>">
          <input type="hidden" name="is_good" value="0">
          <input type="hidden" name="qty" value="1">
              <label for="name"><?php echo location_name; ?></label>
              <input class="form-control" type="text" name="name" id="name">
          </div> 
          <div class="form-group">          
              <label for="unit_price"><?php echo location_value; ?></label>
              <input class="form-control" type="text" name="unit_price" id="unit_price">
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

       


