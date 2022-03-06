<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit User',
    'heading' => "Edit User"
];

if (is_get()){
    if (is_user_admin() || $_GET['key']==get_user()->email){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }
    $user = UserData::get_user_by_email($key);
    if($user == false || $user->company_id != get_user()->company_id){
        view('not_found');
        die();
    }
    view('admin/edituser', $user);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() || $_POST['email']==get_user()->email){
    $id =  sanitize($_POST['id']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $company_id = sanitize($_POST['company_id']);
    $role = sanitize($_POST['role']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);

    if (empty($id) || empty($email) || empty($password) || empty($company_id)
    || empty($role) || empty($phone) || empty($address)){
        $view_bag['status'] = err_fillall;
        $user = UserData::get_user_by_email($_GET['key']);
        view('admin/edituser', $user);
    }elseif(email_exist($email) && $email != UserData::get_user_by_id($id)->email){
        
            $view_bag['status'] = err_email_exist;
            $user = UserData::get_user_by_email($_GET['key']);
            view('admin/edituser', $user);
    }else{
            UserData::update_user($id, $email, $password, $company_id, $role, $phone, $address);
            if (!is_user_admin()){
                $_SESSION['email'] = $email;
            }        
            redirect('../user/index.php');      
    }
}else{
    view('not_authorized');
}
}

?>