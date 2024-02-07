<?php 
include("conexion.php");

$id_p = $_POST['id_prod'];

$con_mod = "SELECT * from productos where id_producto = $id_p";

$resultado = mysqli_query($conexion, $con_mod);


foreach($resultado as $res_mod){
    $id_prod = $res_mod['id_producto'];
    $prod = $res_mod['nombre'];
    $descrip = $res_mod['descripcion'];
    $prec = $res_mod['precio'];
    $cant = $res_mod['cantidad'];
    $imagen = $res_mod['imagen'];
}

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

    <title>Inicio</title>
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

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h2>Modificacion Producto </h2>
                        <form action="c_pedido.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="tipo" id="tipo" value="2">
                            <input type="text" name="id_p" id="id_p" value="<?php echo $id_prod?>">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Producto</label>
                                <input type="text" class="form-control" id="producto" name="producto"  value="<?php echo $prod?>" placeholder="Producto">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion"  name="descripcion" value="<?php echo $descrip?>" placeholder="Descripcion">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Precio</label>
                                <input type="number"  step="0.001" class="form-control" id="precio"  name="precio" value="<?php echo $prec?>" placeholder="Precio">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Cantidad</label>
                                <input type="number"  step="1" class="form-control" id="cantidad"  name="cantidad" value="<?php echo $cant?>" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen del Producto</label>
                                <input type="file" class="form-control" id="img"  name="img" placeholder="Descripcion">
                                <input type="text" class="form-control" id="imagen"  name="imagen" value="<?php echo $imagen?>" placeholder="Descripcion">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>                            
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>