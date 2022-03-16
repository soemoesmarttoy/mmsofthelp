
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user; ?></h3>
        </div>
    </div>
    <div class="row">
    <a href="../workorder">
    <?php echo back;?>
    </a>
    </div>
    
    
   <div>
       <form action="" method="POST">
          <div class="form-group">
          <input type="hidden" name="id" value="<?= $model -> id ?>">
          <input type="hidden" name="com_id" value="<?= $model -> com_id ?>">
          <input type="hidden" name="cat_id" value="<?= $model -> cat_id ?>">          
              <label for="name"><?php echo work_type_name; ?></label>
              <input class="form-control" type="text" name="name" id="name" value="<?= $model->name ?>">
          </div> 
          <div class="form-group">          
              <label for="qty"><?php echo work_type_qty; ?></label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="type" value="unit" <?php if($model->type == "unit"){ ?> checked <?php } ?>>
            <label class="form-check-label" for="type">
            <?php echo unit; ?>
            </label>
            </div>
            <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="tin" <?php if($model->type == "tin"){ ?> checked <?php } ?>>
        <label class="form-check-label" for="type">
        <?php echo tin; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="kg" <?php if($model->type == "kg"){ ?> checked <?php } ?>>
        <label class="form-check-label" for="type">
        <?php echo kg; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="vis" <?php if($model->type == "vis"){ ?> checked <?php } ?>>
        <label class="form-check-label" for="type">
        <?php echo vis; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="pound" <?php if($model->type == "pound"){ ?> checked <?php } ?>>
        <label class="form-check-label" for="type">
        <?php echo pound; ?>
        </label>
        </div>        
        </div>
          <div class="form-group">          
              <label for="unit_price"><?php echo work_type_value; ?></label>
              <input class="form-control" type="text" name="unit_price" id="unit_price" value="<?= $model -> unit_price ?>">
          </div>

          <div class="form-group">
            <label for="qty"><?php echo continue_work; ?></label>
            <select class="form-select" name='qty' id='qty'>
            <?php if($model -> qty == "0"){ ?>
            <option selected value="0"><?php echo one_stop; ?></option>
            <?php $items = ItemData::get_items_by_cat_id_with_com($model->cat_id, $model->com_id);
            foreach($items as $item) : ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach; ?>
            </select>
            </div>
            <?php }else{             
            $items = ItemData::get_items_by_cat_id_with_com($model->cat_id, $model->com_id);
            foreach($items as $item) :
            if($item->id == $model->qty){ ?>
            <option selected value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php }else{?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php } ?>
            <?php endforeach; ?>
            <option value="0"><?php echo one_stop; ?></option>
            </select>
            </div>
            <?php } ?>
          
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

       


