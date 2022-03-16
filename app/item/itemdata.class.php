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

    static public function get_items_by_cat_id($cat_id){
        return self::$ds->get_items_by_cat_id($cat_id);
    }

    static public function  get_items_by_cat_id_with_com($cat_id, $com_id){
        return self::$ds-> get_items_by_cat_id_with_com($cat_id, $com_id);
    }

    static function get_locations($com_id, $cat_id){
        return self::$ds->get_locations($com_id, $cat_id);
    }

    static public function get_item($id){
        return self::$ds->get_item($id);
    }

    static public function search_items($search){
        return self::$ds->search_items($search);
    }

    static public function add_item($name, $qty, $unit_price, $cat_id, $com_id){
        return self::$ds->add_item($name, $qty, $unit_price, $cat_id, $com_id);
    }

    static public function add_location($name, $qty, $unit_price, $cat_id, $com_id){
        return self::$ds->add_location($name, $qty, $unit_price, $cat_id, $com_id);
    }

    static public function add_workorder($name, $qty, $unit_price, $cat_id, $com_id, $type){
        return self::$ds->add_workorder($name, $qty, $unit_price, $cat_id, $com_id, $type);
    }

    static public function delete_item($id){
        return self::$ds->delete_item($id);
    }

    static public function update_item($id, $name, $qty, $unit_price, $cat_id){
        return self::$ds->update_item($id, $name, $qty, $unit_price, $cat_id);
    }

    static public function update_workorder($id, $name, $qty, $unit_price, $type){
        return self::$ds->update_workorder($id, $name, $qty, $unit_price, $type);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>