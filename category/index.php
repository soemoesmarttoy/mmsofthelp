<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Category',    
];

$com_id = get_company_id();

$view_bag += ['com_id' => $com_id];

view('category/index', CategoryData::get_categories($com_id));

?>