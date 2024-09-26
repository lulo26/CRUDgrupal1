<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/home.css">

</head>
<body>
    
<div class="container" style="text-align:center;">
    <div class="row">
        <div class="col-12 mt-4">
            <h1>INICIO</h1>
        </div>
    </div>

    <div class="row d-flex mt-4 links">
        <div class="col-6">
           <a class="btn" id="btn-registro" href="index.php?pagina=registro">
            Registro
        </a>
        </div>

        <div class="col-6 link">
             <a class="btn" id="btn-tabla-registros" href="index.php?pagina=estudiantes">
                Todos los estudiantes registrados
             </a>
        </div>

    </div>
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