<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$cat_id = intval($_GET['key']);
$items = ItemData::get_items_by_cat_id($cat_id);

echo "<div class='form-group'><label for='item_id'>";
echo item_cat; 
echo "</label><select class='form-select' name='item_id' id='item_id'>";
foreach($items as $item){
echo "<option value=";
$item->id;
echo ">";
$item->name;
echo "</option>";
}

echo   "</select></div>";

?>
</body>
</html>
