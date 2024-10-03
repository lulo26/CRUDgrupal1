<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Admins</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="assets/tabla-admins.css">
    <link rel="stylesheet" href="assets/nav-bar.css">

   

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
                                    <a href="index.php?pagina=estudiantes" class="nav-link">Usuarios registrados</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?pagina=admins" class="nav-link active">Administradores</a>
                                </li>
                                <li class="nav-item ">
                                    <a href="index.php?pagina=adminregistro" class="nav-link">Registro (admin)</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?pagina=adminlogin" class="nav-link">Log in</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
        </div>


        <div class="row">
            <div class="col-12 mt-4">
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
                            <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $admin): ?>
                        <tr>
                        <th scope="col"><?php echo htmlspecialchars($admin['idadmin']) ?></th>
                            <td><?php echo htmlspecialchars($admin['nombre']) ?></td>
                            <td><?php echo htmlspecialchars($admin['apellido']) ?></td>
                            <td><?php echo htmlspecialchars($admin['usuario']) ?></td>
                            <td><?php echo htmlspecialchars($admin['correo']) ?></td>
                            <td> <a href="index.php?pagina=editaradmin&id=<?php echo $admin['idadmin'];?>"><i class="bi bi-pencil-square"></a></i> </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!--Fin tabla admins-->
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>