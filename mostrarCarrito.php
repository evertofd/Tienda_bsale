<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/header.php';
?>

<br>
<h3>Lista del Carrito</h3>
<?php if(!empty($_SESSION['CARRITO'])){ ?>

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="12%" class="text-center">Cantidad</th>
            <th width="12%" class="text-center">Precio</th>
            <th width="12%" class="text-center">Descuento</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%" class="text-center">---</th>
        </tr>
        <?php $total=0;?>
        <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
        <tr>
            <td width="40%"><?php echo $producto['NAME'] ?></td>
            <td width="12%" class="text-center"><?php echo $producto['CANTIDAD'] ?></td>
            <td width="12%"class="text-center">$<?php echo $producto['PRICE'] ?></td>
            <td width="12%" class="text-center">$<?php echo $producto['DISCOUNT'] ?></td>
            <td width="20%" class="text-center">$<?php echo number_format($producto['PRICE'] - ($producto['DISCOUNT']/100*($producto['PRICE'])) * $producto['CANTIDAD'],2 ); ?></td>
            <td width="5%" >
                
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
            <td colspan="5">

            <form action="pagar.php" method="post">
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
               <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btn-Accion">Proceder a pagar >></button>
            </form>
            </td>
        </tr>
    </tbody>
</table>
<?php }else{ ?>
    <div class="alert alert-success">
        No hay productos en el carrito
    </div>
<?php }  ?>
<?php
include 'templates/footer.php';
?>