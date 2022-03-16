<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$com_id = get_company_id();

$cat_id = CategoryData::get_category_by_name(work_type)->id;

$view_bag =[
    'title' => 'Create Work Order',
    'com_id' => $com_id,
    'cat_id' => $cat_id
];

if (is_get()){

    if (is_user_admin()){        

        view('workorder/create');

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
    $type = sanitize($_POST['type']);
    $unit_price = sanitize($_POST['unit_price']);
       

    if (empty($name) || empty($unit_price) || empty($type) ){
        $view_bag['status'] = err_fillall;      
        view('workorder/create');
    }else{
        ItemData::add_workorder($name, $qty, $unit_price, $cat_id, $com_id, $type);
        redirect('../workorder');
    }

    }else{
        view('not_authorized');
    }
    
}


?>