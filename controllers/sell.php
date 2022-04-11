<?php

    class Sell extends Controller{

        function __construct()
        {
            parent::__construct();
            $this->successMessage = "";
            $this->errorMessage = "";
            
        }

        function render(){
            $this->view->render('sell/index');
        }

        function update(){
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            
            $data = [
                        'id' => $id,
                        'amount' => $amount
                    ];

            $product = $this->model->getById($id);
            //Verifica q exista el producto
            if($product->id){
                $successMessage = "";
                $errorMessage = "";
                if($product){
                    $stock = $product->stock;
                    $diff  = $stock - $amount;
                    if($diff >= 0){
                        $insertData = $this->model->insert($data);
                        if($insertData){

                            $data = [
                                'id' => $id,
                                'stock' => $diff
                            ];
            
                            $updateData = $this->model->update($data);
                            $successMessage = 'Producto vendido';
                        }
                        else{
                            $errorMessage = 'Error';
                        }
                        $updateData = $this->model->update($data);
                    }
                    else{
                        $errorMessage = 'Cantidad insuficiente';
                    }
                    
                }
                else{
                    $errorMessage = 'Error';
                }
                $this->view->successMessage = $successMessage;
                $this->view->errorMessage = $errorMessage;
                $this->render();
            }else{
                $errorMessage = 'Producto inexistente';
                $this->view->errorMessage = $errorMessage;
                $this->render();
            }
            
        }
    }
    


?>