<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Admin Area',
    'heading' => "Users List"
];


$user  = UserData::get_user_by_email($_SESSION['email']);

view('user/index', UserData::get_users($user->company_id));

?>