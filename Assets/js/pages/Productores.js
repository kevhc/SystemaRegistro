const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

const myModal = new bootstrap.Modal(modalRegistro);

let tblProductores;

document.addEventListener('DOMContentLoaded', function () {

    //CARGAR DATOS CON DATATABLE
    tblProductores = $('#tblProductores').DataTable({
        ajax: {
            url: base_url + 'Productores/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'nombres' },
            { data: 'dni' },
            { data: 'sexo' },
            { data: 'region' },
            { data: 'telefono' },
            { data: 'imagen' },
            { data: 'fecha' },
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
        title.textContent = 'NUEVO PRODUCTOR';
        frm.id_productores.value = '';
        frm.reset();
        myModal.show();
    });
    //REGISTRAR USUARIO POR AJAX

    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (
            frm.nombre.value == '' ||
            frm.apellido.value == '' ||
            frm.dni.value == '' ||
            frm.sexo.value == '' ||
            frm.caserio.value == '' ||
            frm.distrito.value == '' ||
            frm.provincia.value == '' ||
            frm.region.value == '' ||
            frm.estatus.value == '' ||
            frm.telefono.value == '' ||
            frm.longitud.value == '' ||
            frm.latitud.value == '' ||
            frm.altitud.value == ''
        ) {
            alertaPersonalizada('warning', 'Todos los campos son requeridos');
        } else {
            const data = new FormData(frm);
            const http = new XMLHttpRequest();
            const url = base_url + 'Productores/registrar';
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
                        tblProductores.ajax.reload();
                    }

                }
            };
        }
    });
});

function eliminar(id) {

    const url = base_url + 'Productores/delete/' + id;

    eliminarRegistro(
        'ESTA SEGURO DE ELIMINAR',
        'EL PRODUCTOR NO SE ELIMINARA DE FORMA PERMANENTE',
        'SI ELIMINAR',
        url,
        tblProductores
    );
}

function editar(id) {
    const http = new XMLHttpRequest();

    const url = base_url + 'Productores/editar/' + id;

    http.open('GET', url, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            title.textContent = 'EDITAR USUARIO';
            frm.id_productores.value = res.id;
            frm.nombre.value = res.nombre;
            frm.apellido.value = res.apellido;
            frm.dni.value = res.dni;
            frm.sexo.value = res.sexo;
            frm.caserio.value = res.caserio;
            frm.distrito.value = res.distrito;
            frm.provincia.value = res.provincia;
            frm.region.value = res.region;
            frm.estatus.value = res.estatus;
            frm.telefono.value = res.telefono;
            frm.longitud.value = res.longitud;
            frm.latitud.value = res.latitud;
            frm.altitud.value = res.altitud;
            frm.foto_actual.value = res.foto;
            const imagenPreview = document.getElementById('imagenPreview');
            imagenPreview.src = base_url + 'Assets/images/productores/' + res.foto;
            myModal.show();

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