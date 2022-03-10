<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Form',
    'heading' => "Form"
];

if (is_get()){

    if (is_user_admin()){

        $categories = CategoryData::get_categories(get_company_id());

        view('admin/createform', $categories);

    }else{
        view('not_authorized');
    }
}

if (is_post()){
    if (is_user_admin()){

    $name = sanitize($_POST['name']);
    $com_id = sanitize($_POST['com_id']);
    $title1 = sanitize($_POST['title1']);
    $title2 = sanitize($_POST['title2']);
    $title3 = sanitize($_POST['title3']);
    $title4 = sanitize($_POST['title4']);
    $title5 = sanitize($_POST['title5']);
    $title6 = sanitize($_POST['title6']);
    $title7 = sanitize($_POST['title7']);
    $title8 = sanitize($_POST['title8']);
    $title9 = sanitize($_POST['title9']);
    $title10 = sanitize($_POST['title10']);

     

    if (empty($name) || empty($com_id)){
        $view_bag['status'] = err_fillall;
        $categories = CategoryData::get_categories(get_company_id());
        view('admin/createform', $categories);
    }else{
        FormData::add_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
        $title6, $title7, $title8, $title9, $title10);
        redirect('../user/index.php');
    }

    }else{
        view('not_authorized');
    }
    
}


?>