$(document).ready(function () {
    $.ajax({
        url: base_url + 'Admin/TotalUsuarios',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Suponiendo que el controlador devuelve un array de usuarios
            var totalUsuarios = response.length;
            // Ocultar el número de usuarios primero
            $('#totalUsuarios').hide();
            // Luego mostrarlo gradualmente con una animación de desvanecimiento
            $('#totalUsuarios').text(totalUsuarios).fadeIn(1000);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener el total de usuarios:', error);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: base_url + 'Admin/TotalProductores',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Suponiendo que el controlador devuelve un array de usuarios
            var totalProductores = response.length;
            // Ocultar el número de usuarios primero
            $('#totalProductores').hide();
            // Luego mostrarlo gradualmente con una animación de desvanecimiento
            $('#totalProductores').text(totalProductores).fadeIn(1000);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener el total de usuarios:', error);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: base_url + 'Admin/TotalCertificados',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Suponiendo que el controlador devuelve un array de usuarios
            var totalCertificados = response.length;
            // Ocultar el número de usuarios primero
            $('#totalCertificados').hide();
            // Luego mostrarlo gradualmente con una animación de desvanecimiento
            $('#totalCertificados').text(totalCertificados).fadeIn(1000);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener el total de usuarios:', error);
        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: base_url + 'Admin/TotalPreguntas',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            // Suponiendo que el controlador devuelve un array de usuarios
            var totalPreguntas = response.length;
            // Ocultar el número de usuarios primero
            $('#totalPreguntas').hide();
            // Luego mostrarlo gradualmente con una animación de desvanecimiento
            $('#totalPreguntas').text(totalPreguntas).fadeIn(1000);
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener el total de usuarios:', error);
        }
    });
});

$(document).ready(function () {
    // Hacer una solicitud AJAX para obtener los datos del controlador
    $.ajax({
        url: base_url + 'Admin/UltimaConexion',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Obtención del elemento ul por su ID
            var ultimaConexion = $("#ultimaConexion");

            // Iterar sobre los datos y generar la lista de tiempo
            data.forEach(function (conexion) {
                // Crear elementos de lista y asignar contenido
                var li = $("<li>").addClass("timeline-item d-flex position-relative overflow-hidden");

                var timeDiv = $("<div>").addClass("timeline-time text-dark flex-shrink-0 text-end").text(conexion.ultima_conexion);

                var badgeDiv = $("<div>").addClass("timeline-badge-wrap d-flex flex-column align-items-center");
                var badgeSpan = $("<span>").addClass("timeline-badge border-2 border border-primary flex-shrink-0 my-8");
                var badgeBorderSpan = $("<span>").addClass("timeline-badge-border d-block flex-shrink-0");

                var descDiv = $("<div>").addClass("timeline-desc fs-3 text-dark mt-n1").text(conexion.usuario);

                // Ocultar el elemento antes de agregarlo para animar su aparición
                li.hide();

                // Agregar elementos al elemento de lista
                badgeDiv.append(badgeSpan, badgeBorderSpan);
                li.append(timeDiv, badgeDiv, descDiv);

                // Agregar el elemento de lista a la lista de tiempo con efecto de desvanecimiento
                ultimaConexion.append(li);
                li.fadeIn(1200); // Agregar el efecto de desvanecimiento al mostrar el elemento
            });
        },
        error: function (xhr, status, error) {
            console.error('Error al obtener las últimas conexiones:', error);
        }
    });
});