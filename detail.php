<?php
session_start();
require('app/app.php');   

    if(!empty($_GET['key'])) {
                
        $post = PostData::get_post($_GET['key']);
        $com_id = $post -> com_id;
        $posts = PostData::get_posts($com_id);
        $post_title = $post -> title;
        $post_body = $post -> body;

        $view_bag =[
            'title' => $post_title ,
            'body' => $post_body ,
            'key' => $_GET['key']
        ];

    view('detail', $posts); 
    }else{
        redirect('../index.php');
    }
?>