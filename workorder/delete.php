<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete Workorder',
    'heading' => "Delete Workorder"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == ItemData::get_item($_GET['key'])->com_id){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $workorder = ItemData::get_item($_GET['key']);
    if($workorder === false){
        view('not_found');
        die();
    }

    view('workorder/delete', $workorder);

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
        redirect('../workorder');
    }
}else{
    view('not_authorized');
}
}

?>