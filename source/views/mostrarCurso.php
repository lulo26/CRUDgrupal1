<?php

session_start();
if(isset($_SESSION['acceso']) && isset($_SESSION['user'])){

    $nombreuser = $_SESSION['user'];
}else {
    $nombreuser = "Invitado";
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
                            <a href="index.php?pagina=home" class='nav-link'>
                                <?php  
                                echo htmlspecialchars($nombreuser);
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="
                                <?php 
                                if (isset($_SESSION['acceso'])) {
                                    echo 'index.php?pagina=registro';
                                }else {
                                    echo 'index.php?pagina=adminlogin';
                                }
                                ?>" class="nav-link">Registro (Estudiantes)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=estudiantes" class="nav-link">Estudiantes registrados</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=admins" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item ">
                            <a href="
                            <?php echo isset($_SESSION['acceso']) ? 'index.php?pagina=adminregistro' : 'index.php?pagina=adminlogin'; 
                            
                            ?>
                            " class="nav-link">Registro (admin)</a>
                        </li>
                        <li class="nav-item">
                            <a href="
                            
                            <?php echo isset($_SESSION['acceso']) ? 'index.php?pagina=cursocrear' : 'index.php?pagina=adminlogin'; 
                            
                            ?>
                            
                            " class="nav-link">Crear curso</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=cursos" class="nav-link active">Ver cursos</a>
                        </li>
                        <li class="nav-item">
                            <a href="
                            <?php echo isset($_SESSION['acceso']) ? 'source/controllers/LogOutController.php' : 'index.php?pagina=adminlogin'; 
                            
                            ?>" class="nav-link">

                            <?php
                            if (isset($_SESSION['acceso']) ) {
                                echo "Log Out";
                            }else {
                                echo "Log In";
                            }
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
                <h1 style="text-align:center;">Lista de cursos</h1>
                <!--Tabla admins-->
                <table class="table table-striped mt-3" style="width: 50%;">
                    <thead>
                        <tr>
                          <th scope="col">id del curso</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">descripcion</th>
                          <th scope="col">fecha de creación</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <!-- Mostrar Usuarios -->
                    <?php foreach($cursos as $curso): ?> 
                      <tr>
                        <td> <?php echo htmlspecialchars($curso['idcursos']) ?></td>

                        <td> <?php echo htmlspecialchars($curso['nombre']) ?></td>

                        <td> <?php echo htmlspecialchars($curso['descripcion']) ?></td>

                        <td> <?php echo htmlspecialchars($curso['fecha_creacion']) ?></td>

                        <td> <a href="
                        <?php 
                                if (isset($_SESSION['acceso'])) {
                                    echo 'index.php?pagina=cursoeditar&id='.$curso['idcursos'];
                                }else {
                                    echo 'index.php?pagina=adminlogin';
                                }
                         ?>
                        
                        "><i class="bi bi-pencil-square"></a></i></td>
                        
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <!--mostrar mensaje cuando no hay usuarios-->
                  
                </table>
                <!--Fin tabla admins-->
            </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>