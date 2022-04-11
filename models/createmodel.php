<?php

class CreateModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert($data){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO PRODUCTS (PRODUCTNAME, REFERENCE, PRICE, WEIGHT, CATEGORY, STOCK, DATE) VALUES (:productname, :reference, :price, :weight, :category, :stock, :date)');
            $query->execute(
                            [
                                'productname' => $data['productname'],
                                'reference' => $data['reference'],
                                'price' => $data['price'],
                                'weight' => $data['weight'],
                                'category' => $data['category'],
                                'stock' => $data['stock'],
                                'date' => $data['date']
                            ]);
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            return false;
        }
       
    }
}

?>