<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Category',
    'heading' => "Edit Category"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == CategoryData::get_category($_GET['key'])->com_id){        
    
    $category = CategoryData::get_category($_GET['key']);
    
    view('category/edit', $category);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->company_id == $_POST['com_id']){
    $id =  sanitize($_POST['id']);
    $name = sanitize($_POST['name']);    
    $com_id = sanitize($_POST['com_id']);    

    if (empty($id) || empty($name) || empty($com_id)){
        $view_bag['status'] = err_fillall;
        $category = CategoryData::get_category($_GET['key']);
        view('category/edit', $category);
    }else{
            CategoryData::update_category($id, $name, $com_id);                 
            redirect('../category');      
    }
}else{
    view('not_authorized');
}
}

?>