<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar productos</title>
     <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>
    <?php require('views/header.php')?>

        <div class="container">
            <div class="row justify-content-center" >
                <div class="col-md-12">
                    <h2 class="center">Administrar productos</h2><br>
                    <?php 
                    if(!empty($this->mensaje)){
                    ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <?php  echo $this->mensaje; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    }
                    ?> 
                    <?php 
                    if(!empty($this->errorMessage)){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php  echo $this->errorMessage; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                    }
                    ?> 
                    <table id="products" class="table">
                        <thead><tr>
                            <th>Id</th>
                            <th>Nombre de producto</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Fecha de creación</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                include_once('models/product.php');
                                foreach($this->products as $row){
                                    $product = new Product();
                                    $product = $row;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $product->id; ?>
                                </td>
                                <td>
                                    <?php echo $product->productname; ?>
                                </td>
                                <td>
                                    <?php echo $product->reference; ?>
                                </td>
                                <td>
                                    <?php echo $product->price; ?>
                                </td>
                                <td>
                                    <?php echo $product->weight; ?>
                                </td>
                                <td>
                                    <?php echo $product->category; ?>
                                </td>
                                <td>
                                    <?php echo $product->stock; ?>
                                </td>
                                <td>
                                    <?php echo $product->date; ?>
                                </td>
                                <td>
                                    <a href="<?php echo constant('URL').'manage/edit/'.$product->id;?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo constant('URL').'manage/delete/'.$product->id;?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#products').DataTable();
} );
</script>
</html>