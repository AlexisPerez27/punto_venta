<?php
include("conexion.php");

$insert_prod = "SELECT * FROM productos";

$resultado = mysqli_query($conexion, $insert_prod);


$consulta_carrito =  "SELECT * FROM detalle_ventas AS  de INNER JOIN productos as p on p.id_producto = de. fk_id_producto where bandera = 1";

$rescon = mysqli_query($conexion, $consulta_carrito);

$consulta_ventas =  "SELECT max(id_venta) as maximo FROM ventas";

$res_ven = mysqli_query($conexion, $consulta_ventas);

foreach($res_ven as $rv){
    $max_id = $rv['maximo'];
}

if(is_null($max_id)){
    $max_id = $max_id + 1;
}else{
    $max_id = $max_id + 1 ;
}

/* 


if(isset($_POST['id_p'])){
    $id_pr = $_POST['id_p'];
    
    
    /* $consulta_folio=  "SELECT folio FROM ventas";

    $res_folio= mysqli_query($conexion, $consulta_folio);

    foreach($res_folio as $rf){
        $folio = $rf['folio'];
    } 

    

    $insert_det_venta = "INSERT INTO detalle_ventas(fk_id_producto, fk_id_venta,cantidad, bandera) VALUES($id_pr,$max_id,1,1)";

    $ins_ven = mysqli_query($conexion,$insert_det_venta);

    $consulta_carrito =  "SELECT * FROM detalle_ventas AS  de INNER JOIN productos as p on p.id_producto = de. fk_id_producto where bandera = 1";

    $rescon = mysqli_query($conexion, $consulta_carrito);


} */

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS-->
    <link href="assets/bootstrap.min.css" rel="stylesheet" media="all">
    <script src="assets/jquery-3.6.0.min.js"></script> <!-- incluye la libreria push -->

    <title>Comprar Productos</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">INICIO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="consulta.php">Consulta Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comprar.php">Comprar</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Comprar.</h2><br>  
                                            
                        
                        <div class="row">
                            <?php 
                            foreach($resultado as $res){ 
                                $id_prod = $res['id_producto']; 
                                $prod = $res['nombre'];      
                                $descp = $res['descripcion']; 
                                $prec = $res['precio']; 
                                $canti = $res['cantidad']; 
                                $imag = $res['imagen'];                          
                            ?>
                                <div class="col-md-4">  
                                    <iframe class="card-img-top" src="<?php echo  $imag; ?>" width="100" height="200">  </iframe>                                
                                    <h4 class="list-group-item-heading"><?php echo $res["nombre"]; ?></h4>
                                    <p class="list-group-item-text"><?php echo $res["descripcion"]; ?></p>
                                    <div class="col-sm-6">
                                        <p class="lead"><?php echo '$'.$res["precio"].' MXN'; ?></p>
                                    </div>
                                    <div class="col-sm-12">       
                                        <input type="text" id="id_v" name="id_v" class="id_v" value="<?php echo  $max_id; ?>" hidden>                                 
                                        <input type="text" id="id_p" name="id_p" class="id_p" value="<?php echo  $id_prod; ?>" hidden>
                                        <input type="text" id="producto" name="producto" value="<?php echo  $prod; ?>" hidden>
                                        <input type="text" id="desc" name="desc" value="<?php echo  $descp; ?>" hidden>
                                        <input type="text" id="prec" name="prec" value="<?php echo  $prec; ?>" hidden>
                                        <button type="submit" class="btn btn-outline-success" id="agregar" >
                                            <i class="bi bi-trash3"></i>&nbsp; Agregar
                                        </button>
                                    </div><br>

                                    
                                </div>
                                                            
                            <?php 
                            }
                            ?>
                        </div> 
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Carrito de Compras</h3> &nbsp;&nbsp;  <h5><strong>FOLIO: F-0000<?php echo $max_id; ?> </strong></h5>
                        

                        
                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="mi_tabla">
                            </tbody>                         
                        </table>
                            <tr>
                                <td colspan="4" aling="right"><strong>Total:</strong></td>
                                <td  aling="right" ><input type="text" name="total" value="<?php if(empty($valor_total)){echo 0;}else{echo $valor_total;} ?>" id ="total"></td>
                                <td  aling="right" ><input type="text" name="tipo_det" value="4" id ="tipo_det" hidden></td>
                                <td  aling="right" ><input type="text" name="folio" value="<?php echo 'F-0000'.$max_id; ?>" id ="folio" hidden></td>
                                <td colspan="4" aling="right">
                                    <button type="submit" class="btn btn-outline-primary" id="pagar" >
                                        <i class="bi bi-trash3"></i>&nbsp; Pagar
                                    </button>
                                </td>
                            </tr>
                    </div>
                </div>
            </div>

        </div>
        
                                    <!--  -->


    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".col-md-4").click(function(){
                var id_ven = $(this).find("input[name=id_v]").val();
                var idp = $(this).find("input[name=id_p]").val();
                var prod = $(this).find("input[name=producto]").val();
                var desc = $(this).find("input[name=desc]").val();
                var precio = $(this).find("input[name=prec]").val();


               $("#mi_tabla").append("<tr><td hidden>"+ id_ven +"</td><td hidden>"+ idp +"</td><td>"+ prod +"</td><td>"+ desc +"</td><td>"+ precio +"</td><td><input type='number' name= 'cantidad' class='cantidad' id='cantidad' value ='1'></td><td id='sub'> <input type='text' name='sub' value='"+ precio +"'> </td><td><button type='submit' class='btn btn-outline-danger' id='quitar'><i class='bi bi-trash3'></i>&nbsp; Quitar</button></td></tr>");
               //alert("ayuda");
               var cant = $(this).find("input[type=number]").val(); // columna donde sea a 1 NOTA: no es la primer columna ya que se cuenta desde 0 
                var pr = $(this).find("td:eq(2)").text(); // columna donde sea a 1 NOTA: no es la primer columna ya que se cuenta desde 0 

                var tot = cant * pr;

                //$(this).find("td:eq(4)").text(tot);

                $(this).find("input[name=sub]").val(tot);

                var total  = 0
                $("table tbody tr").each(function(){
                    var tot = $(this).find("input[name=sub]").val();
                    
                    total = parseFloat(total) + parseFloat(tot);

                });	
                console.log(total);
                $("#total").val(total);
                
            });

            $(document).on("click",".cantidad",function(){
		   
                var cant = $(this).parents("tr").find("input[type=number]").val(); // columna donde sea a 1 NOTA: no es la primer columna ya que se cuenta desde 0 
                var pr = $(this).parents("tr").find("td:eq(4)").text(); // columna donde sea a 1 NOTA: no es la primer columna ya que se cuenta desde 0 
                
                var tot = cant * pr;
                $(this).parents("tr").find("input[name=sub]").val(tot);

                

                var total  = 0
                $("table tbody tr").each(function(){
                    var tot = $(this).find("input[name=sub]").val();
                    
                    total = parseFloat(total) + parseFloat(tot);
                    
                });	
                /*console.log(total);*/
                $("#total").val(total); 
           });


            $(document).on("click",".btn-outline-danger",function(){
			   
                var total_res = 0 
                var tot = $(this).parents("tr").find("input[name=sub]").val();   
                var total = $("#total").val();                
                total_res = parseFloat(total) - parseFloat(tot);

                //alert(total_res);
                $("#total").val(total_res); 

                $(this).parents("tr").remove(); 
			});


            $("#pagar").click(function() {

                var formData = new FormData();
                var tota = $("#total").val();
                var tipo = $("#tipo_det").val();
                var folio = $("#folio").val();

                formData.append('total',tota);
                formData.append('tipo',tipo);
                formData.append('folio',folio);
                $.ajax({
                    url: 'c_pedido.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response != 0) {
                            //alert(response);                            

                        } else {
                        //alert(response);
                        }
                    }
                });


                var total  = 0
                var datos = [];

                $("table tbody tr").each(function(){
                    var subt = $(this).find("input[name=sub]").val();
                    var cant = $(this).find("input[type=number]").val();
                    var id_ven = $(this).find("td:eq(0)").text();
                    var id_prod = $(this).find("td:eq(1)").text();

                    item = {};
                    item ['subtotal']= subt;
                    item ['cantidad']= cant;                   
                    item ['id_venta']= id_ven;
                    item ['id_prod']= id_prod;
                    datos.push(item);

                    console.log(datos);
                    //alert(tipo_det);

                    
                    //total = parseFloat(total) + parseFloat(tota);
                    //total = parseFloat(total); 

                    //total = total + 3

                    
                    ///$("#total").text(total); 

                });	

                INFO 	= new FormData();
                aInfo 	= JSON.stringify(datos);
                INFO.append('datos',aInfo);			

                
                
                $.ajax({ 
                    data: INFO,	
                    type: 'POST',
                    url : 'c_carrito.php',
                    contentType: false,
                    processData: false, 
                    success: function(r){						
                        alert("Inserccion Exitosa");	
                        location.reload(); 
                        //alert(r);
                        
                    }
                });

                

                

                

                
                //console.log(total);
                //$("#total").val(total);

            });
            
            
        }); // fin document load
    </script>

</body>

</html>