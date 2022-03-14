    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo item_list; ?></h3>
        </div>
    </div>
    <?php
    if (is_user_admin()){
    ?>
        <div class="row">
        <a href="create.php"><?php echo create_item; ?></a>
        </div>
    <?php
    }
    ?>  
    
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : ?>
            <tr>    
                <td><?= $item->name ?></td>
                <td><?= $item->qty ?></td>
                <td><?= $item->unit_price ?></td>
                <td>
                <?php $category = CategoryData::get_category($item->cat_id);
                if($category) {?>
                <?=$category->name ?>
                <?php 
                } 
                ?>
                </td>
                <?php
    if (is_user_admin()){
    ?>
                <td><a class="btn btn-outline-primary btn-sm" href="edit.php?key=<?= $item->id ?>"><?php echo edit_user ?></a></td>
                <td><a class="btn btn-outline-danger btn-sm" href="delete.php?key=<?= $item->id ?>"><?php echo del_user ?></a></td>
                <?php
    }
    ?> 
            </tr>
        <?php endforeach; ?>
        </table>

    </div>

