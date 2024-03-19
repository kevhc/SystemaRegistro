
const frm = document.querySelector('#formulario');
$(document).ready(function () {
    $('.productor').select2({
        placeholder: 'Buscar Productor',
        ajax: {
            url: base_url + "NuevoFormulario/buscarProductor",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Escuchar el evento input para realizar la búsqueda en tiempo real
    $('.productor').on('input', function () {
        $(this).select2('open'); // Abre el dropdown del select2
        $(this).trigger('change'); // Dispara el evento change para realizar la búsqueda
    });
});

$(document).ready(function () {
    $('.certificados').select2({
        placeholder: 'Buscar Certificados',
        ajax: {
            url: base_url + "NuevoFormulario/buscarCertificado",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Escuchar el evento input para realizar la búsqueda en tiempo real
    $('.certificados').on('input', function () {
        $(this).select2('open'); // Abre el dropdown del select2
        $(this).trigger('change'); // Dispara el evento change para realizar la búsqueda
    });
});

$(document).ready(function () {
    $('.parcelas').select2({
        placeholder: 'Buscar Parcelas',
        ajax: {
            url: base_url + "NuevoFormulario/buscarParcelas",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    // Escuchar el evento input para realizar la búsqueda en tiempo real
    $('.parcelas').on('input', function () {
        $(this).select2('open'); // Abre el dropdown del select2
        $(this).trigger('change'); // Dispara el evento change para realizar la búsqueda
    });
});


document.addEventListener('DOMContentLoaded', function () {



    //CARGAR DATOS CON DATATABLE
    tblFormulario = $('#tblFormulario').DataTable({
        ajax: {
            url: base_url + 'NuevoFormulario/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'preguntas' },
            { data: 'opciones' },
            { data: 'observaciones' },
        ],

        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
        },

        responsive: true,

    });


    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (
            frm.codigoGenerado.value == '' ||
            frm.productor.value == '' ||
            frm.certificados.value == '' ||
            frm.parcelas.value == ''

        ) {
            alertaPersonalizada('warning', 'Todos los campos son requeridos');
        } else {
            const data = new FormData(frm);
            const http = new XMLHttpRequest();
            const url = base_url + 'NuevoFormulario/registrar';
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    console.log(res);
                    alertaPersonalizada(res.tipo, res.mensaje);

                    if (res.tipo == 'success') {
                        frm.reset();
                        setTimeout(function () {
                            window.location.href = base_url + 'Formulario';
                        }, 1500); // 3000 milisegundos = 3 segundos
                    }

                }
            };
        }
    });

});

