<?php

class MySqlCompanyProvider extends CompanyProvider{
   

    public function get_companies(){
        return $this -> query('SELECT * FROM companies');              
    }

    public function get_company_by_id($com_id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM companies WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $com_id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Company');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function get_company_by_name($com_name){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM companies WHERE name = :name';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':name' => $com_name, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Company');

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
    
    public function add_company($com_name, $com_phone, $com_address){

        $this -> execute('INSERT INTO companies (name, phone, address) VALUES (:name, :phone, :address)',
        [
            ':name' => $com_name,
            ':phone' => $com_phone,
            ':address' => $com_address,
        ]);       
        }
    
    public function update_company($id, $name, $phone, $address){

        $this -> execute('UPDATE companies SET          
        name = :name,        
        phone = :phone,
        address = :address 
        WHERE id = :id',
        [
        ':id' => $id,
        ':name' => $name,        
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