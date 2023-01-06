self.addEventListener('notificationclick', event =>
{
    let _id = event['notification'].tag;

    markNotificationAsSeen(_id);

    event.waitUntil(
        clients.matchAll({type: 'window'})
          .then(clients => clients.filter(client => client.url === originalUrl))
          .then(matchingClients => {
            if (matchingClients[0]) {
              return matchingClients[0].navigate(navigationUrl)
                       .then(client => client.focus());
            }
            return clients.openWindow('/quotation');
          })
      );
}, false);


const markNotificationAsSeen = id =>
{
    const data =
    {
        id: id
    }

    fetch('/notifications/watch',
    {
        method: 'POST',
        headers:
        {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data)
    }).then(resp => resp.json())
    .catch(error =>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Ocurrió un error vuelve a intentarlo'
        })
    );
}
