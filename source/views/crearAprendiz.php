
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insertar un estudiante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>


<div class="container">

    <div class="row row-form">
        <div class="col mt-5 col-formulario">
          <!--FORMULARIO-->
          <h1><?php echo isset($user) ? 'EDITAR ESTUDIANTE' : 'REGISTRO DE ESTUDIANTES';
          ?></h1>
          <form  method="post" class="formulario" id="formAprendiz">
            
                      <div class="mb-3">
                        <span>Numero de documento</span>
                        <input type="number" <?php echo isset($user) ? 'readonly' : ''; ?> class="form-control input-doc" name="numeroDoc" id="numeroDoc" value="<?php echo isset($user) ?
                        $user['numeroDoc'] : ''; ?>" >
                      </div>

                      <div class="mb-3">
                        <span>Nombre completo</span>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo isset($user) ?
                        htmlspecialchars($user['nombre']) : ''; ?>" >
                      </div>

                      <div class="mb-3">
                        <span>Apellido(s)</span>
                        <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo isset($user) ?
                        htmlspecialchars($user['apellido']) : ''; ?>" >
                      </div>

                      <div class="mb-3">
                        <span>Seleccione su género</span>
                        <select class="form-select" aria-label="Default select example" name="genero" id="genero" value="<?php echo isset($user) ?
                        htmlspecialchars($user['genero']) : ''; ?>" >
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                          <option value="No espeficado">Prefiero no específicar</option>
                        </select>
                      </div>


                      <div class="mb-3">
                        <span>Fecha de nacimiento</span>
                        <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" value="<?php echo isset($user) ?
                        $user['fecha_nac'] : ''; ?>" >
                      </div>

                      <div class="mb-3">
                        <span>Número de teléfono</span>
                        <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo isset($user) ?
                        htmlspecialchars($user['telefono']) : ''; ?>">
                      </div>

                      <div class="mb-3">
                        <span>Correo electrónico</span>
                        <input type="email" class="form-control" name="correo" id="correo" value="<?php echo isset($user) ?
                        htmlspecialchars($user['correo']) : ''; ?>" >
                      </div>

                      <div class="mb-3 btn-enviar">
                        <button type="submit" class="btn btn-primary boton" name="action" value="<?php echo isset($user) ? 'editar' : 'agregar'; ?>"><?= isset($user) ? 'Actualizar' : 'Agregar'; ?></button>
                      </div>

                      <a href="index.php?pagina=estudiantes"><span>TABLA APRENDICES</span></a>

                    </form>
              <!--FIN FORMULARIO-->
              </div>
            </div>
    </div>
    
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="assets/js/asignar_cursos.js"></script>

</body>
</html>