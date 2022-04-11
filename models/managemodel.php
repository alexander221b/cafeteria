<?php

require_once('models/product.php');

class ManageModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get(){
       $products = [];
       try{
          $query = $this->db->connect()->query("SELECT * FROM products");
          while($row = $query->fetch()){
            $product = new Product();
            $product->id = $row['id'];
            $product->productname = $row['productname'];
            $product->reference = $row['reference'];
            $product->price = $row['price'];
            $product->weight = $row['weight'];
            $product->category = $row['category'];
            $product->stock = $row['stock'];
            $product->date = $row['date'];
            array_push($products, $product);
          }
          return $products;
       }catch (PDOException $e){
           return [];
       }
       
    }

    public function getById($productId){
       $product = new Product();
       $query = $this->db->connect()->prepare("SELECT * FROM products WHERE id = :id");
       try {
           $query->execute(['id' => $productId]);
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
            $query = $this->db->connect()->prepare('UPDATE PRODUCTS SET productname = :productname, reference = :reference, price = :price, weight = :weight, category = :category, stock  = :stock, date  = :date WHERE id = :id');
            $query->execute(
                            [   
                                'id' => $data['id'],
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

    public function delete($id){
        try{
            $query = $this->db->connect()->prepare('DELETE FROM PRODUCTS WHERE id = :id');
            $query->execute(
                [   
                    'id' => $id
                ]);
                return true;
            }catch(PDOException $e){
                //echo $e->getMessage();
                return false;
            }
    }
}

?>