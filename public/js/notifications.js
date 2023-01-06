let str = '';

function mostrarMotificacionesCabina() {
    fetch('/notifications/cabina', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        }).then((response) => response.json())
        .then((res) => {

            console.log(res);

            notificaciones = res;

            notificaciones.forEach(n => {

                if (n.visto == false) {
                    var img = 'img/Match_PNG-01.png';
                    var notification = new Notification(n.encabezado, {
                        body: n.cuerpo,
                        icon: img
                    });
                    notification.onshow;
                    notification.onclick = function () {
                        verNotificacion(n._id,n.titulo);
                    }
                }
            });
        }).catch((error) => {
            console.error(error);
        })
}

function verNotificacion(id, nombre) {

    var data = {
        id: id,
        _token: $('meta[name="csrf-token"]').attr('content')
    }

    Swal.fire({
        title: `Cargando...`,
        text: 'Espere un momento',
        icon: 'info',
        allowOutsideClick: true,
        onBeforeOpen: () => {
            Swal.showLoading();
        },
    });

    fetch('/notifications/watch', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data)
        }).then((resp) => resp.json())
            .then(function (data) {
                if (data != 0) {
                    window.location = `/${nombre}`;
                }
        }).catch((error) =>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Ocurrió un error vuelve a intentarlo'
            })
        );
}

$(document).ready(function () {
    mostrarMotificacionesCabina();
    Notification.requestPermission().then((result) => {
        console.log(result);
    });
    setInterval(() => {
        mostrarMotificacionesCabina();
    }, 300000);
});
