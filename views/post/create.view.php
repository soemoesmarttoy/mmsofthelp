
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_post; ?></h3>
        </div>
    </div>
    
   <div>
       <form action="" method="POST">
          <div class="form-group">
          <input type="hidden" name="com_id" value="<?= get_company_id() ?>">
              <label for="title"><?php echo post_title; ?></label>
              <input class="form-control" type="text" name="title" id="title">
          </div> 
          <div class="form-group">          
              <label for="body"><?php echo post_body; ?></label>
              <textarea class="form-control" aria-label="With textarea" name="body" id="body"></textarea>
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

       


