<?php

require ('item.class.php');
class ItemProvider{

    function __construct($source){
        $this->source = $source;
    }

    public function get_items($com_id){
        
    }

    public function get_items_by_cat_id($cat_id){
        
    }

    public function get_items_by_cat_id_with_com($cat_id, $com_id){

    }

    public function get_locations($com_id, $cat_id){
        
    }
    
    public function get_item($id){
       
    }
    
    public function search_posts($search){
     
    }
    
    public function add_item($name, $qty, $unit_price, $cat_id, $com_id){
       
        }

    public function add_location($name, $qty, $unit_price, $cat_id, $com_id){
        
    }

    public function add_workorder($name, $qty, $unit_price, $cat_id, $com_id, $type){
        
    }

    public function update_item($id, $name, $qty, $unit_price, $cat_id){
        
    }

    public function update_workorder($id, $name, $qty, $unit_price, $type){

    }
    
    public function delete_item($id){
        
    }
}

?>