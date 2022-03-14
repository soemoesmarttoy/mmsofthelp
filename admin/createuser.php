<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Users',
    'heading' => "Users"
];

if (is_get()){

    if (is_user_admin()){

        $user = UserData::get_user_by_email($_SESSION['email']);

        view('admin/createuser', $user);

    }else{
        view('not_authorized');
    }

    
    
}

if (is_post()){
    if (is_user_admin()){

    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $com_id = sanitize($_POST['com_id']);
    $role = sanitize($_POST['role']);
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);

    

    if (empty($email) || empty($password) || empty($com_id)
    || empty($role) || empty($phone) || empty($address)){
        $view_bag['status'] = err_fillall;
        $user = UserData::get_user_by_email($_SESSION['email']);
        view('admin/createuser', $user);
    }elseif (email_exist($email)){

        $view_bag['status'] = err_email_exist;
        $user = UserData::get_user_by_email($_SESSION['email']);
        view('admin/createuser', $user);

    }else{
        UserData::add_user($email, $password, $com_id, $role, $phone, $address);
        redirect('../user/index.php');
    }

    }else{
        view('not_authorized');
    }
    
}


?>