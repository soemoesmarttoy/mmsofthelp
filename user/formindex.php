<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => '',
    'heading' => ''
];

view('user/formindex', FormData::get_forms(get_user()->company_id));

?>