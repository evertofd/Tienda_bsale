<?php 
session_start();

$mensaje="";

//FUNCIONES PARA INGRESAR PRODUCTOS AL CARRITO DE COMPRAS

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){
        case 'Agregar':
        if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);
            $mensaje.="Ok ID correcto".$ID;
        }else{
            $mensaje.="Upss... ID incorrecto".$ID;
        }

        if(is_string(openssl_decrypt($_POST['name'],COD,KEY))){
            $NAME=openssl_decrypt($_POST['name'],COD,KEY);
            $mensaje.="Ok Nombre".$NAME."<br/>";
        }else{$mensaje.="Upppp... Error en el nombre"."<br/>"; break;}
        
        if(is_string(openssl_decrypt($_POST['cantidad'],COD,KEY))){
            $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
            $mensaje.="Ok cantidad".$CANTIDAD."<br/>"; 
        }else{$mensaje.="Upppp... Error con la cantidad"."<br/>"; break;}
        

        if(is_string(openssl_decrypt($_POST['price'],COD,KEY))){
            $PRICE=openssl_decrypt($_POST['price'],COD,KEY);
            $mensaje.="Ok precio".$PRICE."<br/>";
        }else{$mensaje.="Upppp... Error con el precio"."<br/>"; break;}

        if(is_string(openssl_decrypt($_POST['discount'],COD,KEY))){
            $DISCOUNT=openssl_decrypt($_POST['discount'],COD,KEY);
            $mensaje.="Ok precio".$DISCOUNT."<br/>";
        }else{$mensaje.="Upppp... Error con el precio"."<br/>"; break;}
        
        if(!isset($_SESSION['CARRITO'])){
            $producto=array(
                'ID'=>$ID,
                'NAME'=>$NAME,
                'CANTIDAD'=>$CANTIDAD,
                'PRICE'=>$PRICE,
                'DISCOUNT'=>$DISCOUNT
            );
            $_SESSION['CARRITO'][0]=$producto;
            $mensaje="Producto Agregado al Carrito";
        }else{
            $NumeroProductos=count($_SESSION['CARRITO']);
            $producto=array(
                'ID'=>$ID,
                'NAME'=>$NAME,
                'CANTIDAD'=>$CANTIDAD,
                'PRICE'=>$PRICE,
                'DISCOUNT'=>$DISCOUNT
            );
            $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            $mensaje="Producto Agregado al Carrito";
        }
      $mensaje="Producto Agregado al Carrito";
    break;

//FUNCION PARA ELIMINAR PRODUCTOS DEL CARRITO DE COMPRA
    case "Eliminar":
        if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);

           foreach($_SESSION['CARRITO'] as $indice=>$producto){
            if($producto['ID']==$ID){
                unset($_SESSION['CARRITO'][$indice]);
                echo "<script>alert('Elemento borrado...');</script>";
            }
           }
        }else{
            $mensaje.="Upss... ID incorrecto".$ID;
        
        }
    break;
    }
 }
?>