<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Create Finance',
    'heading' => "Finance"
];

if (is_get()){

    if (is_user_admin()){

        $com_id = get_company_id();

        $view_bag += [ "com_id" => $com_id ];

        $categories = CategoryData::get_categories($com_id);

        view('admin/createfinance', $categories);

    }else{
        view('not_authorized');
    }
}

if (is_post()){
    if (is_user_admin()){

    $item = sanitize($_POST['item']);
    $com_id = sanitize($_POST['com_id']);
    $cat_id = sanitize($_POST['cat_id']);    
     

    if (empty($name) || empty($com_id)){
        $view_bag['status'] = err_fillall;
        $categories = CategoryData::get_categories($view_bag['com_id']);
        view('admin/createfinance', $categories);
    }else{
        FinanceData::add_finance($cat_id, $item, $fin_id, $com_id);
        redirect('../user/index.php');
    }

    }else{
        view('not_authorized');
    }
    
}


?>