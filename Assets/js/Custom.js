function alertaPersonalizada(type, mensaje) {
  Swal.fire({
    icon: type,
    title: mensaje,
    showConfirmButton: false,
    timer: 1500,
  });
}

function eliminarRegistro(title, text, accion, url, table) {
  Swal.fire({
    title: title,
    text: text,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: accion,
  }).then((result) => {
    if (result.isConfirmed) {

      const http = new XMLHttpRequest();

      http.open('GET', url, true);

      http.send();

      http.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

          const res = JSON.parse(this.responseText);
          alertaPersonalizada(res.tipo, res.mensaje);

          if (res.tipo == 'success') {
            table.ajax.reload();
          }

        };

      }
    }
  });

}

function acceso(params) {
  let timerInterval;
  Swal.fire({
    title: 'Auto close alert!',
    html: 'I will close in <b></b> milliseconds.',
    timer: 2000,
    timerProgressBar: true,
    didOpen: () => {
      Swal.showLoading();
      const timer = Swal.getPopup().querySelector('b');
      timerInterval = setInterval(() => {
        timer.textContent = `${Swal.getTimerLeft()}`;
      }, 100);
    },
    willClose: () => {
      clearInterval(timerInterval);
    },
  }).then((result) => {
    /* Read more about handling dismissals below */
    if (result.dismiss === Swal.DismissReason.timer) {
      console.log('I was closed by the timer');
    }
  });
}

// select2
