    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo del_user;?></h3>
        </div>
    </div>
    <div class="row">
    <a href="../workorder">
    <?php echo back;?>
    </a>
    </div>
    <div class="row">
        <?= $model->name ?><?php echo are_you_sure; ?>

    </div>
    
   <div>
       <form action="" method="POST">
          <input type="hidden" name="key" value="<?= $model->id ?>">  
          <div class="form-group">
          <div class="form-group">
              <input class="btn btn-outline-danger" type="submit" value="<?php echo del_user;?>">
          </div>  
          </div>  
       </form>
   </div>

