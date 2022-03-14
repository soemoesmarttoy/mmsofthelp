    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user ?></h3>
        </div>
    </div>

    <div class="row">
    <a href="../item">
    <?php echo back;?>
    </a>
    </div>
    
   <div>
       <form action="" method="POST">
           <input type="hidden" name="id" value="<?= $model->id ?>">
           <input type="hidden" name="com_id" value="<?= $model->com_id ?>">
          <div class="form-group">
              <label for="name"><?php echo item_name; ?></label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $model->name ?>">
          </div>
          <div class="form-group">
            <label for="cat_id"><?php echo item_cat; ?></label>
            <select class="form-select" name='cat_id' id='cat_id'>
            <?php 
            $items = CategoryData::get_categories(get_company_id());
            foreach($items as $item) :
            ?>
            <?php if($item->id == $model->cat_id){ ?>
            <option selected value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php }else{?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php } ?>
            <?php endforeach; ?>
            </select>
            </div>     
        
          <div class="form-group">
              <label for="qty"><?php echo item_qty; ?></label>
              <input class="form-control" type="text" name="qty" id="qty" value="<?= $model->qty ?>">
          </div>   
          <div class="form-group">
              <label for="unit_price"><?php echo item_unit_value; ?></label>
              <input class="form-control" type="text" name="unit_price" id="unit_price" value="<?= $model->unit_price ?>">
          </div>  
          <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" value="<?php echo edit_user;?>">
          </div>  
       </form>
   </div>

