<?php
session_start();
require('app/app.php');
    $view_bag =[];
    $com_id = CompanyData::get_company_by_name("MMSoftHelp")->id;
    $posts = PostData::get_posts($com_id);

    $title = $posts[0] -> title;
    $body = $posts[0] -> body;

    $view_bag += ['title' => $title];
    $view_bag += ['body' => $body];

    view('detail');
?>