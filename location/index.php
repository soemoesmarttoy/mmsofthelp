<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$com_id = get_company_id();

$cat_id = CategoryData::get_category_by_name(location)->id;

$location = ItemData::get_locations($com_id, $cat_id);

$view_bag =[
    'title' => 'Location'   
];

view('location/index', $location);

?>