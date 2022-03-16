<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Post',    
];

view('customer/index', CustomerData::get_customers(get_company_id()));

?>