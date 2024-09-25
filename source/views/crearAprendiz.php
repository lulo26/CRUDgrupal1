<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Insertar un estudiante</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="/talleresphp/CRUDgrupal1/assets/style.css">
</head>

<body>


<div class="container">
  
<div class="row row-form">
    <div class="col mt-5 col-formulario">
      <!--FORMULARIO-->
      <h1>REGISTRO DE ESTUDIANTES</h1>
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
    <span>Seleccione su género</span>
    <select class="form-select" aria-label="Default select example">
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
      <option value="No espeficado">Prefiero no específicar</option>
    </select>
  </div>

  <div class="mb-3">
    <span>Curso al que se piensa inscribir: </span>
    <select class="form-select" aria-label="Default select example">
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
    </select>
  </div>

  <div class="mb-3">
    <span>Fecha de nacimiento</span>
    <input type="date" name="" id="" class="form-control">
  </div>

  <div class="mb-3">
    <span>Número de teléfono</span>
    <input type="text" class="form-control">
  </div>

  <div class="mb-3">
    <span>Correo electrónico</span>
    <input type="email" class="form-control">
  </div>

  <div class="mb-3 btn-enviar">
    <button type="submit" class="btn btn-primary boton">
    Enviar
    </button>
  </div>

  <a href="/talleresphp/CRUDgrupal1/source/views/home.php"><span>VOLVER AL INICIO</span></a>

</form>
<!--FIN FORMULARIO-->
     </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>