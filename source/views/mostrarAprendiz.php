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
    
    <link rel="stylesheet" href="/assets/tabla-estudiantes.css">

</head>
<body>

  <div class="container">

    <div class="row">
      <div class="col-12 btn-volver">
        <a href="/talleresphp/CRUDgrupal1/source/views/crearAprendiz.php">Volver</a>
      </div>
    </div>

    <div class="row row-tabla-estudiantes">
      <div class="col-12">
        <h1>LISTA DE ESTUDIANTES</h1>

        <!--TABLA ESTUDIANTES-->
        <table class="table tabla-estudiantes">
          <thead>
            <tr>
              <th scope="col">Identificación</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Curso</th>
              <th scope="col">Correo</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <?php if (!empty($users)): ?>
          <tbody>
              <!-- Mostrar Usuarios -->
            <tr> <?php foreach($users as $user): ?> 
              <td> <?php echo htmlspecialchars($user['numeroDoc']) ?>:</td>

              <td> <?php echo htmlspecialchars($user['nombre']) ?></td>

              <td> <?php echo htmlspecialchars($user['apellido']) ?></td>

              <td> <?php echo htmlspecialchars($user['genero']) ?></td>

              <td> <?php echo htmlspecialchars($user['fecha_nac']) ?></td>

              <td> <?php echo htmlspecialchars($user['telefono']) ?></td>

              <td> <?php echo htmlspecialchars($user['correo']) ?></td>
              <td>  <i class="bi bi-pencil-square"></i></td>
              <?php endforeach; ?>
            </tr>
            <?php else: ?>
          </tbody>
          <!--mostrar mensaje cuando no hay usuarios-->
          <p>No hay usuarios registrados</p>
          <?php endif; ?>

        </table>
        <!--FIN TABLA-->
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>