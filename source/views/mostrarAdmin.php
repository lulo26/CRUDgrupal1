<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Admins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/talleresphp/crudgrupal1/assets/tabla-admins.css">
    <link rel="stylesheet" href="/talleresphp/crudgrupal1/assets/nav-bar.css">

   

</head>
<body>
    <div class="container">

        <div class="row d-flex">
                <div class="col-12 nav-bar d-flex justify-content-around">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a href="index.php?pagina=registro" class="nav-link">Registro (usuarios)</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Usuarios registrados</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link active">Administradores</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="" class="nav-link">Registro (admin)</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Log in</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>    
        </div>

        <div class="row">
            <div class="col-12 btn-volver">
                <a href="index.php?pagina=home">Volver</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 ">
                <h1 style="text-align:center;">Lista de administradores</h1>
                <!--Tabla admins-->
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Apellido(s)</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>a@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>a@gmail.com</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            <td>a@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
                <!--Fin tabla admins-->
            </div>
        </div>
        
    </div>
</body>
</html>