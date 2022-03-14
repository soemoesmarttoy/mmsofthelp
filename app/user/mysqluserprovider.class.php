<?php

class MySqlUserProvider extends UserProvider{
   

    public function get_users($com_id){
        return $this -> query('SELECT * FROM users WHERE com_id = :com_id',
    [':com_id' => $com_id]);               
    }
    
    public function get_user_by_email($email){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM users WHERE email = :email';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':email' => $email, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'User');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }

    public function get_user_by_id($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM users WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'User');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_terms($search){      

        return $this->query('SELECT * FROM users WHERE email LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_user($email, $password, $com_id, $role, $phone, $address){

        $this -> execute('INSERT INTO users (email, password, com_id, role, phone, address) VALUES (:email, :password, :com_id, :role, :phone, :address)',
        [
            ':email' => $email,
            ':password' => $password,
            ':com_id' => $com_id,
            ':role' => $role,
            ':phone' => $phone,
            ':address' => $address,
        ]);       
        }
    
    public function update_user($id, $email, $password, $com_id, $role, $phone, $address){

        $this -> execute('UPDATE users SET 
        email = :email, 
        password = :password,
        com_id = :com_id,
        role = :role,
        phone = :phone,
        address = :address 
        WHERE id = :id',
        [
        ':id' => $id,
        ':email' => $email,
        ':password' => $password,
        ':com_id' => $com_id,
        ':role' => $role,
        ':phone' => $phone,
        ':address' => $address,
        ]);        
    }
    
    public function delete_user($id){

        $this -> execute('DELETE FROM users WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'User');
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