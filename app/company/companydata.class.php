<?php

require ('companyprovider.class.php');

class CompanyData{

    static private $ds;
    static public function initialize(CompanyProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_companies(){
        return self::$ds-> get_companies();
    }

    static public function get_company_name($com_name){
        return self::$ds->get_company_name($com_name);
    }

    static public function get_company_by_name($com_name){
        return self::$ds->get_company_by_name($com_name);
    }

    static public function get_company_by_id($com_id){
        return self::$ds->get_company_by_id($com_id);
    }

    static public function search_companies($search){
        return self::$ds->search_companies($search);
    }

    static public function add_company($com_name, $com_phone, $com_address){
        return self::$ds->add_company($com_name, $com_phone, $com_address);
    }

    static public function delete_company($id){
        return self::$ds->delete_company($id);
    }

    static public function update_company($id, $name, $phone, $address){
        return self::$ds->update_company($id, $name, $phone, $address);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>