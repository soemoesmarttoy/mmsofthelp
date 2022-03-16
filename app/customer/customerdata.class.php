<?php

require ('customerprovider.class.php');

class CustomerData{

    static private $ds;
    static public function initialize(CustomerProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_customers($com_id){
        return self::$ds->get_customers($com_id);
    }

    static public function get_customer($id){
        return self::$ds->get_customer($id);
    }

    static public function search_customers($search){
        return self::$ds->search_customers($search);
    }

    static public function add_customer($name, $phone, $com_id){
        return self::$ds->add_customer($name, $phone, $com_id);
    }

    static public function delete_customer($id){
        return self::$ds->delete_customer($id);
    }

    static public function update_customer($id, $name, $phone){
        return self::$ds->update_customer($id, $name, $phone);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>