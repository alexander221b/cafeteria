<?php

    class Create extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->mensaje = "";
            
        }

        function render(){
            $this->view->render('create/index');
        }

        function insert(){
            $productname = $_POST['productname'];
            $reference = $_POST['reference'];
            $price = $_POST['price'];
            $weight = $_POST['weight'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $date = $_POST['date'];

            $data = [
                        'productname' => $productname,
                        'reference' => $reference,
                        'price' => $price,
                        'weight' => $weight,
                        'category' => $category,
                        'stock' => $stock,
                        'date' => $date
                    ];

            $insertData = $this->model->insert($data);
            $mensaje = "";
            if($insertData){
              $mensaje = 'Producto ingresado';
            }
            else{
               $mensaje = 'Error';
            }
            $this->view->mensaje = $mensaje;
            $this->render();
        }
    }


?>