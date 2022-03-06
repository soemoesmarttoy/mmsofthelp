<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete User',
    'heading' => "Delete User"
];

if (is_get()){
    if (is_user_admin() && get_role($_GET['email']) != "admin"){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $user = UserData::get_user_by_email($_GET['email']);
    if($user === false || $user->company_id != get_user()->company_id){
        view('not_found');
        die();
    }

    view('admin/deleteuser', $user);

}else{
    view('not_authorized');
}

}

if (is_post()){
    if (is_user_admin() && get_role($_GET['email']) != "admin"){
    $id = sanitize($_POST['id']);   

    if (empty($id)){
        //TODO: Display message
    }else{
        UserData::delete_user($id);
        redirect('../user/index.php');
    }
}else{
    view('not_authorized');
}
}

?>