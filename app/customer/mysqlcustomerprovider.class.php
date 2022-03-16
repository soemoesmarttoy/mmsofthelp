<?php

class MySqlCustomerProvider extends CustomerProvider{

    public function get_customers($com_id){
        return $this -> query('SELECT * FROM customers WHERE com_id = :com_id',[
            ':com_id' => $com_id
        ]);               
    }
    
    public function get_customer($id){

        $db = $this -> connect();
        if ($db == null){
            return;
        }

        $sql = 'SELECT * FROM customers WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt -> execute([
            ':id' => $id, 
        ]);

        $data = $smt->fetchAll(PDO::FETCH_CLASS,'Customer');

        if(empty($data)){
            return;
        }

        $smt = null;
        $db = null;

        return $data[0];
       
    }
    
    public function search_customers($serach){       
       
        return $this->query('SELECT * FROM customer WHERE name = :search OR phone LIKE :search',
                            [':search' => '%'. $search . '%']);
     
    }
    
    public function add_customer($name, $phone, $com_id){

        $this -> execute('INSERT INTO customers (name, phone, com_id) VALUES (:name, :phone, :com_id)',
        [
            ':name' => $name,
            ':phone' => $phone,
            ':com_id' => $com_id
        ]);       
        }
    
    public function update_customer($id, $name, $phone){

        $this -> execute('UPDATE customers SET name = :name, phone = :phone WHERE id = :id',
        [
        
        ':name' => $name,
        ':phone' => $phone,
        ':id' => $id
        ]);        
    }
    
    public function delete_customer($id){

        $this -> execute('DELETE FROM customers WHERE id = :id',
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

        $data = $query->fetchAll(PDO::FETCH_CLASS,'Customer');
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