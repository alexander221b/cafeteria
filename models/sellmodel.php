<?php

require_once('models/product.php');

class SellModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function insert($data){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO SELLS (PRODUCTID, AMOUNT) VALUES (:productid, :amount)');
            $query->execute(
                            [
                                
                                'productid' => $data['id'],
                                'amount' => $data['amount']
                               
                            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
       
    }

    public function getById($id){
        $product = new Product();
        $query = $this->db->connect()->prepare("SELECT * FROM products WHERE id = :id");
        try {
            $query->execute(['id' => $id]);
            while($row = $query->fetch()){
               $product->id = $row['id'];
               $product->productname = $row['productname'];
               $product->reference = $row['reference'];
               $product->price = $row['price'];
               $product->weight = $row['weight'];
               $product->category = $row['category'];
               $product->stock = $row['stock'];
               $product->date = $row['date'];
            }
            return  $product;
        }catch(PDOException $e){
             return null;
        }
     }

     public function update($data){
        try{
            $query = $this->db->connect()->prepare('UPDATE PRODUCTS SET stock  = :stock WHERE id = :id');
            $query->execute(
                            [   
                                'id' => $data['id'],
                                'stock' => $data['stock']
                                
                            ]);
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            return false;
        }
    }

    
}


?>
