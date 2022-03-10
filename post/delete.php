<?php
session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Delete Post',
    'heading' => "Delete Post"
];

if (is_get()){
    if (is_user_admin() && get_company_id() == PostData::get_post($_GET['key'])->com_id){
    $key = sanitize($_GET['key']);
    if(empty($key)){
        view('not_found');
        die();
    }

    $post = PostData::get_post($_GET['key']);
    if($post === false){
        view('not_found');
        die();
    }

    view('post/delete', $post);

}else{
    view('not_authorized');
}

}

if (is_post()){
    if (is_user_admin() && get_company_id() == PostData::get_post($_GET['key'])->com_id){
    $id = sanitize($_POST['key']);   

    if (empty($id)){
        //TODO: Display message
    }else{
        PostData::delete_post($id);
        redirect('../post');
    }
}else{
    view('not_authorized');
}
}

?>