<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
<?php require('views/header.php')?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="center">Crear producto</h2><br>
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
            <form  action="<?php echo constant('URL')?>create/insert" method="post">
                <div class="form-control">
                    <div class="form-group">
                        <label for="productName">Nombre de producto</label>
                        <input class="form-control"  type="text" name="productname" placeholder="Ingrese el nombre del producto" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Referencia</label>
                        <input class="form-control" type="text" name="reference" placeholder="Ingrese la referencia" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Precio</label>
                        <input class="form-control" type="number" name="price" placeholder="Ingrese el precio" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Peso</label>
                        <input class="form-control" type="number" name="weight" placeholder="Ingrese el peso" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Categoría</label>
                        <input class="form-control" type="text" name="category" placeholder="Ingrese la categoría" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Stock</label>
                        <input class="form-control" type="number" name="stock" placeholder="Ingrese el stock" min="0" required>
                        <small class="form-text text-muted">Cantidad del producto en bodega.</small>
                    </div>
                    <div class="form-group">
                        <label for="reference">Fecha de creación</label>
                        <input class="form-control" type="date" name="date" required>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
        


   
</div>
</body>
</html>