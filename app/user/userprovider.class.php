<?php

require ('user.class.php');
class UserProvider{

    function __construct($source){
        $this->source = $source;
    }

    public function get_users($company_id){
        
    }
    
    public function get_user_by_email($email){
       
    }

    public function get_user_by_id($id){
       
    }
    
    public function search_users($search){
     
    }
    
    public function add_user($email, $password, $company_id, $role, $phone, $address){
       
        }
    
    public function update_user($id, $email, $password, $company_id, $role, $phone, $address){
        
    }
    
    public function delete_user($id){
        
    }
}

?>