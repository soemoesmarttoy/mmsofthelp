<?php

class MySqlFormProvider extends FormProvider{

    public function get_forms($com_id){
        return $this -> query('SELECT * FROM forms WHERE com_id = :com_id', [
            ':com_id' => $com_id
        ]);               
    }
    
    public function get_form($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM forms WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Form');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_post($serach){       
       
        return $this->query('SELECT * FROM forms WHERE name = :search OR com_id LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
    $title6, $title7, $title8, $title9, $title10){

        $this -> execute('INSERT INTO forms (name, com_id, title1, title2, title3, title4, title5,
        title6, title7, title8, title9, title10) VALUES (:name, :com_id, :title1, :title2, :title3, :title4, :title5,
    :title6, :title7, :title8, :title9, :title10)',
        [
            ':name' => $name,
            ':com_id' => $com_id,
            ':title1' => $title1,
            ':title2' => $title2,
            ':title3' => $title3,
            ':title4' => $title4,
            ':title5' => $title5,
            ':title6' => $title6,
            ':title7' => $title7,
            ':title8' => $title8,
            ':title9' => $title9,
            ':title10' => $title10
        ]);       
        }
    
    public function update_form($name, $com_id, $title1, $title2, $title3, $title4, $title5,
    $title6, $title7, $title8, $title9, $title10, $id){

        $this -> execute('UPDATE forms SET name = :name, com_id = :com_id, title1 = :title1,
        title2 = :title2, title3 = :title3, title4 = :title4, title5 = :title5, title6 = :title6,
        title7 = :title7, title8 = :title8, title9 = :title9, title10 = :title10
        WHERE id = :id',
        [
            ':name' => $name,
            ':com_id' => $com_id,
            ':title1' => $title1,
            ':title2' => $title2,
            ':title3' => $title3,
            ':title4' => $title4,
            ':title5' => $title5,
            ':title6' => $title6,
            ':title7' => $title7,
            ':title8' => $title8,
            ':title9' => $title9,
            ':title10' => $title10,
            ':id' => $id
        ]);        
    }
    
    public function delete_form($id){

        $this -> execute('DELETE FROM forms WHERE id = :id',
        [':id' => $id]);      
        
    }

    private function execute($sql, $sql_params = []){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        
        $smt = $db->prepare($sql);

        $smt -> execute($sql_params);

        $smt = null;
        $db = null; 

    }

    private function query($sql, $sql_params = []){
        
        $db = $this->connect();
       
        if ($db == null){
            return [];
        }

        $query = null;

        if (empty($sql_params)){
            $query = $db->query($sql);
        }else{
            $query = $db-> prepare($sql);
            $query -> execute($sql_params);
        }        

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Form');
        $query = null;
        $db = null; 

        return $data;
    }

    private function connect(){

        try{
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        }catch(PDOException $e){
            return null;
        }

    }
}

?>