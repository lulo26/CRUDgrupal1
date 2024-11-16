const container_selects = document.querySelector("#container_selects")
const agregar_select= document.querySelector('#agregar_select')
let id_select = 1


const on = (element, event, selector, handler) => {
    element.addEventListener(event, (e) => {
      if (e.target.closest(selector)) {
        handler(e);
      }
    });
  };

on(document,"click","#borrar_cursos",(e)=>{
     e.target.parentNode.parentNode.remove()
})

function LoadServices(id_select,valor_select) {
    fetch(base_url + `/citas/getServicios`)
    .then((res)=>res.json())
    .then((res)=>{

        for (let index = 0; index < res.length; index++) {
            let opcion = document.createElement('option')
            opcion.value = res[index].id_servicio
            opcion.innerText = res[index].nombre_servicio
            document.getElementById(id_select).appendChild(opcion)
        }

        if (valor_select) {
            document.getElementById(id_select).value=valor_select
        }

    })

}

function LoadGrades(id_select,valor_select) {
    fetch(base_url + `/citas/getServicios`)
    .then((res)=>res.json())
    .then((res)=>{

        for (let index = 0; index < res.length; index++) {
            let opcion = document.createElement('option')
            opcion.value = res[index].id_servicio
            opcion.innerText = res[index].nombre_servicio
            document.getElementById(id_select).appendChild(opcion)
        }

        if (valor_select) {
            document.getElementById(id_select).value=valor_select
        }

    })

}