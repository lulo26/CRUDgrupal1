<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="assets/nav-bar.css">

</head>
<body>
    
<div class="container" style="text-align:center;">
    <div class="row d-flex">
        <div class="col-12 nav-bar d-flex justify-content-around">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php?pagina=registro" class="nav-link active">Registro (usuarios)</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=estudiantes" class="nav-link">Usuarios registrados</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=admins" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item ">
                            <a href="index.php?pagina=adminregistro&action=adminregistrar" class="nav-link">Registro (admin)</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Log in</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mt-4">
            <h1>INICIO</h1>
        </div>
    </div>

    <!-- <div class="row d-flex mt-4 links">
        <div class="col-3">
           <a class="btn" id="btn-registro" href="index.php?pagina=registro">
            Registro
        </a>
        </div>

        <div class="col-3 link">
             <a class="btn" id="btn-tabla-registros" href="index.php?pagina=estudiantes">
                Todos los estudiantes registrados
             </a>
        </div>

        <div class="col-3 link">
             <a class="btn" id="btn-tabla-registros" href="index.php?pagina=adminregistro">
                Registro (admin)
             </a>
        </div>

        <div class="col-3 link">
             <a class="btn" id="btn-tabla-registros" href="index.php?pagina=inicioadmin">
                Inicio de Sesión (admin)
             </a>
        </div>

        <div class="col-3 link">
             <a class="btn" id="btn-tabla-registros" href="index.php?pagina=admins">
                Tabla con admins registrados
             </a>
        </div>

    </div> -->
</div>

    <script>
        let btn_registro=document.querySelector('#btn-registro')
        let btn_tabla=document.querySelector('#btn-tabla-registros')

        btn_registro.addEventListener('click',()=>{
            window.open("../views/crearAprendiz.php",'_self');
        })

        btn_tabla.addEventListener('click',()=>{
            window.open("../views/mostrarAprendiz.php",'_self');
        })

    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>