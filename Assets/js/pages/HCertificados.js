
let tblHCertificados;

document.addEventListener('DOMContentLoaded', function () {

    //CARGAR DATOS CON DATATABLE
    tblProductores = $('#tblHCertificados').DataTable({
        ajax: {
            url: base_url + 'HCertificados/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'certificado' },
            { data: 'nombre' },
            { data: 'fecha' },
            { data: 'evento' },
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

});

