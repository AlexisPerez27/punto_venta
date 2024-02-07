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
                        <form action="c_pedido.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="tipo" id="tipo" value="1" hidden>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Producto</label>
                                <input type="text" class="form-control" id="producto" name="producto" placeholder="Producto">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion"  name="descripcion" placeholder="Descripcion">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Precio</label>
                                <input type="number"  step="0.001" class="form-control" id="precio"  name="precio" placeholder="Precio">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Cantidad</label>
                                <input type="number"  step="1" class="form-control" id="cantidad"  name="cantidad" placeholder="Cantidad">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen del Producto</label>
                                <input type="file" class="form-control" id="img"  name="img" placeholder="Descripcion">
                                <!-- <input type="text" class="form-control" id="imagen"  name="imagen" placeholder="Descripcion"> -->
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