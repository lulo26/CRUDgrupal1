const container_selects = document.querySelector("#container_selects")
const agregar_select= document.querySelector('#agregar_select')
let id_select = 1
const formAprendiz = document.querySelector("#formAprendiz");

let numeroDoc = document.querySelector('#numeroDoc')
let nombre = document.querySelector('#nombre')
let apellido = document.querySelector('#apellido')
let genero = document.querySelector('#genero')
let curso = document.querySelector('#curso')
let fecha_nac = document.querySelector('#fecha_nac')
let telefono = document.querySelector('#telefono')
let correo = document.querySelector('#correo')

let accion = "";
let atributo_id = numeroDoc.getAttribute('readonly')

if (atributo_id == null) {
    accion = "crear"
}else{
    accion = "editar"
}

const on = (element, event, selector, handler) => {
    element.addEventListener(event, (e) => {
      if (e.target.closest(selector)) {
        handler(e);
      }
    });
  };

  formAprendiz.addEventListener('submit',(e)=>{
    e.preventDefault();
    

    if (accion == "crear") {
        const inputs = [numeroDoc,nombre,apellido,genero,curso,fecha_nac,telefono,correo]
        let campos_vacios = 0

        for (let index = 0; index < inputs.length; index++) {
            if (inputs[index].value.trim().length==0) {
                campos_vacios++
            };
        }

        if (campos_vacios>0) {
            alert("Ingrese todos los datos")
        }else{
            alert("Registro completado")
            location.assign("index.php?pagina=home")
        }
    }
    
  })

on(document,"click","#borrar_cursos",(e)=>{    
     e.target.parentNode.parentNode.remove()
})
