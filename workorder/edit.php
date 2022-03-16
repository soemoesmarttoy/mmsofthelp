<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Work Order',
  
];

if (is_get()){


    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){        
    
    $workorder = ItemData::get_item($_GET['key']);
    
    view('workorder/edit', $workorder);

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
        $type = sanitize($_POST['type']);
        $unit_price = sanitize($_POST['unit_price']); 
   

    if (empty($id) || empty($name) || empty($unit_price) || empty($type)){
        $view_bag['status'] = err_fillall;
        $workorder = ItemData::get_item($_GET['key']);
        view('workorder/edit', $workorder);
    }else{
            ItemData::update_workorder($id, $name, $qty, $unit_price, $type);                 
            redirect('../workorder');      
    }
}else{
    view('not_authorized');
}
}

?>