<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/header.php';
?>
<br>
<br>
<br>
<br>
<br>
<?php if($_POST){
    $total=0;
 foreach($_SESSION['CARRITO'] as $indice=>$producto){
    $total=$total + ($producto['PRICE'] - ($producto['DISCOUNT']/100*($producto['PRICE'])) * $producto['CANTIDAD']);
    }
    echo "<h3> Has Cancelado:".$total."</h3>";
    session_destroy();
} ?>
</div>
<div class="col-12 text-center">
    B_SALE 2020
</div>

</body>
</html>