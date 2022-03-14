    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo category_list ?></h3>
        </div>
    </div>
    <?php
    if (is_user_admin()){
    ?>
    <div class="row">
        <a href="create.php"><?php echo create_category ?></a>
    </div>
    <?php
    }
    ?>
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : 
            if($item -> com_id == $view_bag["com_id"]){ ?>
            <tr>
                <td><?= $item->name ?></td>
    <?php
    if (is_user_admin()){
    ?>
                <td><a href="edit.php?key=<?= $item->id ?>" class="btn btn-outline-primary btn-sm"><?php echo edit_user ?></a></td>
                <td><a href="delete.php?key=<?= $item->id ?>" class="btn btn-outline-danger btn-sm"><?php echo del_user ?></a></td>
    <?php
    }
    ?>
            </tr>
        <?php } endforeach; ?>
        </table>

    </div>

