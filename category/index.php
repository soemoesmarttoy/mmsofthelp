<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Category',    
];

view('category/index', CategoryData::get_categories(get_company_id()));

?>