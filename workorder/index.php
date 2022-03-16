<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$com_id = get_company_id();

$cat_id = CategoryData::get_category_by_name(work_type)->id;

$work_types = ItemData::get_items_by_cat_id_with_com($cat_id, $com_id);

$view_bag =[
    'title' => 'Work Order'   
];

view('workorder/index', $work_types);

?>