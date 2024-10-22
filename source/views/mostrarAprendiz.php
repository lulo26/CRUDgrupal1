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
                            <a href="index.php?pagina=registro" class="nav-link">Registro (usuarios)</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=estudiantes" class="nav-link active">Usuarios registrados</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=admins" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item ">
                            <a href="index.php?pagina=adminregistro" class="nav-link">Registro (admin)</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=cursocrear" class="nav-link">Crear curso</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=cursos" class="nav-link">Ver cursos</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=adminlogin" class="nav-link">Log in</a>
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
    <form action="index.php?pagina=home&action=reporteAprendices" method="post">
            <button type="submit" class="btn btn-primary boton mt-3">descargar reporte</button>
            </form>

    <!--MODAL PARA EDITAR ESTUDIANTES  -->
    <!-- <div class="row">
        <div class="col-12">
            <div class="modal fade" tabindex="-1" id="modal-editar-estudiante">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Editar estudiante</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="formulario">
                      <div class="mb-3">
                        <span>Numero de documento</span>
                        <input type="number" class="form-control">
                      </div>

                      <div class="mb-3">
                        <span>Nombre completo</span>
                        <input type="text" class="form-control" >
                      </div>

                      <div class="mb-3">
                        <span>Apellido(s)</span>
                        <input type="text" class="form-control" >
                      </div>
        
                      <div class="mb-3">
                        <span>Curso</span>
                        <select class="form-select" aria-label="Default select example">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                        </select>
                      </div>

                      <div class="mb-3">
                        <span>Correo electrónico</span>
                        <input type="email" class="form-control">
                      </div>

                      <div class="mb-3">
                        <span>Número de teléfono</span>
                        <input type="text" class="form-control">
                      </div>

                    </form>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>  -->

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>