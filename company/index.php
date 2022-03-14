<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();



$view_bag =[
    'title' => 'Company',    
];

$user  = UserData::get_user_by_email($_SESSION['email']);
view('company/index', CompanyData::get_company_by_id($user -> com_id));

?>