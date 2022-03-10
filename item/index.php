<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Item',    
];

view('item/index', ItemData::get_items(get_company_id()));

?>