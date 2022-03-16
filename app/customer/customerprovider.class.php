<?php

require ('customer.class.php');
class CustomerProvider{

    function __construct($source){
        $this->source = $source;
    }

    public function get_customers($com_id){
        
    }
    
    public function get_customer($id){
       
    }
    
    public function search_customers($search){
     
    }
    
    public function add_customer($name, $phone, $com_id){
       
        }

    public function update_customer($id, $name, $phone){
        
    }
    
    public function delete_customer($id){
        
    }
}

?>