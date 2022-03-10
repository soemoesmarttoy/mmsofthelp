<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo forms;?></h3>
        </div>
    </div>
    <?php
                    if (is_user_admin()){
                ?>
                    <div class="row">
                    <a href="../admin/createform.php"><?php echo create_form;?></a>
                    </div>
                <?php
                    }
                ?> 
    
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : ?>
            <tr>            
                <td><?= $item->name ?></td>      
                
                <?php
                    if (is_user_admin()){
                ?>
                    <td><a href="../user/forminput.php?key=<?= $item->id ?> ?>" class="btn btn-outline-success btn-sm"><?php echo submit;?></a></td>
                    <td><a href="../admin/editform.php?key=<?= $item->id ?>" class="btn btn-outline-primary btn-sm"><?php echo edit_user;?></a></td>
                    <td><a href="../admin/deleteform.php?key=<?= $item->id ?> ?>" class="btn btn-outline-danger btn-sm"><?php echo del_user;?></a></td>
                    
                    <?php
                    }else{
                ?>
                    <td><a href="../user/forminput.php?key=<?= $item->id ?> ?>" class="btn btn-outline-success btn-sm"><?php echo submit;?></a></td>
                    <td><?php echo edit_user;?></td>
                    <td><?php echo del_user;?></td>
                    
                <?php
                }
                ?>   

                
            </tr>
        <?php endforeach; ?>
        </table>

    </div>