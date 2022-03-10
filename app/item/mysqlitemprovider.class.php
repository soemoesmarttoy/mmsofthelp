<?php

class MySqlItemProvider extends ItemProvider{
   

    public function get_items($com_id){
        return $this -> query('SELECT * FROM items WHERE com_id = :com_id', [
            ':com_id' => $com_id
        ]);               
    }
    
    public function get_item($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM items WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Item');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_items($search){      

        return $this->query('SELECT * FROM items WHERE name LIKE :search OR qty LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_item($name, $qty, $unit_value, $cat_id, $com_id){

        $this -> execute('INSERT INTO items (name, qty, unit_value, cat_id, com_id) VALUES 
        (:name, :qty, :unit_value, :cat_id, :com_id)',
        [
            ':name' => $name,
            ':qty' => $qty,
            ':unit_value' => $unit_value,
            ':cat_id' => $cat_id,
            ':com_id' => $com_id            
        ]);       
        }
    
    public function update_item($id, $name, $qty, $unit_value, $cat_id){

        $this -> execute('UPDATE items SET
        name = :name, qty = :qty, unit_value= :unit_value, 
        cat_id = :cat_id
        WHERE id = :id',
        [
        ':name' => $name,
        ':qty' => $qty,
        ':unit_value' => $unit_value,
        ':cat_id' => $cat_id,
        ':id' => $id        
        ]);        
    }
    
    public function delete_item($id){

        $this -> execute('DELETE FROM items WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Item');
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