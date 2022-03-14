<?php

function view($name, $model= ''){ 
    global $view_bag;   
    require(APP_PATH . "views/layout.view.php");
}

function redirect($url){    
    header("Location: $url");
    die();
}

function is_post(){
    return $_SERVER['REQUEST_METHOD'] === "POST";
}

function is_get(){
    return $_SERVER['REQUEST_METHOD'] === "GET";
}

function sanitize($value){
    $temp = filter_var(trim($value), FILTER_SANITIZE_STRING);
    if($temp === false){
        return '';
    }else{
        return $temp;
    }
}

function authenticate_user($email, $password) {
    
    $user = UserData::get_user_by_email($email);

    if (!isset($user->email)) {
        return false;
    }

    $user_password = $user->password;
    
    return $password == $user_password;
}

function register_user($email, $password, $phone, $address, $com_name, $com_phone, $com_address) {

    CompanyData::add_company($com_name, $com_phone, $com_address);

    $comp_id = CompanyData::get_company_by_name($com_name)->id;

    $role = 'admin';
    
    $user = UserData::add_user($email, $password, $com_id, $role, $phone, $address);

    $success = success_reg;

    header("Location: login.php?message=".$success);
    die();  
}

function is_user_authenticated() {
    return isset($_SESSION['email']);
}

function is_user_admin() {
    $user = UserData::get_user_by_email($_SESSION['email']);
    
    return $user->role == 'admin';
}

function get_user() {
    $user = UserData::get_user_by_email($_SESSION['email']);
    
    return $user;
}

function email_exist($email) {

    $user = UserData::get_user_by_email($email);

    if($user != null ){
        return true;
    }else{
        return false;
    } 
    
}

function com_name_exist($com_name) {

    $com_name = CompanyData::get_company_by_name($com_name);

    if($com_name != null ){
        return true;
    }else{
        return false;
    }
}

function get_company_id() {
    $user = UserData::get_user_by_email($_SESSION['email']);    
    return $user->com_id;
}

function get_company_name() {  
    return CompanyData::get_company_by_id(get_company_id())->name;
}

function get_role($email) {
    $user = UserData::get_user_by_email($email);

    return $user->role;
}

function ensure_user_is_authenticated() {
    if (!is_user_authenticated()) {
      redirect('../login.php');
    }
}

?>
