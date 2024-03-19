const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

const myModal = new bootstrap.Modal(modalRegistro);

let tblPreguntas;

document.addEventListener('DOMContentLoaded', function () {

    //CARGAR DATOS CON DATATABLE
    tblPreguntas = $('#tblPreguntas').DataTable({
        ajax: {
            url: base_url + 'Preguntas/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'preguntas' },
            { data: 'estado' },
            { data: 'acciones' }
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
        title.textContent = 'NUEVA PREGUNTA';
        frm.id_preguntas.value = '';
        frm.reset();
        myModal.show();
    });
    //REGISTRAR USUARIO POR AJAX

    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (
            frm.preguntas.value == ''

        ) {
            alertaPersonalizada('warning', 'Todos los campos son requeridos');
        } else {
            const data = new FormData(frm);
            const http = new XMLHttpRequest();
            const url = base_url + 'Preguntas/registrar';
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);

                    alertaPersonalizada(res.tipo, res.mensaje);

                    if (res.tipo == 'success') {
                        frm.reset();
                        myModal.hide();
                        tblPreguntas.ajax.reload();
                    }

                }
            };
        }
    });
});

function eliminar(id) {

    const url = base_url + 'Preguntas/delete/' + id;

    eliminarRegistro(
        'ESTA SEGURO DE ELIMINAR',
        'LA PREGUNTA NO SE ELIMINARA DE FORMA PERMANENTE',
        'SI ELIMINAR',
        url,
        tblPreguntas
    );
}

function editar(id) {
    const http = new XMLHttpRequest();

    const url = base_url + 'Preguntas/editar/' + id;

    http.open('GET', url, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            title.textContent = 'EDITAR PREGUNTAS';
            frm.id_preguntas.value = res.id;
            frm.preguntas.value = res.preguntas;
            myModal.show();
        }
    };
}

