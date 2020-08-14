<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/header.php';
?>


        <br>
        <?php if($mensaje!=""){ ?>
        <div class="alert alert-success" role="alert">
        <?php echo $mensaje;?> 
           
            <a href="mostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
        </div>
        <?php }?>



        <div class="row">

        <?php 
         $sentencia=$pdo->prepare("SELECT * FROM `product`");
         $sentencia->execute();
         $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
         $articulos_x_pagina = 6;

         //CONTAR ARTICULOS
         $total_articulos_db=$sentencia->rowCount();
         $paginas =  $total_articulos_db / 6;
         $paginas = ceil($paginas);
        
         
        ?>

        <?php 
        if(!$_GET){
          header('Location:index.php?pagina=1');
        }
        
        
        $iniciar = ($_GET['pagina']-1)* $articulos_x_pagina;
        $sentencia_articulos = $sentencia=$pdo->prepare("SELECT * FROM `product` LIMIT :iniciar,:narticulos");
        $sentencia_articulos->bindParam(':iniciar', $iniciar,PDO::PARAM_INT);
        $sentencia_articulos->bindParam(':narticulos', $articulos_x_pagina,PDO::PARAM_INT);
        $sentencia_articulos->execute();
        $resultado_articulos = $sentencia_articulos->fetchAll();

        ?>
        <?php foreach($resultado_articulos as $producto){ ?>
            <div class="col-4">
                <div class="card">
                    <img 
                    title="<?php echo $producto['name']; ?>"
                    alt="<?php echo $producto['name']; ?>"
                    class="card-img-top"
                     src="<?php echo $producto['url_image']; ?>" alt=""
                     data-toggle="popover" 
                     data-trigger="hover"
                     data-content="$<?php echo $producto['price'];?>"
                     width="250px"
                     height="200px"
                     >
                        
                    <div class="card-body">
                        <span><?php echo $producto['name']; ?></span>
                        <h5 class="card-title">$<?php echo $producto['price']; ?></h5>
                        <p class="card-text"><?php echo $producto['category']; ?></p>
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY) ; ?>">
                            <input type="hidden" name="name" id="name" value="<?php echo openssl_encrypt($producto['name'],COD,KEY); ?>">
                            <input type="hidden" name="price" id="price" value="<?php echo openssl_encrypt($producto['price'],COD,KEY); ?>">
                            <input type="hidden" name="discount" id="discount" value="<?php echo openssl_encrypt($producto['discount'],COD,KEY); ?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY); ?>">
                        <button class="btn btn-primary" name= "btnAccion" value="Agregar" type="submit" type="button">Agregar Al carrito</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        <?php }?>
            
        </div>
    </div>

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item  <?php echo $_GET['pagina']<=1?'disable':' ' ?>">
      
    
    <a class="page-link" 
    href="index.php?pagina=<?php echo $_GET["pagina"]-1?>" 
    tabindex="-1" aria-disabled="true">
      Anterior
    
    </a>
    </li>

    <?php for($i=0;$i < $paginas; $i++):?>
          <li class="page-item  <?php echo $_GET['pagina']==$i+1? 'active' : ' ' ?>">
            <a class="page-link" href="index.php?pagina=<?php echo $i +1 ?>">
           <?php echo $i +1 ?>
            </a>
          </li>
    
      <?php endfor ?>
    
    
    <li class="page-item  <?php echo $_GET['pagina'] >=$paginas ? 'disable' : ' ' ?>">
     
      <a class="page-link"  href="index.php?pagina=<?php echo $i +1 ?>">Siguiente</a>
    </li>
  </ul>
</nav>

    <script>
        $(function () {
  $('[data-toggle="popover"]').popover()
            });
    </script>

<?php
include 'templates/footer.php';
?>