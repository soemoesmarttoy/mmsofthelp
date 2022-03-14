<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =[
    'title' => 'Edit Company',
    'heading' => "Edit Company"
];

if (is_get()){
    if (is_user_admin()){
    
    $company = CompanyData::get_company_by_id(get_user()->com_id);
    
    view('company/editcompany', $company);

}else{
    view('not_authorized');
}

}

if (is_post()){

    if (is_user_admin() && get_user()->com_id == $_POST['id']){
    $id =  sanitize($_POST['id']);
    $name = sanitize($_POST['name']);    
    $phone = sanitize($_POST['phone']);
    $address = sanitize($_POST['address']);

    if (empty($id) || empty($name) || empty($phone) || empty($address)){
        $view_bag['status'] = err_fillall;
        $company = CompanyData::get_company_by_id(get_user()->com_id);
        view('company/editcompany', $company);
    }elseif(com_name_exist($name) && $name != CompanyData::get_company_by_id($id)->name){        
            $view_bag['status'] = err_com_exist;            
            $company = CompanyData::get_company_by_id(get_user()->com_id);
            view('company/editcompany', $company);
    }else{
            CompanyData::update_company($id, $name, $phone, $address);                 
            redirect('../company');      
    }
}else{
    view('not_authorized');
}
}

?>