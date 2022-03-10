<?php
session_start();
require('app/app.php');
    $view_bag =[
        'title' => 'Home',
        'heading' => ''
    ];
    $com_id = CompanyData::get_company_by_name("MMSoftHelp")->id;
    $posts = PostData::get_posts($com_id);
    view('index', $posts);
?>