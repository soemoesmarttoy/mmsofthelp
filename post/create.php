<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Post',
];

if (is_get()){

    if (is_user_admin()){        

        view('post/create');

    }else{
        view('not_authorized');
    }

    
    
}

if (is_post()){
    if (is_user_admin()){
     
    $title = sanitize($_POST['title']);
    $body = $_POST['body'];
    $com_id = sanitize($_POST['com_id']);
       

    if (empty($title) || empty($body) || empty($com_id)){
        $view_bag['status'] = err_fillall;      
        view('post/create');
    }else{
        PostData::add_post($title, $body, $com_id);
        redirect('../post');
    }

    }else{
        view('not_authorized');
    }
    
}


?>