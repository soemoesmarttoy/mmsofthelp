<?php

require ('itemprovider.class.php');

class ItemData{

    static private $ds;
    static public function initialize(ItemProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_items($com_id){
        return self::$ds->get_items($com_id);
    }

    static public function get_item($id){
        return self::$ds->get_item($id);
    }

    static public function search_items($search){
        return self::$ds->search_items($search);
    }

    static public function add_item($name, $qty, $unit_value, $cat_id, $com_id){
        return self::$ds->add_item($name, $qty, $unit_value, $cat_id, $com_id);
    }

    static public function delete_item($id){
        return self::$ds->delete_item($id);
    }

    static public function update_item($id, $name, $qty, $unit_value, $cat_id){
        return self::$ds->update_item($id, $name, $qty, $unit_value, $cat_id);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>