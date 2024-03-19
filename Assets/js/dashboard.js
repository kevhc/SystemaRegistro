// $(function () {


//   // =====================================
//   // Profit
//   // =====================================
//   var chart = {
//     series: [
//       { name: "Si", data: [355] },
//       { name: "No", data: [280] },
//       { name: "No Aplica", data: [280] },
//     ],

//     chart: {
//       type: "bar",
//       height: 345,
//       offsetX: -15,
//       toolbar: { show: true },
//       foreColor: "#adb0bb",
//       fontFamily: 'inherit',
//       sparkline: { enabled: false },
//     },


//     colors: ["#5D87FF", "#49BEFF"],


//     plotOptions: {
//       bar: {
//         horizontal: false,
//         columnWidth: "35%",
//         borderRadius: [6],
//         borderRadiusApplication: 'end',
//         borderRadiusWhenStacked: 'all'
//       },
//     },
//     markers: { size: 0 },

//     dataLabels: {
//       enabled: false,
//     },


//     legend: {
//       show: false,
//     },


//     grid: {
//       borderColor: "rgba(0,0,0,0.1)",
//       strokeDashArray: 3,
//       xaxis: {
//         lines: {
//           show: false,
//         },
//       },
//     },

//     xaxis: {
//       type: "category",
//       categories: ["id_formulario"],
//       labels: {
//         style: { cssClass: "grey--text lighten-2--text fill-color" },
//       },
//     },


//     yaxis: {
//       show: true,
//       min: 0,
//       max: 400,
//       tickAmount: 4,
//       labels: {
//         style: {
//           cssClass: "grey--text lighten-2--text fill-color",
//         },
//       },
//     },
//     stroke: {
//       show: true,
//       width: 3,
//       lineCap: "butt",
//       colors: ["transparent"],
//     },


//     tooltip: { theme: "light" },

//     responsive: [
//       {
//         breakpoint: 600,
//         options: {
//           plotOptions: {
//             bar: {
//               borderRadius: 3,
//             }
//           },
//         }
//       }
//     ]


//   };

//   var chart = new ApexCharts(document.querySelector("#barras"), chart);
//   chart.render();


// })

// $(function () {
//   // Simple Pie Chart -------> PIE CHART
//   var options_simple = {
//     series: [44, 35, 25],
//     chart: {
//       fontFamily: "inherit",
//       width: 380,
//       type: "pie",
//     },
//     colors: ["#ffda9e", "#77dd77", "#fabfb7"],
//     labels: ["Si", "No", "No Aplica"],
//     responsive: [{
//       breakpoint: 480,
//       options: {
//         chart: {
//           width: 200,
//         },
//         legend: {
//           position: "bottom",
//         },
//       },
//     },],
//     legend: {
//       labels: {
//         colors: ["#a1aab2"],
//       },
//     },
//   };

//   var chart_pie_simple = new ApexCharts(
//     document.querySelector("#pastel"),
//     options_simple
//   );
//   chart_pie_simple.render();


// });