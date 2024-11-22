const container_selects = document.querySelector("#container_selects")
const agregar_select= document.querySelector('#agregar_select')
let id_select = 1
const formAprendiz = document.querySelector("#formAprendiz");



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
