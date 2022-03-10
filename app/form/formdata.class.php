<?php

require ('formprovider.class.php');

class FormData{

    static private $ds;
    static public function initialize(FormProvider $data_provider){
        return self::$ds = $data_provider;
    }

    static public function get_forms($com_id){
        return self::$ds->get_forms($com_id);
    }

    static public function get_form($id){
        return self::$ds->get_form($id);
    }

    static public function search_forms($search){
        return self::$ds->search_forms($search);
    }

    static public function add_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
    $title6, $title7, $title8, $title9, $title10){
        return self::$ds->add_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
        $title6, $title7, $title8, $title9, $title10);
    }

    static public function delete_form($id){
        return self::$ds->delete_form($id);
    }

    static public function update_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
    $title6, $title7, $title8, $title9, $title10, $id){
        return self::$ds->update_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
        $title6, $title7, $title8, $title9, $title10, $id);
    }

    static public function get_data(){
        return self::$ds->get_data();
    }

    static public function set_data($arr){
        return self::$ds->set_data($arr);
    }
}

?>