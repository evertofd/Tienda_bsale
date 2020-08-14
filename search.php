<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/header.php';
?>

<section class="principal">

    <h1>CONOCE Y CONSULTA NUESTROS PRODUCTOS</h1>
    <!-- FORMULARIO DE BUSQUEDA -->
	<div class="container search">
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="caja_busqueda" id="caja_busqueda">
        </form>
    </div>
 <!--SECCION PARA BUSCAR ARTICULOS BUSCADOS -->
    <div id="datos" class="row"></div>
</section>


<?php
include 'templates/footer.php';
?>