<?php
include("conexion.php");

$consulta = "SELECT * FROM productos";

$sql = mysqli_query ( $conexion , $consulta );

/* foreach($sql as $res){ 
    $id_prod = $res['id_producto']; 
    $prod = $res['nombre'];      
    $descp = $res['descripcion']; 
    $prec = $res['precio']; 
    $canti = $res['cantidad']; 
    $imag = $res['imagen'];
}

echo $prod; */


 require_once('tcpdf/tcpdf.php');
       $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
       $pdf->SetCreator(PDF_CREATOR);
       $pdf->SetAuthor('EXTRAL');
       $pdf->SetTitle('Consulta productos');
    
       $pdf->setPrintHeader(false); 
       $pdf->setPrintFooter(false);
       $pdf->SetMargins(5, 5, 10, false); 
       $pdf->SetAutoPageBreak(true, 20); 
       $pdf->SetFont('Helvetica', '', 9);
       $pdf->addPage();  
       //$pdf->SetXY(, 10);
      // $pdf->Cell(40,10,"Productos",0,0);//1 prametro ancho,2 alto,3texto,4 borde,5salto de linea
       //$pdf->SetXY(10, 10);
        $pdf->Cell(40,10,"Productos dados de Alta",0,1);//1 prametro ancho,2 alto,3texto,4 borde,5salto de linea
       //$pdf->SetXY(150, 15);
       //$pdf->Cell(40,10,"SEMANA ".$da,0,1);//1 prametro ancho,2 alto,3texto,4 borde,5salto de linea */
      


       //$pdf -> Cell(65,15,"",1,1); 

        $pdf -> Cell(25,6,"Producto",1,0); 	
        $pdf -> Cell(40,6,"Descripcion",1,0); 	
        $pdf -> Cell(40,6,"Precio",1,0); 
        $pdf -> Cell(40,6,"cantidad",1,0); 
        //$pdf -> Cell(40,6,"Imagen",1,1); 

 

        if($sql->num_rows > 0){
            foreach ($sql as $res){	
                $producto= $res['nombre'];
                $desc= $res['descripcion'];
                $precio= $res['precio'];
                $cant= $res['cantidad'];
                //$img= $res['imagen'];

                //$pdf->Image($img, '', '', 40, 60, '', '', 'T', true, 300, '', false, false, 1, false, false, false);
                $pdf -> Cell(25,60,$producto,1,0);
                $pdf -> Cell(40,60,$desc,1,0);
                $pdf -> Cell(40,60,$precio,1,0);
                $pdf -> Cell(40,60,$cant,1,1);
                
                
                
            }
        }

    
       $pdf->lastPage();
       ob_end_clean();
       $pdf->output('Reporte.pdf', 'D');
        

?>