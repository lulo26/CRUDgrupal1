<?php
session_start();
if($_SESSION['acceso'] == true && $_SESSION['user'] != null){
    $nombreuser = $_SESSION['user'];
}
?>
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
                            <a href="index.php?pagina=home" class='nav-link active'>
                                <?php  
                                echo htmlspecialchars($nombreuser);
                                ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=registro" class="nav-link">Registro (usuarios)</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=estudiantes" class="nav-link">Usuarios registrados</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?pagina=admins" class="nav-link">Administradores</a>
                        </li>
                        <li class="nav-item ">
                            <a <?php if ($_SESSION['acceso']==true) echo 'hidden'; ?> href="index.php?pagina=adminregistro" class="nav-link">Registro (admin)</a>
                        </li>
                        <li class="nav-item">
                            <a href="
                            <?php echo $_SESSION['acceso']== true ? 'source/controllers/LogOutController.php' : 'index.php?pagina=adminlogin'; ?>" class="nav-link">
                            <?php
                            echo $_SESSION['acceso']==true ? 'Log Out' : 'Log In';
                            ?>
                            </a>
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

</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
