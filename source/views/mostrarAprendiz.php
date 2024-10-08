<?php
session_start();
if($_SESSION['acceso'] == true && $_SESSION['user'] != null){
    $nombreuser = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de estudiantes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/tabla-estudiantes.css">

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
                            <a href="index.php?pagina=home" class='nav-link'>
                                <?php  
                                echo htmlspecialchars($nombreuser);
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=registro" class="nav-link">Registro (usuarios)</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=estudiantes" class="nav-link active">Usuarios registrados</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=admins" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item ">
                            <a <?php if ($_SESSION['acceso']==true) echo 'hidden'; ?> href="index.php?pagina=adminregistro" class="nav-link">Registro (admin)</a>
                        </li>
                        <li class="nav-item">
                            <a href="
                            <?php echo $_SESSION['acceso']== true ? 'source/controllers/LogOutController.php' : 'index.php?pagina=adminlogin'; ?>" class="nav-link">
                            <?php
                            echo $_SESSION['acceso']==true ? 'Log Out' : 'Log In';
                            ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <!--TABLA ESTUDIANTES-->
    <div class="row">
            <div class="col-12 mt-4 col-tabla">
                <h1 style="text-align:center;">Lista de aprendices</h1>
                <!--Tabla admins-->
                <table class="mt-3 table table-striped tabla-estudiante" id="tabla-estudiante" style="width: 50%;">
                    <thead>
                        <tr>
                          <th scope="col">Identificación</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Género</th>
                          <th scope="col">Curso</th>
                          <th scope="col">Teléfono</th>
                          <th scope="col">Correo</th>
                          <th scope="col">Fecha de Nacimiento</th>
                          <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <?php if (!empty($usersWithCourse)): ?>
                    <tbody>
                    <!-- Mostrar Usuarios -->
                    <?php foreach($usersWithCourse as $user): ?> 
                      <tr>
                        <td> <?php echo htmlspecialchars($user['numeroDoc']) ?></td>

                        <td> <?php echo htmlspecialchars($user['nombre']) ?></td>

                        <td> <?php echo htmlspecialchars($user['apellido']) ?></td>

                        <td> <?php echo htmlspecialchars($user['genero']) ?></td>

                        <td>  <?php echo htmlspecialchars($user['curso_nombre']) ?> </td>

                        <td> <?php echo htmlspecialchars($user['telefono']) ?></td>

                        <td> <?php echo htmlspecialchars($user['correo']) ?></td>              

                        <td> <?php echo htmlspecialchars($user['fecha_nac']) ?></td>

                        <td> <a href="index.php?pagina=editar&id=<?php echo $user['numeroDoc'];?>"><i class="bi bi-pencil-square"></a></i></td>
                        
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <!--mostrar mensaje cuando no hay usuarios-->
                    <?php else: ?>
                    <p>No hay usuarios registrados</p>
                    <?php endif; ?>
                </table>
                <!--Fin tabla admins-->
            </div>
    </div>

    <div class="row">
      <div class="col-12">
          <form action="index.php?pagina=home&action=reporteAprendices" method="post">
                <button type="submit" class="btn btn-primary boton mt-3">Descargar reporte</button>
          </form>
      </div>
    </div>
    



  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>