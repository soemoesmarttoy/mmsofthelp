<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Category',
];

if (is_get()){

    if (is_user_admin()){
        
        $com_id = get_company_id();
        $view_bag += ['com_id' => $com_id];
        
        
        view('category/create');
    }else{
        view('not_authorized');
    }

    
    
}

if (is_post()){
    if (is_user_admin()){
        
    $name = sanitize($_POST['name']);
    $com_id = sanitize($_POST['com_id']);
      

    if (empty($name) || empty($com_id)){
        $view_bag['status'] = err_fillall;      
        view('category/create');
    }else{
        CategoryData::add_category($name, $com_id);
        redirect('../category');
    }

    }else{
        view('not_authorized');
    }
    
}


?>