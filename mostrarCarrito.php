<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/header.php';
?>

<br>

<h3 class="titleCar">Lista del Carrito</h3>

<!--ESTRUCTURA PARA MOSTRAR-->

<?php if(!empty($_SESSION['CARRITO'])){ ?>
    <div class="table-responsive-sm">

 <!-- LISTA DE ARTICULOS EN EL CARRO DE COMPRAS-->

<table class="table table-light thead-dark table-bordered">
    <tbody>
        <tr>
            <th >Descripcion</th>
            <th  class="text-center ">Cantidad</th>
            <th  class="text-center">Precio</th>
            <th  class="text-center">Descuento</th>
            <th  class="text-center">Total</th>
            <th class="text-center">---</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td ><?php echo $producto['NAME'] ?></td>
            <td  class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
            <td class="text-center">$<?php echo $producto['PRICE'] ?></td>
            <td  class="text-center">$<?php echo $producto['DISCOUNT'] ?></td>
            <td  class="text-center">$<?php echo number_format($producto['PRICE'] - ($producto['DISCOUNT']/100*($producto['PRICE'])) * $producto['CANTIDAD'],2 ); ?></td>
            <td >
                
            <form action="" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY) ; ?>">
            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button></td>
            </form>
            
        </tr>
        <?php $total=$total + ($producto['PRICE'] - ($producto['DISCOUNT']/100*($producto['PRICE'])) * $producto['CANTIDAD']);?>
        <?php }?>
        <tr>
            <td colspan="3" aling="right"><h3>Total</h3></td>
            <td aling="right"><h3>$<?php echo number_format($total,2);?></h3></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="5" >
            </td>
        </tr>
    </tbody>
</table>
</div>

<!--FORMULARIO DE ENVIO-->

<div class="col-md-12 col-sm-4 mb-5">
    <form action="pagar.php" method="post" class="col-md-12 col-sm-4">
        <div class="alert alert-success" role="alert">
            <div class="form-group">
                <label for="my-input">Nombre y Apellido:</label>
                    <input id="name" class="form-control" type="text" name="name" placeholder="Nombre y Apellido" required>

                    <label for="my-input">Telefono de Contacto:</label>
                    <input id="phone" class="form-control" type="number" name="phone" placeholder="Telefono">

                    <label for="my-input">Correo de Contacto:</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="Email"
                    required>
            </div>
                <small id="emailHelp" class="form-text text-muted">El detalle de la compra se enviara a su correo</small>
        </div>
        <button class="btn btn-primary btn-lg btn-block " type="submit" value="proceder" name="btn-Accion">Proceder a pagar >></button>
    </form>

</div>
    <?php }else{ ?>
        <div class="alert alert-success">
            No hay productos en el carrito
        </div>
    <?php }  ?>
<?php
include 'templates/footer.php';
?>