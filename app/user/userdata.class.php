<?php

require ('userprovider.class.php');

class UserData{

    static private $ds;
    static public function initialize(UserProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_users($company_id){
        return self::$ds->get_users($company_id);
    }

    static public function get_user_by_email($email){
        return self::$ds->get_user_by_email($email);
    }

    static public function get_user_by_id($id){
        return self::$ds->get_user_by_id($id);
    }

    static public function search_users($search){
        return self::$ds->search_users($search);
    }

    static public function add_user($email, $password, $company_id, $role, $phone, $address){
        return self::$ds->add_user($email, $password, $company_id, $role, $phone, $address);
    }

    static public function delete_user($id){
        return self::$ds->delete_user($id);
    }

    static public function update_user($id, $email, $password, $company_id, $role, $phone, $address){
        return self::$ds->update_user($id, $email, $password, $company_id, $role, $phone, $address);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>