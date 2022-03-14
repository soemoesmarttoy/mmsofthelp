<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Category',
    'heading' => "Edit Category"
];

if (is_get()){
    $com_id = get_company_id();
    $view_bag += ['com_id'=> $com_id];
    $category = CategoryData::get_category($_GET['key']);
    if (is_user_admin() && $com_id == $category->com_id){        
    
    
    
    view('category/edit', $category);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->com_id == $_POST['com_id']){
    $id =  sanitize($_POST['id']);
    $name = sanitize($_POST['name']);
       

    if (empty($id) || empty($name)){
        $view_bag['status'] = err_fillall;
        $category = CategoryData::get_category($_GET['key']);
        view('category/edit', $category);
    }else{
            CategoryData::update_category($id, $name);                 
            redirect('../category');      
    }
}else{
    view('not_authorized');
}
}

?>