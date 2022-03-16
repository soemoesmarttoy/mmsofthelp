<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$com_id = get_company_id();

$view_bag =[
    'title' => 'Create Post',
    'com_id' => $com_id
];

if (is_get()){

    if (is_user_admin()){        

        view('customer/create');

    }else{
        view('not_authorized');
    }

    
    
}

if (is_post()){
    if (is_user_admin()){
     
    $name = sanitize($_POST['name']);
    $phone = $_POST['phone'];
    $com_id = sanitize($_POST['com_id']);
       

    if (empty($name) || empty($com_id)){
        $view_bag['status'] = err_fillall;      
        view('customer/create');
    }else{
        CustomerData::add_customer($name, $phone, $com_id);
        redirect('../customer');
    }

    }else{
        view('not_authorized');
    }
    
}


?>