<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender producto</title>
</head>
<body>
<?php require('views/header.php')?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="center">Vender producto</h2><br>
            <?php 
            if(!empty($this->successMessage)){
            ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <?php  echo $this->successMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }if(!empty($this->errorMessage)){
            ?> 
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php  echo $this->errorMessage; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
            ?>
            <form  action="<?php echo constant('URL')?>sell/update" method="post">
                <div class="form-control">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input class="form-control"  type="number" name="id" placeholder="Ingrese el id del producto" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="reference">Cantidad</label>
                        <input class="form-control" type="number" name="amount" placeholder="Ingrese la cantidad" min="1" required>
                        
                    </div><br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
        


   
</div>
</body>
</html>