<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo company_about;?></h3>
        </div>
    </div>
    <?php
                    if (is_user_admin()){
                ?>
                    <div class="row">
                    <a href="../company/editcompany.php">Edit Company</a>
                    </div>
                <?php
                    }
                ?>                
    

        <div class="form-group">
            <label><?php echo company_name;?></label>
            <h4><?php echo $model->name; ?></h4>
        </div>
        <div class="form-group">
            <label><?php echo company_phone;?></label>
            <h4><?php echo $model->phone; ?></h4>
        </div>
        <div class="form-group">
            <label><?php echo company_address;?></label>
            <h4><?php echo $model->address; ?></h4>
        </div>

    
    </div>

    