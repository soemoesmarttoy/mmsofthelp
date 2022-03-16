<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Customer',
    'heading' => "Edit Customer"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == CustomerData::get_customer($_GET['key'])->com_id){        
    
    $customer = CustomerData::get_customer($_GET['key']);
    
    view('customer/edit', $customer);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->com_id == $_POST['com_id']){
    $id =  sanitize($_POST['id']);
    $name = sanitize($_POST['name']);  
    $phone = sanitize($_POST['phone']);  
   

    if (empty($id) || empty($name) || empty($phone)){
        $view_bag['status'] = err_fillall;
        $customer = CustomerData::get_customer($_GET['key']);
        view('customer/edit', $customer);
    }else{
            CustomerData::update_customer($id, $name, $phone);                 
            redirect('../customer');      
    }
}else{
    view('not_authorized');
}
}

?>