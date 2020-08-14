<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/header.php';
?>

<?php if($_POST){
    $total=0;
 foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=$total + ($producto['PRICE'] - ($producto['DISCOUNT']/100*($producto['PRICE'])) * $producto['CANTIDAD']);
    }
    session_destroy();
} ?>
</div>
<div class="container text-center pay">
    <h2 > Has Cancelado: $<?php  echo $total ?></h2>    
    <img src="image/cheket.png" alt="" class="imgPay" >
</div>


<?php
include 'templates/footer.php';
?>