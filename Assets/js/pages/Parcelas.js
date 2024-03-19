const frm = document.querySelector('#formulario');
const btnNuevo = document.querySelector('#btnNuevo');
const modalRegistro = document.querySelector('#modalRegistro');
const title = document.querySelector('#title');

const myModal = new bootstrap.Modal(modalRegistro);

let tblParcelas;

document.addEventListener('DOMContentLoaded', function () {

    //CARGAR DATOS CON DATATABLE
    tblParcelas = $('#tblParcelas').DataTable({
        ajax: {
            url: base_url + 'Parcelas/listar',
            dataSrc: '',
        },
        columns: [
            { data: 'id' },
            { data: 'dni' },
            { data: 'finca' },
            { data: 'cafe_pro' },
            { data: 'cafe_creci' },
            { data: 'ha_total' },
            { data: 'pro_anterior' },
            { data: 'pro_estimado' },
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
        title.textContent = 'NUEVA PARCELA';
        frm.id_parcelas.value = '';
        frm.reset();
        myModal.show();
    });
    //REGISTRAR USUARIO POR AJAX

    frm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (
            frm.dni.value == ''
            // frm.finca.value == '' ||
            // frm.caproduccion.value == '' ||
            // frm.cacrecimiento.value == '' ||
            // frm.purma.value == '' ||
            // frm.bosque.value == '' ||
            // frm.llevar.value == '' ||
            // frm.paotros.value == '' ||
            // frm.hatotal.value == '' ||
            // frm.Proanterior.value == '' ||
            // frm.Proestimada.value == '' ||
            // frm.lotes.value == '' ||
            // frm.has.value == '' ||
            // frm.edad.value == '' ||
            // frm.proEstimada.value == '' ||
            // frm.caturra.value == '' ||
            // frm.pache.value == '' ||
            // frm.catimor.value == '' ||
            // frm.catuai.value == '' ||
            // frm.typica.value == '' ||
            // frm.borbon.value == '' ||
            // frm.otro.value == ''
        ) {
            alertaPersonalizada('warning', 'Todos los campos son requeridos');
        } else {
            const data = new FormData(frm);
            const http = new XMLHttpRequest();
            const url = base_url + 'Parcelas/registrar';
            http.open('POST', url, true);
            http.send(data);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);

                    alertaPersonalizada(res.tipo, res.mensaje);

                    if (res.tipo == 'success') {
                        frm.reset();
                        myModal.hide();
                        tblParcelas.ajax.reload();
                    }

                }
            };
        }
    });


});

function eliminar(id) {

    const url = base_url + 'Parcelas/delete/' + id;

    eliminarRegistro(
        'ESTA SEGURO DE ELIMINAR',
        'LA PARCELA NO SE ELIMINARA DE FORMA PERMANENTE',
        'SI ELIMINAR',
        url,
        tblParcelas
    );
}

function editar(id) {
    const http = new XMLHttpRequest();

    const url = base_url + 'Parcelas/editar/' + id;

    http.open('GET', url, true);

    http.send();

    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            title.textContent = 'EDITAR PARCELA';
            frm.id_parcelas.value = res.id;
            frm.finca.value = res.finca;
            frm.caproduccion.value = res.cafe_pro;
            frm.cacrecimiento.value = res.cafe_creci;
            frm.purma.value = res.purma;
            frm.bosque.value = res.bosque;
            frm.llevar.value = res.pan_llevar;
            frm.paotros.value = res.pasto;
            frm.hatotal.value = res.ha_total;
            frm.Proanterior.value = res.pro_anterior;
            frm.Proestimada.value = res.pro_estimado;
            frm.lotes.value = res.lote;
            frm.has.value = res.ha;
            frm.edad.value = res.edad;
            frm.proEstimada.value = res.pro_estimado2;
            frm.caturra.value = res.caturra;
            frm.pache.value = res.pache;
            frm.catimor.value = res.catimor;
            frm.catuai.value = res.catuai;
            frm.typica.value = res.typica;
            frm.borbon.value = res.borbon;
            frm.otro.value = res.otro;
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
function agregarContenedor(contenedor) {
    // Clona el contenedor
    var contenedorClonado = contenedor.cloneNode(true);


    // Aplica estilos CSS al contenedor clonado
    contenedorClonado.style.marginTop = '20px'; // Cambia el valor según sea necesario

    // Crea un nuevo botón
    var nuevoBoton = document.createElement('button');
    nuevoBoton.className = 'btn btn-danger mt-3';
    nuevoBoton.textContent = 'Eliminar'; // Texto del botón
    nuevoBoton.addEventListener('click', function () {
        // Elimina el contenedor cuando se hace clic en el botón
        contenedorClonado.remove();
    });

    // Agrega el botón al contenedor clonado
    contenedorClonado.appendChild(nuevoBoton);

    // Agrega el clon debajo del último contenedor
    contenedor.parentNode.insertBefore(contenedorClonado, contenedor.nextSibling);
}