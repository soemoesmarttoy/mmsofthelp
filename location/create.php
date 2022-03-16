<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$com_id = get_company_id();

$cat_id = CategoryData::get_category_by_name(location)->id;

$view_bag =[
    'title' => 'Create Location',
    'com_id' => $com_id,
    'cat_id' => $cat_id
];

if (is_get()){

    if (is_user_admin()){        

        view('location/create');

    }else{
        view('not_authorized');
    }

    
    
}

if (is_post()){
    if (is_user_admin()){
     
    $name = sanitize($_POST['name']);
    $qty = sanitize ($_POST['qty']);
    $com_id = sanitize($_POST['com_id']);
    $cat_id = sanitize($_POST['cat_id']);
    $is_good = sanitize($_POST['is_good']);
    $unit_price = sanitize($_POST['unit_price']);
       

    if (empty($name) || empty($unit_price)){
        $view_bag['status'] = err_fillall;      
        view('location/create');
    }else{
        ItemData::add_location($name, $qty, $unit_price, $cat_id, $com_id);
        redirect('../location');
    }

    }else{
        view('not_authorized');
    }
    
}


?>