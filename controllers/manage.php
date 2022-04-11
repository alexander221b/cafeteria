<?php

    class Manage extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->view->products = [];
            
        }

        function render(){
            $this->view->products = $this->model->get();
            $this->view->render('manage/index');
        }

        function edit($param = null){
           $productId = $param[0];
           $product = $this->model->getById($productId);
           if($product->id){
            $this->view->product = $product;
            $this->view->render('manage/edit');
            
           }
           else{
            $this->view->errorMessage = "Producto inexistente";
            $this->render();
           }

           
           
        }

        function update(){
            $productId = $_POST['id'];
            $productname = $_POST['productname'];
            $reference = $_POST['reference'];
            $price = $_POST['price'];
            $weight = $_POST['weight'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $date = $_POST['date'];
           
            $data = [
                        'id' => $productId,
                        'productname' => $productname,
                        'reference' => $reference,
                        'price' => $price,
                        'weight' => $weight,
                        'category' => $category,
                        'stock' => $stock,
                        'date' => $date
                    ];

            $updateData = $this->model->update($data);
            $mensaje = "";

            if($updateData){
                $product = new Product();
                $product->id = $productId;
                $product->productname = $productname;
                $product->reference = $reference;
                $product->price = $price;
                $product->weight = $weight;
                $product->category = $category;
                $product->stock = $stock;
                $product->date = $date;
                $this->view->product = $product;
                $mensaje = 'Producto actualizado';
            }
            else{
                $mensaje = 'Error';
            }
            $this->view->mensaje = $mensaje;
            $this->view->render('manage/edit');
        }

        function delete($parama = null){
            $productId = $parama[0];
            $deleteData = $this->model->delete($productId);
            $mensaje = "";
            if($deleteData){
                $mensaje = 'Producto eliminado';
            }
            else{
                $mensaje = 'Error';
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }  
    }
?>