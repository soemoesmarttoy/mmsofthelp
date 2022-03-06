<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Post',    
];

view('post/index', PostData::get_posts(get_company_id()));

?>