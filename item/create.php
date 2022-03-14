<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Item',
];

if (is_get()){

    if (is_user_admin()){ 
        $com_id = get_company_id();
        $view_bag += ['com_id' => $com_id];
        $categories = CategoryData::get_categories($com_id);
        view('item/create', $categories);
    }else{
        view('not_authorized');
    }
}

if (is_post()){
    if (is_user_admin()){
     
    $name = sanitize($_POST['name']);
    $qty = sanitize($_POST['qty']);
    $unit_price = sanitize($_POST['unit_price']);
    $cat_id = sanitize($_POST['cat_id']);
    $com_id = sanitize($_POST['com_id']);    

    if (empty($name)){
        $view_bag['status'] = err_fillall;      
        view('item/create');
    }else{
        ItemData::add_item($name, $qty, $unit_price, $cat_id, $com_id);
        redirect('../item');
    }

    }else{
        view('not_authorized');
    }
    
}


?>