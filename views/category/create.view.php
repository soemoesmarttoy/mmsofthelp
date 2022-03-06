    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo create_category; ?></h3>
        </div>
    </div>
    
   <div>
       <form action="" method="POST">
          <div class="form-group">
          <input type="hidden" name="com_id" value="<?= get_company_id() ?>">
              <label for="name"><?php echo category_name; ?></label>
              <input class="form-control" type="text" name="name" id="name">
          </div>          
          <div class="form-group">
          <input class="btn btn-outline-primary" type="submit" value="<?php echo submit;?>">
          </div>  
       </form>
   </div>

