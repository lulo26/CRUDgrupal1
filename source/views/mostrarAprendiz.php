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
    
    <link rel="stylesheet" href="assets/tabla-estudiantes.css">

    <link rel="stylesheet" href="assets/nav-bar.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                            <a href="index.php?pagina=estudiantes" class="nav-link active">Estudiantes registrados</a>
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
                            <a href="index.php?pagina=cursos" class="nav-link">Ver cursos</a>
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

    <!--Modal asignar cursos-->
    <div class="modal fade" id="modalAsignarCursos" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar cursos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <span>Estudiantes</span>
                        <select class="form-select" aria-label="Default select example" name="estudiante" id="estudiante">
                          <option value="0" selected>Seleccione un estudiante</option>

                          <?php foreach($users as $estudiante) : ?>
                            <option value="<?php echo $estudiante['numeroDoc'] ?>">
                                <?php
                                echo $estudiante['nombre'];
                                ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <span>Cursos</span>
                    </div>
                    
                    <div class="mb-3">
                        
                        <?php 
                        $contador = 1;

                        foreach($courses as $curso) : ?>
                            <input type="checkbox" name="cursos[]" id="<?php echo $contador?>" autocomplete="off"
                            value="<?php
                            echo $curso['idcursos'];
                            ?>">
                            <label for="<?php echo $contador?>">
                                <?php
                                echo $curso['nombre']
                                ?>
                            </label><br>
                            
                            <?php $contador++; ?>
                        <?php endforeach ?>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_asignar">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
            
            </div>
        </div>
    </div>
    <!--FIN MODAL-->

    <div class="row mt-4">
            <div class="col">
                    <div class="col-12 mt-4 col-tabla">
                        <h1 style="text-align:center;">Lista de Estudiantes</h1>
                        <?php if (!empty($users)): ?>

                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalAsignarCursos">Asignar cursos</button>

                        <!--TABLA ESTUDIANTES-->
                        <table class="mt-3 table table-striped tabla-estudiante" id="tabla-estudiante" style="width: 100%;">
                            <thead>
                                <tr>
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Género</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <!-- Mostrar Usuarios -->
                                <?php foreach($users as $user): ?> 
                                <tr>
                                    <td> <?php echo htmlspecialchars($user['numeroDoc']) ?></td>

                                    <td> <?php echo htmlspecialchars($user['nombre']) ?></td>

                                    <td> <?php echo htmlspecialchars($user['apellido']) ?></td>

                                    <td> <?php echo htmlspecialchars($user['genero']) ?></td>

                                    <td> <?php echo htmlspecialchars($user['telefono']) ?></td>

                                    <td> <?php echo htmlspecialchars($user['correo']) ?></td>              

                                    <td> <?php echo htmlspecialchars($user['fecha_nac']) ?></td>

                                    <td> 
                                        <a class="btn btn-primary icon_action" href="
                                            <?php 
                                            if (isset($_SESSION['acceso'])) {
                                                echo 'index.php?pagina=editar&id='.$user['numeroDoc'];
                                            }else {
                                                echo 'index.php?pagina=adminlogin';
                                            }
                                            ?>">
                                            <i class="bi bi-pencil-square"></i>    
                                        </a>

                                        <a class="btn btn-secondary icon_action" rel="<?php echo isset($user['numeroDoc']) ? $user['numeroDoc'] : '' ?>">

                                            <i class="bi bi-three-dots"></i>
                                                
                                        </a>
                                        

                                    </td>
                                    
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!--Fin tabla admins-->
                    </div>
            </div>
            
    </div>

    <div class="row">
                <div class="col">
                        <form action="index.php?pagina=home&action=reporteAprendices" method="post">
                            <button type="submit" class="btn btn-primary boton mt-3">Descargar reporte</button>
                        </form>
                </div>
    </div>

    <!--mostrar mensaje cuando no hay usuarios-->
    <?php else: ?>
        <p>No hay usuarios registrados</p>
    <?php endif; ?>
            
    
   
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    


</body>

</html>