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
          <h1><?php echo isset($admin) ? 'EDITAR ADMINISTRADOR' : 'REGISTRO (ADMINS)';
          ?></h1>
          <!--FORMULARIO-->
          <form class="formulario" action="<?php echo isset($admin) ? 'index.php?pagina=editaradmin&action=admineditar' : 'index.php?pagina=adminregistro&action=adminregistrar' ?>" method="post">

          <input type="text" hidden name="idadmin" value="<?php echo isset($admin) ?
          htmlspecialchars($admin['idadmin']) : ''; ?>">

                <div class="mb-3">
                    <span>Nombre(s)</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo isset($admin) ?
                    htmlspecialchars($admin['nombre']) : ''; ?>"  required>
                </div>
                <div class="mb-3">
                    <span>Apellido(s)</span>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo isset($admin) ?
                    htmlspecialchars($admin['apellido']) : ''; ?>"   required>
                </div>
                <div class="mb-3">
                    <span>Correo electrónico</span>
                    <input type="email" class="form-control" name="mail" id="mail" value="<?php echo isset($admin) ?
                    htmlspecialchars($admin['correo']) : ''; ?>"   required>
                </div>
                <div class="mb-3">
                    <span>Nombre de usuario</span>
                    <input type="text" <?php echo isset($admin) ? 'readonly disabled' : '';?> class="form-control" name="usuario" id="usuario" value="<?php echo isset($admin) ?
                    htmlspecialchars($admin['usuario']) : ''; ?>"   required>
                </div>
                <div class="mb-3">
                    <span>Contraseña</span>
                    <input type="password" class="form-control" name="pass" id="pass">
                </div>
                <div class="mb-3 btn-enviar">
                    <button type="submit" class="btn btn-primary boton" name="<?php echo isset($admin) ? 'action' : 'action';?>" value="<?php echo isset($admin) ? 'admineditar' : 'adminregistrar'; ?>"><?= isset($admin) ? 'Actualizar' : 'Agregar'; ?></button>
                </div>

                <a href="index.php?pagina=admins"><span>VOLVER A LA TABLA</span></a>
                
          </form>
          <!--FIN FORMULARIO-->
          </div>
        </div>
    </div>
</div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>