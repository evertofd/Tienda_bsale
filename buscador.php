
<?php
	$servername = "mdb-test.c6vunyturrl6.us-west-1.rds.amazonaws.com";
    $username = "bsale_test";
  	$password = "bsale_test";
  	$dbname = "bsale_test";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }
    $salida = "";
    $query = "SELECT * FROM product WHERE name NOT LIKE '' ORDER By id";
    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM product WHERE id LIKE '%$q%' OR name LIKE '%$q%' OR category LIKE '%$q%' OR brand LIKE '%$q%' OR price LIKE '$q' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
     foreach($resultado as $producto){ ?>
     
     
     <div class="col-md-4 col-sm-12">
            <div class="card m-2">
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
                    </div>
             </div>
             </div>
        <?php };
    }else{
    	$salida.=" <div class='container text-center'>
                    <h2>PRODUCTO NO ENCONTRADO</h2>
                  </div>";
    }
    echo $salida;
    $conn->close();
?>



</div>