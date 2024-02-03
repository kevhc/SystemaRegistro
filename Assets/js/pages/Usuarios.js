const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

const myModal = new bootstrap.Modal(modalRegistro);

let tblUsuarios;

document.addEventListener('DOMContentLoaded', function () {
  //CARGAR DATOS CON DATATABLE

  tblUsuarios = $('#tblUsuarios').DataTable({
    ajax: {
      url: base_url + 'Usuarios/listar',
      dataSrc: '',
    },
    columns: [
      { data: 'id' },
      { data: 'nombres' },
      { data: 'email' },
      { data: 'usuario' },
      { data: 'fecha' },
      { data: 'acciones' },
    ],

    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
    },

    responsive: true,
  });

  btnNuevo.addEventListener('click', function () {
    title.textContent='NUEVO USUARIO';
    frm.id_usuario.value='';
    frm.reset();
    frm.clave.removeAttribute('readonly','readonly');
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

          if (res.tipo == 'success') {
            frm.reset();
            myModal.hide();
            table.ajax.reload();
          }
        }
      };
    }
  });
});

function eliminar(id) {
  const url = base_url + 'Usuarios/delete/' + id;

  eliminarRegistro(
    'ESTA SEGURO DE ELIMINAR',
    'EL USUARIO NO SE ELIMINARA DE FORMA PERMANENTE',
    'SI ELIMINAR',
    url,
    tblUsuarios
  );
}

function editar(id) {
  const http = new XMLHttpRequest();

  const url = base_url + 'Usuarios/editar/'+id;

  http.open('GET', url, true);

  http.send();

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      frm.id_usuario.value=res.id_usuario;
      frm.nombre.value=res.nombre;
      frm.apellido.value=res.apellido;
      frm.email.value=res.email;
      frm.usuario.value=res.usuario;
      frm.clave.value='0000000000';
      frm.clave.setAttribute('readonly','readonly');
      frm.rol.value=res.rol;
      myModal.show();
    }
  };
}
