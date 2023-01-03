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

$( document ).ready(function() {
    mostrarMotificacionesCabina();
    Notification.requestPermission().then((result) => {
        console.log(result);
    });
    setInterval(() => {
        mostrarMotificacionesCabina();
    }, 300000);
});
