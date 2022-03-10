<?php
    session_start();
    require('app/app.php');
    $view_bag =[
      'title' => 'Register',
      'heading' => "Welcome"
  ];
        
    if(is_user_authenticated()){
        redirect('user/');

    }
    if (is_post()){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);        
        $password = sanitize($_POST['password']);
        $password1 = sanitize($_POST['password1']);
        $phone = sanitize($_POST['phone']);
        $address = sanitize($_POST['address']);
        $com_name = sanitize($_POST['com_name']);
        $com_phone = sanitize($_POST['com_phone']);
        $com_address = sanitize($_POST['com_address']);              
      
      if (empty($email) || empty($password) || empty($password1)
        || empty($phone) || empty($address) || empty($com_name)
        || empty($com_phone) || empty($com_address)){
          $view_bag['status'] = err_fillall;
      }elseif($email == false){
            $view_bag['status'] = err_email_invalid;
      }elseif($password != $password1){
        $view_bag['status'] = err_pass;
      }elseif(email_exist($email)){
        $view_bag['status'] = err_email_exist;
      }elseif(com_name_exist($com_name)){
        $view_bag['status'] = err_com_exist;
      }else{
        register_user($email, $password, $phone, $address, $com_name, $com_phone, $com_address); 
      }    
    }
    $com_id = CompanyData::get_company_by_name("MMSoftHelp")->id;
    $posts = PostData::get_posts($com_id);

    view('register',$posts);
       
?>