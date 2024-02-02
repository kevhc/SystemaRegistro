const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

const myModal = new bootstrap.Modal(modalRegistro);

document.addEventListener('DOMContentLoaded', function () {
  btnNuevo.addEventListener('click', function () {
    myModal.show();
  });
  //REGISTRAR USUARIO POR AJAX

  frm.addEventListener('submit', function (e) {
    e.preventDefault();
    if (
      frm.nombre.value == '' ||
      frm.apellido.value == '' ||
      frm.email.value == '' ||
      frm.usuario.value == '' ||
      frm.clave.value == '' ||
      frm.rol.value == ''
    ) {
      alertaPersonalizada('warning', 'Todos los campos son requeridos');
    } else {
        const data = new FormData(frm);
      const http = new XMLHttpRequest();
      const url = base_url + 'Usuarios/registrar';
      http.open('POST', url, true);
      http.send(data);
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);

          if(res.tipo=='success'){
            frm.reset();
            myModal.hide();
          }
        }
      }
    }
  });
});
