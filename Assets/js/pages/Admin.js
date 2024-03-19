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

$(function () {
    // Simple Pie Chart -------> PIE CHART
    var options_simple = {
        chart: {
            fontFamily: "inherit",
            width: 380,
            type: "pie",
        },
        colors: ["#ffda9e", "#77dd77", "#fabfb7"],
        labels: ["Si", "No", "No Aplica"],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: "bottom",
                },
            },
        },],
        legend: {
            labels: {
                colors: ["#a1aab2"],
            },
        },
    };

    var chart_pie_simple = new ApexCharts(
        document.querySelector("#pastel"),
        options_simple
    );
    chart_pie_simple.render();

    // Realizar una solicitud AJAX para obtener los datos del controlador
    $.ajax({
        url: base_url + 'Admin/ConteoPastel', // Reemplaza 'ruta/hacia/tu/controlador' con la URL de tu controlador que devuelve los datos JSON
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Extraer datos de 'conteo' y 'opcion' para usar en ApexCharts
            var seriesData = data.map(function (item) {
                return item.conteo;
            });
            var labelsData = data.map(function (item) {
                return item.opcion;
            });

            // Actualizar el gráfico de pastel con los datos obtenidos
            chart_pie_simple.updateSeries(seriesData);
            chart_pie_simple.updateOptions({
                labels: labelsData
            });
        },
        error: function (xhr, status, error) {
            console.error(error);
        }
    });
});


$(function () {
    // Realizar una solicitud AJAX para obtener los datos del servidor
    $.ajax({
        url: base_url + 'Admin/ConteoFormulario',  // Ruta al script PHP que obtiene los datos del servidor
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Configurar las series del gráfico con los datos obtenidos
            var seriesData = [];

            // Iterar sobre los datos obtenidos y agregarlos a las series del gráfico
            for (var key in data[0]) {
                if (key !== 'nombre_completo' && key !== 'id_formulario' && key !== 'id_productor') {
                    var dataPoints = [];
                    for (var i = 0; i < data.length && i < 3; i++) {
                        dataPoints.push(data[i][key]);
                    }
                    seriesData.push({ name: key, data: dataPoints });
                }
            }

            // Configurar el gráfico con las series actualizadas y las categorías en el eje X
            var chartOptions = {
                series: seriesData,
                chart: {
                    type: "bar",
                    height: 345,
                    offsetX: -15,
                    toolbar: { show: true },
                    foreColor: "#adb0bb",
                    fontFamily: 'inherit',
                    sparkline: { enabled: false },
                },
                colors: ["#5D87FF", "#49BEFF"],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "35%",
                        borderRadius: [6],
                        borderRadiusApplication: 'end',
                        borderRadiusWhenStacked: 'all'
                    },
                },
                markers: { size: 0 },
                dataLabels: { enabled: false },
                legend: { show: false },
                grid: {
                    borderColor: "rgba(0,0,0,0.1)",
                    strokeDashArray: 3,
                    xaxis: { lines: { show: false } }
                },
                xaxis: {
                    type: "category",
                    categories: data.map(function (item) {
                        return item.nombre_completo;
                    }),
                    labels: { style: { cssClass: "grey--text lighten-2--text fill-color" } },
                },
                yaxis: {
                    show: true,
                    min: 0,
                    max: 80,
                    tickAmount: 4,
                    labels: { style: { cssClass: "grey--text lighten-2--text fill-color" } }
                },
                stroke: { show: true, width: 3, lineCap: "butt", colors: ["transparent"] },
                tooltip: { theme: "light" },
                responsive: [{
                    breakpoint: 600,
                    options: { plotOptions: { bar: { borderRadius: 3 } } }
                }]
            };

            // Crear una nueva instancia de ApexCharts y renderizar el gráfico
            var chartInstance = new ApexCharts(document.querySelector("#barras"), chartOptions);
            chartInstance.render();
        },
        error: function (xhr, status, error) {
            // Manejar errores si la solicitud falla
            console.error(error);
        }
    });
});