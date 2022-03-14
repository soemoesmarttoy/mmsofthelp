<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Admin Area',
    'heading' => "Users List"
];

view('user/index', UserData::get_users(get_user()->com_id));

?>