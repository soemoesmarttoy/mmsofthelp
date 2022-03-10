    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo edit_user ?></h3>
        </div>
    </div>

    <div class="row">
    <a href="../post">
    <?php echo back;?>
    </a>
    </div>
    
   <div>
       <form action="" method="POST">
           <input type="hidden" name="id" value="<?= $model->id ?>">
           <input type="hidden" name="com_id" value="<?= $model->com_id ?>">
          <div class="form-group">
              <label for="title"><?php echo post_title ?></label>
              <input class="form-control" type="text" name="title" id="title" value="<?= $model->title ?>">
          </div>
          <div class="form-group">
              <label for="body"><?php echo post_body ?></label>
              <input class="form-control" type="text" name="body" id="body" value="<?= $model->body ?>">
          </div>        
          <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" value="<?php echo edit_user;?>">
          </div>  
       </form>
   </div>

