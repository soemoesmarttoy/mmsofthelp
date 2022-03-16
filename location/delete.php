<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete Location',
    'heading' => "Delete Location"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $location = ItemData::get_item($_GET['key']);
    if($location === false){
        view('not_found');
        die();
    }

    view('location/delete', $location);

}else{
    view('not_authorized');
}

}

if (is_post()){
    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){
    $id = sanitize($_POST['key']);   

    if (empty($id)){
        //TODO: Display message
    }else{
        ItemData::delete_item($id);
        redirect('../location');
    }
}else{
    view('not_authorized');
}
}

?>