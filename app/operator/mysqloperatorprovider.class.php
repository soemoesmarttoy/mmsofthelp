<?php

class MySqlOperatorProvider extends OperatorProvider{

    public function get_operators($com_id){
        return $this -> query('SELECT * FROM operators WHERE com_id = :com_id UNION ALL SELECT * FROM operators WHERE com_id = 0',[
            ':com_id' => $com_id
        ]);               
    }
    
    public function get_operator($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM operators WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Operator');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_operator($serach){       
       
        return $this->query('SELECT * FROM operators WHERE cat_id = :search OR name LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_operator($cat_id, $name, $opr_id, $com_id){

        $this -> execute('INSERT INTO operators (cat_id, name, opr_id, com_id) VALUES (:cat_id, :name, :opr_id, :com_id)',
        [
            ':cat_id' => $cat_id,
            ':name' => $name,
            ':opr_id' => $opr_id,
            ':com_id' => $com_id
        ]);       
        }
    
    public function update_operator($id, $cat_id, $name, $opr_id, $com_id){

        $this -> execute('UPDATE operators SET cat_id = :cat_id, name = :name, opr_id = :opr_id, com_id = :com_id WHERE id = :id',
        [
        ':cat_id' => $cat_id,
        ':name' => $name,
        ':opr_id' => $opr_id,
        ':com_id' => $com_id,
        ':id' => $id
        ]);        
    }
    
    public function delete_operator($id){

        $this -> execute('DELETE FROM operators WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Operator');
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