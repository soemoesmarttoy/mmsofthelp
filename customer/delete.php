<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete Customer',
    'heading' => "Delete Customer"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == CustomerData::get_customer($_GET['key'])->com_id){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $customer = CustomerData::get_customer($_GET['key']);
    if($customer === false){
        view('not_found');
        die();
    }

    view('customer/delete', $customer);

}else{
    view('not_authorized');
}

}

if (is_post()){
    if (is_user_admin() && get_company_id() == CustomerData::get_customer($_GET['key'])->com_id){
    $id = sanitize($_POST['key']);   

    if (empty($id)){
        //TODO: Display message
    }else{
        CustomerData::delete_customer($id);
        redirect('../customer');
    }
}else{
    view('not_authorized');
}
}

?>