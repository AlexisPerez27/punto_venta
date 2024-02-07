<?php 
include("conexion.php");

$tipo = $_POST['tipo'];



if($tipo == 1){

    $producto = $_POST['producto'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen  = $_FILES['img']['name'];
    $cant = $_POST['cantidad'];
    
    
    move_uploaded_file($_FILES["img"]["tmp_name"], "images/".$_FILES['img']['name']); 
    
    
    $imagen = "./images/".$imagen;
    
    $insert_prod = "INSERT INTO productos(nombre,descripcion,precio,cantidad,imagen) values('$producto', '$desc', $precio, $cant, '$imagen')";
    
    $resultado = mysqli_query ( $conexion , $insert_prod );
    
    echo "<a href= 'index.php'>atras</a>";


}elseif($tipo == 2){

    $id_prod = $_POST['id_p'];
    $producto = $_POST['producto'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen  = $_FILES['img']['name'];
    $ima  = $_POST['imagen'];
    $cant = $_POST['cantidad'];
    
    
    if($imagen != '' ){
        move_uploaded_file($_FILES["img"]["tmp_name"], "images/".$_FILES['img']['name']);
        $imagen = "./images/".$imagen;
    }else{
        $imagen = $ima;
    }
    
    $actualizar = "UPDATE productos set  nombre = '$producto', descripcion = '$desc', precio = $precio, cantidad = $cant, imagen ='$imagen' where id_producto = $id_prod";
    
    $resultado = mysqli_query ( $conexion , $actualizar );
    
    echo "<a href= 'consulta.php'>atras</a>";
}elseif($tipo == 3){

    $id_prod = $_POST['id_prod'];
    
    $eliminar = "DELETE from productos where id_producto = $id_prod";
    
    $resultado = mysqli_query ( $conexion , $eliminar );
    
    echo "<a href= 'consulta.php'>atras</a>";

}


if($tipo== 4){
    $total = $_POST['total'];
    $folio = $_POST['folio'];

    $insert_venta = "INSERT INTO ventas(folio,total,fecha) values('$folio',$total, now())";
    
    $resultado = mysqli_query ( $conexion , $insert_venta );
  
}



?>