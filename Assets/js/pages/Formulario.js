const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

// const myModal = new bootstrap.Modal(modalRegistro);

let tblProductores;

document.addEventListener('DOMContentLoaded', function () {

    //CARGAR DATOS CON DATATABLE
    tblFormulario = $('#tblFormulario').DataTable({
        ajax: {
            url: base_url + 'Formulario/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'codigo' },
            { data: 'nombre' },
            { data: 'certificados' },
            { data: 'fecha' },
            { data: 'acciones' },
        ],

        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },

        responsive: true,

    });

    btnNuevo.addEventListener('click', function () {
        window.location.href = base_url + 'NuevoFormulario';
    });


    //REGISTRAR USUARIO POR AJAX


});

function eliminar(id) {

    const url = base_url + 'Formulario/delete/' + id;

    eliminarRegistro(
        'ESTA SEGURO DE ELIMINAR',
        'EL FORMULARIO NO SE ELIMINARA DE FORMA PERMANENTE',
        'SI ELIMINAR',
        url,
        tblFormulario
    );
}

function editar(id) {
    const http = new XMLHttpRequest();

    const url = base_url + 'NuevoFormulario/editar/' + id;

    http.open('GET', url, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            frm.id_formulario.value = res.id;
            console.log(res);
        }
    };
}


