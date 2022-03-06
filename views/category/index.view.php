    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo category_list ?></h3>
        </div>
    </div>
    <div class="row">
        <a href="create.php"><?php echo create_category ?></a>
    </div>
    <div class="row">
        <table class="table table-striped">
        
        <?php foreach($model as $item) : ?>
            <tr>
                <td><a href="delete.php?key=<?= $item->id ?>"><?php echo del_user ?></a></td>
                <td><?= $item->name ?></td>
                <td><a href="edit.php?key=<?= $item->id ?>"><?php echo edit_user ?></a></td>
            </tr>
        <?php endforeach; ?>
        </table>

    </div>
