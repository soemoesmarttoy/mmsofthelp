<?php
session_start();
require('app/app.php');
  if(!empty($_GET['message'])) {
  $message = $_GET['message'];    
    $view_bag =[
      'title' => 'Login',
      'heading' => "Welcome",
      'message' => $message
  ];
}else{  
    $view_bag =[
      'title' => 'Login',
      'heading' => "Welcome",
  ];
}       
    if(is_user_authenticated()){
        redirect('admin/');

    }
    if (is_post()){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = sanitize($_POST['password']);

        // compare with data store
      if (authenticate_user($email, $password)) {
        $_SESSION['email'] = $email;
        redirect('user/index.php');

      } else {
        $view_bag['status'] = "The provided crendentials didn't not work";
      }
        
        if($email == false){
            $view_bag['status'] = "Please enter a valid email address";
        }
    } 

    $com_id = CompanyData::get_company_by_name("MMSoftHelp")->id;
    $posts = PostData::get_posts($com_id);
    

    view('login',$posts);    
       
?>