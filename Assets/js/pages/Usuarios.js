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
      { data: 'imagen' },
      { data: 'acciones' },
    ],

    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
    },

    responsive: true,

    dom: "<'row'<'col-lg-4'<'dataTables_length'l>><'col-lg-4 text-center'B><'col-lg-4'<'d-flex justify-content-lg-end'f>>>" +
      "<'row'<'col-12'tr>>" +
      "<'row'<'col-lg-5'i><'col-lg-7'p>>",

    buttons: [
      {
        extend: 'pdf',
        className: 'btn btn-danger',
        text: '<i class="ti ti-file-text fs-5"></i>' // Icono de PDF
      },
      {
        extend: 'excel',
        className: 'btn btn-success',
        text: '<i class="ti ti-file-spreadsheet fs-5"></i>' // Icono de Excel
      },
      {
        extend: 'print',
        className: 'buttons-print',
        text: '<i class="ti ti-printer fs-5"></i>' // Icono de Impresión
      }
    ]

  });

  btnNuevo.addEventListener('click', function () {
    title.textContent = 'NUEVO USUARIO';
    frm.id_usuario.value = '';
    frm.reset();
    frm.clave.removeAttribute('readonly');
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
            document.getElementById('imagenPreview').src = ''; // Limpiar la imagen
            // document.getElementById('imagenPreview').style.display = 'none'; // Ocultar la imagen
            tblUsuarios.ajax.reload();
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

  const url = base_url + 'Usuarios/editar/' + id;

  http.open('GET', url, true);

  http.send();

  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      title.textContent = 'EDITAR USUARIO';
      frm.id_usuario.value = res.id;
      frm.nombre.value = res.nombre;
      frm.apellido.value = res.apellido;
      frm.email.value = res.email;
      frm.usuario.value = res.usuario;
      frm.clave.value = '0000000000';
      frm.clave.setAttribute('readonly', 'readonly');
      frm.rol.value = res.rol;
      frm.foto_actual.value = res.foto;
      const imagenPreview = document.getElementById('imagenPreview');
      imagenPreview.src = base_url + 'Assets/images/usuarios/' + res.foto;
      myModal.show();
      console.log('ID del usuario a editar:', res.foto);
    }
  };
}

//previsualizar imagen
function previewImage() {
  const input = document.getElementById('imagen');
  const preview = document.getElementById('imagenPreview');

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };

    reader.readAsDataURL(input.files[0]);
  } else {
    preview.src = '';
    preview.style.display = 'none';
  }
}