<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete User',
    'heading' => "Delete User"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == CategoryData::get_category($_GET['key'])->com_id){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $category = CategoryData::get_category($_GET['key']);
    if($category === false){
        view('not_found');
        die();
    }

    view('category/delete', $category);

}else{
    view('not_authorized');
}

}

if (is_post()){
    if (is_user_admin() && get_company_id() == CategoryData::get_category($_GET['key'])->com_id){
    $id = sanitize($_POST['key']);   

    if (empty($id)){
        //TODO: Display message
    }else{
        CategoryData::delete_category($id);
        redirect('../category');
    }
}else{
    view('not_authorized');
}
}

?>