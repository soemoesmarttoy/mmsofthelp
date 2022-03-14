<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Item',
    'heading' => "Edit Item"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){        
    
    $item = ItemData::get_item($_GET['key']);
    
    view('item/edit', $item);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->com_id == $_POST['com_id']){
    $id =  sanitize($_POST['id']);
    $name = sanitize($_POST['name']);  
    $qty = sanitize($_POST['qty']); 
    $unit_price = sanitize($_POST['unit_price']);  
    $com_id = sanitize($_POST['com_id']); 
    $cat_id = sanitize($_POST['cat_id']);
    if (empty($id) || empty($name)){
        $view_bag['status'] = err_fillall;
        $item = ItemData::get_item($_GET['key']);
        view('item/edit', $item);
    }else{
            ItemData::update_item($id, $name, $qty, $unit_price, $cat_id);                 
            redirect('../item');      
    }
}else{
    view('not_authorized');
}
}

?>