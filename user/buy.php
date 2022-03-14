<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Admin Area',
    'heading' => "Users List"
];

$com_id = get_company_id();

$view_bag += ['com_id' => $com_id];

$categories = CategoryData::get_categories($com_id);

if(is_get()){
    view('user/buy', $categories);
}
   

