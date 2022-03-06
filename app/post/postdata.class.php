<?php

require ('postprovider.class.php');

class PostData{

    static private $ds;
    static public function initialize(PostProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_posts($com_id){
        return self::$ds->get_posts($com_id);
    }

    static public function get_post($id){
        return self::$ds->get_post($id);
    }

    static public function search_posts($search){
        return self::$ds->search_posts($search);
    }

    static public function add_post($title, $body, $com_id){
        return self::$ds->add_post($title, $body, $com_id);
    }

    static public function delete_post($id){
        return self::$ds->delete_post($id);
    }

    static public function update_post($id, $title, $body, $com_id){
        return self::$ds->update_post($id, $title, $body, $com_id);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>