let str = '';
const img = 'img/Match_PNG-01.png';

const showCabinNotifications = async () =>
{
    const serviceWorker = await navigator.serviceWorker.register('js/sw.js');
    fetch('/notifications/cabina',
    {
        method: 'GET',
        headers:
        {
            'Content-Type': 'application/json'
        },
    }).then(response => response.json())
    .then(res =>
    {
        notifications = res;
        notifications.forEach(n =>
        {
            if (!n.visto)
            {
                if (serviceWorker.active)
                {
                    serviceWorker.showNotification(n.encabezado,
                    {
                        body: n.cuerpo,
                        icon: img,
                        badge: img,
                        tag: n._id
                    });
                }
            }
        });
    }).catch(error =>
    {
        console.error(error);
    })
}

(() =>
{
    if (!("Notification" in window) && !('serviceWorker' in navigator))
    {
        alert("This browser does not support notifications");
    }
    else
    {
        Notification.requestPermission(() =>
        {
            if (Notification.permission === 'granted')
            {
                showCabinNotifications();
                setInterval(() =>
                {
                    showCabinNotifications();
                }, 100000);
            }
        });
    }
})();
