    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_item; ?></h3>
        </div>
    </div>
    
   <div>
       <form action="" method="POST">
       <div class="form-group">
          <input type="hidden" name="com_id" value="<?= get_company_id() ?>">
              <label for="name"><?php echo item_name; ?></label>
              <input class="form-control" type="text" name="name" id="name">
          </div>
       <div class="form-group">
        <label for="cat_id"><?php echo item_cat; ?></label>
        <select class="form-select" name='cat_id' id='cat_id'>
            <option selected value="0"><?php echo item_cat_null; ?></option>
            <?php 
            
            foreach($model as $item) :
            ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="form-group">
              <label for="qty"><?php echo item_qty; ?></label>
              <input class="form-control" type="text" name="qty" id="qty">
          </div>
          <div class="form-group">
              <label for="unit_price"><?php echo item_unit_value; ?></label>
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

