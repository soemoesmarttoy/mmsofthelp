<?php

require ('operatorprovider.class.php');

class OperatorData{

    static private $ds;
    static public function initialize(OperatorProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_operators($com_id){
        return self::$ds->get_operators($com_id);
    }

    static public function get_operator($id){
        return self::$ds->get_operator($id);
    }

    static public function search_operators($search){
        return self::$ds->search_operators($search);
    }

    static public function add_operator($cat_id, $name, $opr_id, $com_id){
        return self::$ds->add_operator($cat_id, $name, $opr_id, $com_id);
    }

    static public function delete_operator($id){
        return self::$ds->delete_operator($id);
    }

    static public function update_operator($id, $cat_id, $name, $opr_id, $com_id){
        return self::$ds->update_operator($id, $cat_id, $name, $opr_id, $com_id);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>