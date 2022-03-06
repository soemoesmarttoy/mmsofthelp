<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo users_list;?></h3>
        </div>
    </div>
    <?php
                    if (is_user_admin()){
                ?>
                    <div class="row">
                    <a href="../admin/createuser.php"><?php echo create_user;?></a>
                    </div>
                <?php
                    }
                ?> 
    
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : ?>
            <tr>
                <?php
                    if (is_user_admin()){
                ?>
                    <td><a href="../admin/deleteuser.php?key=<?= $item->id ?>&email=<?= $item->email ?>"><?php echo del_user;?></a></td>
                <?php
                    }else{
                ?>
                    <td><?php echo del_user;?></td>
                <?php
                }
                ?>             
                <td><?= $item->email ?></td>
                <td><?= $item->role ?></td>
                <td><?= $item->phone ?></td>
                <td><?= $item->address ?></td>
                
                <?php
                    if (is_user_admin() || $item->email == $_SESSION['email']){
                ?>
                    <td><a href="../admin/edituser.php?key=<?= $item->email ?>"><?php echo edit_user;?></a></td>
                    <?php
                    }else{
                ?>
                    <td>Edit</td>
                <?php
                }
                ?>   

                
            </tr>
        <?php endforeach; ?>
        </table>

    </div>