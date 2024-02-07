<?php
include("conexion.php");

$insert_prod = "SELECT * FROM productos";

$resultado = mysqli_query($conexion, $insert_prod);

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

    <title>Consulta Productos</title>
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

            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h2>Consulta de productos.</h2><br>
                        <form action="genera_pdf.php" method="GET">
                            <button type="submit" class="btn btn-outline-danger" id="pdf">
                                <i class="bi bi-trash3"></i>&nbsp; Exportar a PDF
                            </button>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Producto</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($resultado as $res){ 
                                    $id_prod = $res['id_producto']; 
                                    $prod = $res['nombre'];      
                                    $descp = $res['descripcion']; 
                                    $prec = $res['precio']; 
                                    $canti = $res['cantidad']; 
                                    $imag = $res['imagen'];                          
                                ?>
                                <tr>
                                    <th><?php echo  $prod; ?></th>
                                    <th><?php echo  $descp; ?></th>
                                    <th><?php echo  $prec; ?></th>
                                    <th><?php echo  $canti; ?></th>
                                    <th> <iframe class="card-img-top" src="<?php echo  $imag; ?>" width="150" height="150"></iframe></th>
                                    <td>
                                        <form action="modificar.php" method="post">
                                            <input type="text" id="id_prod" name="id_prod" placeholder="id_prod" value="<?php echo $id_prod;?>" class="form-control" hidden>
                                            <button type="submit" class="btn btn-outline-success" id="modificar">
                                                <i class="bi bi-trash3"></i>&nbsp; Modificar
                                            </button>
                                        </form>
                                        <form action="c_pedido.php" method="post">
                                            <input type="text" id="tipo" name="tipo" placeholder="tipo" value="3" class="form-control" hidden>
                                            <input type="text" id="id_prod" name="id_prod" placeholder="id_prod" value="<?php echo $id_prod;?>" class="form-control" hidden>
                                            <button type="submit" class="btn btn-outline-danger" id="quitar">
                                                <i class="bi bi-trash3"></i>&nbsp; Quitar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>