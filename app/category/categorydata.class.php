<?php

require ('categoryprovider.class.php');

class CategoryData{

    static private $ds;
    static public function initialize(CategoryProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_categories($com_id){
        return self::$ds->get_categories($com_id);
    }

    static public function get_categories_default(){
        return self::$ds->get_categories_default();
    }

    static public function get_category_by_name($name){
        return self::$ds->get_category_by_name($name);
    }

    static public function get_category($id){
        return self::$ds->get_category($id);
    }

    static public function search_categories($search){
        return self::$ds->search_categories($search);
    }

    static public function add_category($name, $com_id){
        return self::$ds->add_category($name, $com_id);
    }

    static public function delete_category($id){
        return self::$ds->delete_category($id);
    }

    static public function update_category($id, $name){
        return self::$ds->update_category($id, $name);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>