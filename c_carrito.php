<?php 
include("conexion.php");

///header('Content-Type: application/json');


 $prods = json_decode($_POST['datos'],true);


 foreach ($prods as $filas){
    $subt = $filas['subtotal'];
    $cant = $filas['cantidad'];
    $id_prod = $filas['id_prod'];
    $id_ven = $filas['id_venta'];

    $insert_det_venta = "INSERT INTO detalle_ventas(fk_id_producto,fk_id_venta,cantidad,subtotal,bandera) values($id_prod,$id_ven,$cant,$subt,0)";
    
    $resultado = mysqli_query ( $conexion , $insert_det_venta );
}









?>