    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo work_type; ?></h3>
        </div>
    </div>
    <?php
    if (is_user_admin()){
    ?>
        <div class="row">
        <a href="create.php"><?php echo create_work_type; ?></a>
        </div>
    <?php
    }
    ?>  
    
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : ?>
            <tr>
                <td><?= $item->name ?></td>
                <td><?= $item->type ?></td>
                <td><?= $item->unit_price ?></td>
                <td><?= $item->qty ?></td>
                <?php
    if (is_user_admin()){
    ?>
                <td><a href="edit.php?key=<?= $item->id ?>" class="btn btn-outline-primary btn-sm" ><?php echo edit_user ?></a></td>
                <td><a href="delete.php?key=<?= $item->id ?>" class="btn btn-outline-danger btn-sm"><?php echo del_user ?></a></td>
                <?php
    }
    ?> 
            </tr>
        <?php endforeach; ?>
        </table>

    </div>

