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
          <h1>Registro (Admin)</h1>
          <!--FORMULARIO-->
          <form class="formulario" action="<?php 'index.php?pagina=adminregistro&action=adminregistrar' ?>" method="post">
                <div class="mb-3">
                    <span>Nombre(s)</span>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <span>Apellido(s)</span>
                    <input type="text" class="form-control" name="apellido" id="apellido" required>
                </div>
                <div class="mb-3">
                    <span>Correo electrónico</span>
                    <input type="email" class="form-control" name="mail" id="mail" required>
                </div>
                <div class="mb-3">
                    <span>Nombre de usuario</span>
                    <input type="text" class="form-control" name="usuario" id="usuario" required>
                </div>
                <div class="mb-3">
                    <span>Contraseña</span>
                    <input type="password" class="form-control" name="pass" id="pass" required>
                </div>
                <div class="mb-3 btn-enviar">
                    <button type="submit" class="btn btn-primary boton" name="action" value="adminregistrar">agregar</button>
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