<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Location',
    'heading' => "Edit Location"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){        
    
    $location = ItemData::get_item($_GET['key']);
    
    view('location/edit', $location);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->com_id == $_POST['com_id']){

        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $qty = sanitize ($_POST['qty']);
        $com_id = sanitize($_POST['com_id']);
        $cat_id = sanitize($_POST['cat_id']);
        $is_good = sanitize($_POST['is_good']);
        $unit_price = sanitize($_POST['unit_price']); 
   

    if (empty($id) || empty($name) || empty($unit_price)){
        $view_bag['status'] = err_fillall;
        $location = ItemData::get_item($_GET['key']);
        view('location/edit', $location);
    }else{
            ItemData::update_item($id, $name, $qty, $unit_price, $cat_id);                 
            redirect('../location');      
    }
}else{
    view('not_authorized');
}
}

?>