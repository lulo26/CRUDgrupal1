<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <div class="row row-form">
        <div class="col mt-5 col-formulario">
          <h1><?php echo isset($curso) ? 'EDITAR CURSO' : 'CREAR CURSO';
          ?></h1>
          <!--FORMULARIO-->
          <form class="formulario" action="<?php echo isset($curso) ? 'index.php?pagina=editaradmin&action=cursoeditar' : 'index.php?pagina=adminregistro&action=cursocrear' ?>" method="post">

          <input type="text" hidden name="idadmin" value="<?php echo isset($curso) ?
          htmlspecialchars($curso['idcurso']) : ''; ?>">

                <div class="mb-3">
                    <span>Nombre(s)</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo isset($curso) ?
                    htmlspecialchars($curso['nombre']) : ''; ?>"  required>
                </div>
                <div class="mb-3">
                    <span>descripcion</span>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo isset($curso) ?
                    htmlspecialchars($curso['descripcion']) : ''; ?>"   required>
                </div>
                <div class="mb-3">
                    <span>Fecha registro</span>
                    <input type="date" class="form-control" name="fecha_creacion" id="maifecha_creacionl" value="<?php echo isset($curso) ?
                    htmlspecialchars($curso['fecha_creacion']) : ''; ?>"   required>
                </div>
                <div class="mb-3 btn-enviar">
                    <button type="submit" class="btn btn-primary boton" name="<?php echo isset($curso) ? 'action' : 'action';?>" value="<?php echo isset($curso) ? 'cursoeditar' : 'cursocrear'; ?>"><?= isset($curso) ? 'Actualizar' : 'Agregar'; ?></button>
                </div>

                <a href="index.php?pagina=cursos"><span>VOLVER A LA TABLA</span></a>
                
          </form>
          <!--FIN FORMULARIO-->
          </div>
        </div>
    </div>
</div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>