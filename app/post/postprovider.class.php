<?php

require ('post.class.php');
class PostProvider{

    function __construct($source){
        $this->source = $source;
    }

    public function get_posts($com_id){
        
    }

    public function get_posts_default(){
        
    }
    
    public function get_post($id){
       
    }
    
    public function search_posts($search){
     
    }
    
    public function add_post($title, $body, $com_id){
       
        }

    public function update_post($id, $title, $body, $com_id){
        
    }
    
    public function delete_post($id){
        
    }
}

?>