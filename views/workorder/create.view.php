
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_work_type; ?></h3>
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
          <input type="hidden" name="com_id" value="<?= $view_bag['com_id']; ?>">
          <input type="hidden" name="cat_id" value="<?= $view_bag['cat_id']; ?>">          
              <label for="name"><?php echo work_type_name; ?></label>
              <input class="form-control" type="text" name="name" id="name">
          </div> 
          <div class="form-group">          
              <label for="qty"><?php echo work_type_qty; ?></label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="type" value="unit" checked>
            <label class="form-check-label" for="type">
            <?php echo unit; ?>
            </label>
            </div>
            <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="tin">
        <label class="form-check-label" for="type">
        <?php echo tin; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="kg">
        <label class="form-check-label" for="type">
        <?php echo kg; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="vis">
        <label class="form-check-label" for="type">
        <?php echo vis; ?>
        </label>
        </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="type" id="type" value="pound">
        <label class="form-check-label" for="type">
        <?php echo pound; ?>
        </label>
        </div>        
        </div>
          <div class="form-group">          
              <label for="unit_price"><?php echo work_type_value; ?></label>
              <input class="form-control" type="text" name="unit_price" id="unit_price">
          </div>

          <div class='form-group'>
            <label for='qty'><?php echo continue_work; ?></label>
            <!-- State dropdown -->
            <select class='form-select' name='qty' id='qty'>
            <option value='0'><?php echo one_stop; ?></option>
            <?php
            $items = ItemData::get_items_by_cat_id_with_com($view_bag['cat_id'], $view_bag['com_id']);
            foreach($items as $item) :
            ?>
            <option value='<?= $item->id ?>'><?= $item->name ?></option>

            <?php
            endforeach;
            ?>

            </select>
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

       


