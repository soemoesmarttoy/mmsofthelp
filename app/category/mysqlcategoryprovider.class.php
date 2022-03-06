<?php

class MySqlCategoryProvider extends CategoryProvider{
   

    public function get_categories($com_id){
        return $this -> query('SELECT * FROM categories WHERE com_id = :com_id', [
            ':com_id' => $com_id
        ]);               
    }
    
    public function get_category($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM categories WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Category');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_terms($search){      

        return $this->query('SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_category($name, $com_id){

        $this -> execute('INSERT INTO categories (name, com_id) VALUES (:name, :com_id)',
        [
            ':name' => $name,
            ':com_id' => $com_id
        ]);       
        }
    
    public function update_category($id, $name, $com_id){

        $this -> execute('UPDATE categories SET name = :name, com_id = :com_id WHERE id = :id',
        [
        ':name' => $name,
        ':com_id' => $com_id,
        ':id' => $id
        ]);        
    }
    
    public function delete_category($id){

        $this -> execute('DELETE FROM categories WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Category');
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