<?php
include 'global/config.php';
include 'global/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" hfre="index.php">Logo de la Empresa</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Carrito(0)</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
        <br>
        <div class="alert alert-success" role="alert">
            Pantalla de Mensaje... 
            <a href="#" class="badge badge-success">Ver Carrito</a>
        </div>

        <div class="row">

        <?php 
         $sentencia=$pdo->prepare("SELECT * FROM `product`");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         
        ?>
        <?php foreach($listaProductos as $producto){ ?>
            <div class="col-3">
                <div class="card">
                    <img 
                    title="<?php echo $producto['name']; ?>"
                    alt="<?php echo $producto['name']; ?>"
                    class="card-img-top"
                     src="<?php echo $producto['url_image']; ?>" alt="">
                    <div class="card-body">
                        <span><?php echo $producto['name']; ?></span>
                        <h5 class="card-title">$<?php echo $producto['price']; ?></h5>
                        <p class="card-text"><?php echo $producto['category']; ?></p>
                        <button class="btn btn-primary" name= "btnAccion" value="Agregar" type="submit" type="button">Agregar Al carrito</button>
                    </div>
                </div>
            </div>
        <?php }?>
            
        </div>
    </div>
</body>
</html>