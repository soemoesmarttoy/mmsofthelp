<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Category',
    'heading' => "Edit Category"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == PostData::get_post($_GET['key'])->com_id){        
    
    $post = PostData::get_post($_GET['key']);
    
    view('post/edit', $post);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->company_id == $_POST['com_id']){
    $id =  sanitize($_POST['id']);
    $title = sanitize($_POST['title']);  
    $body = sanitize($_POST['body']);  
    $com_id = sanitize($_POST['com_id']);    

    if (empty($id) || empty($title) || empty($body) || empty($com_id)){
        $view_bag['status'] = err_fillall;
        $post = PostData::get_post($_GET['key']);
        view('post/edit', $post);
    }else{
            PostData::update_post($id, $title, $body, $com_id);                 
            redirect('../post');      
    }
}else{
    view('not_authorized');
}
}

?>