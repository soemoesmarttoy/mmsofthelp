<?php

class MySqlPostProvider extends PostProvider{

    public function get_posts($com_id){
        return $this -> query('SELECT * FROM posts WHERE com_id = :com_id', [
            ':com_id' => $com_id
        ]);               
    }

    public function get_posts_default(){
        return $this -> query('SELECT * FROM posts WHERE com_id = 19');               
    }
    
    public function get_post($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM posts WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Post');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_post($serach){       
       
        return $this->query('SELECT * FROM posts WHERE com_id = :search OR definition LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_post($title, $body, $com_id){

        $this -> execute('INSERT INTO posts (title, body, com_id) VALUES (:title, :body, :com_id)',
        [
            ':title' => $title,
            ':body' => $body,
            ':com_id' => $com_id
        ]);       
        }
    
    public function update_post($id, $title, $body, $com_id){

        $this -> execute('UPDATE posts SET title = :title, body = :body, com_id = :com_id WHERE id = :id',
        [
        ':title' => $title,
        ':body' => $body,
        ':com_id' => $com_id,
        ':id' => $id
        ]);        
    }
    
    public function delete_post($id){

        $this -> execute('DELETE FROM posts WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Post');
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