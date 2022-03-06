<?php

require ('company.class.php');
class CompanyProvider{

    function __construct($source){
        $this->source = $source;
    }

    public function get_companies(){
        
    }
    
    public function get_company_by_name($com_name){
       
    }

    public function get_company_by_id($com_id){
       
    }
    
    public function search_companies($search){
     
    }
    
    public function add_company($name, $phone, $address){
       
        }
    
    public function update_company($id, $name, $phone, $address){
        
    }
    
    public function delete_company($id){
        
    }
}

?>