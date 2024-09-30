<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/talleresphp/crudgrupal1/assets/login.css">
    
</head>
<body>

<div class="container">
    <div class="row row-form">
        <div class="col mt-5 col-formulario log-in">
          <h1>Inicio de sesión (Admin)</h1>
          <!--FORMULARIO-->
          <form class="mt-3 formulario" action="" method="post">
                <div class="mb-3">
                    <span>Usuario</span>
                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" value="<?php echo isset($user) ?
                    htmlspecialchars($user['nombre']) : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <span>Contraseña</span>
                    <input type="password" class="form-control" name="apellido" id="apellido" value="<?php echo isset($user) ?
                    htmlspecialchars($user['nombre']) : ''; ?>" required>
                </div>
       
                <div class="mb-3 btn-enviar">
                    <button type="submit" class="btn btn-primary boton" name="<?php echo isset($user) ? 'action' : 'action';?>" value="<?php echo isset($user) ? 'editar' : 'agregar'; ?>"><?= isset($user) ? 'actualizar' : 'agregar'; ?></button>
                  </div>

                <a href="index.php"><span>VOLVER AL INICIO</span></a>
                

          </form>    
          <!--FIN FORMULARIO-->
          </div>
        </div>
    </div>
</div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>