<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="mt-5"><?php echo register;?></h1>
    </div>
</div>
<div>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email"><?php echo email;?></label>
            <input class="form-control" type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password"><?php echo password;?></label>
            <input class="form-control" type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password1"><?php echo confirmpassword;?></label>
            <input class="form-control" type="password" name="password1" id="password1">
        </div>
        <label for="phone"><?php echo phone;?></label>
            <input class="form-control" type="text" name="phone" id="phone">
        </div>
        <div class="form-group">
            <label for="address"><?php echo address;?></label>
            <input class="form-control" type="text" name="address" id="address">
        </div>
        <div class="form-group">
            <label for="com_name"><?php echo company_name_fill;?></label>
            <input class="form-control" type="text" name="com_name" id="com_name">
        </div>
        <div class="form-group">
            <label for="com_phone"><?php echo company_phone_fill;?></label>
            <input class="form-control" type="text" name="com_phone" id="com_phone">
        </div>
        <div class="form-group">
            <label for="com_address"><?php echo company_address_fill;?></label>
            <input class="form-control" type="text" name="com_address" id="com_address">
        </div>

        <div class="form-group">
       
        <div class="form-group">

            <input class="btn btn-outline-primary" type="submit" name="register" value="<?php echo register;?>">
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