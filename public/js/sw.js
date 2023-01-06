self.addEventListener('notificationclick', event =>
{
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
});
