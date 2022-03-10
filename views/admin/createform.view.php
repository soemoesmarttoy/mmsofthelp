<div>
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_form;?></h3>
        </div>
    <div class="row">
        <a href="../user/formindex.php"><?php echo back;?></a>
    </div>       
    <form action="" method="POST">       
    <input type="hidden" name="com_id" value="<?= get_company_id() ?>">
    <div class="form-group">
              <label for="name"><?php echo form_name;?></label>
              <input class="form-control" type="text" name="name" id="name">
    </div>

    <?php
    for ($x = 1; $x < 11; $x++) { ?>
    
    <div class="form-group">
    <label for="title<?= $x; ?>"><?php echo choose_item;?></label>
    <select class="form-select" name="title<?= $x; ?>" id="title<?= $x; ?>">
    <option selected value=null><?php echo choose;?></option>
    <?php foreach($model as $item) : ?>
    <option value="<?= $item->name ?>"><?= $item->name ?></option>
    <?php endforeach ?>
    </select> 
    </div>
    <?php } ?>
    <div class="form-group">
              <input class="btn btn-outline-primary" type="submit" value="<?php echo create;?>">
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


