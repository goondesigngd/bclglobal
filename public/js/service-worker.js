self.addEventListener('push', function(event) {
	if (event.data) {
		var data = event.data.json();
		self.registration.showNotification(data.title, {
			body : data.body,
			icon : '/img/notify/' + data.icon,
			vibrate : [ 200, 100, 200, 100, 200, 100, 400 ],
			image : (data.image ? '/img/notify/' + data.image : null),
			// sound :
			tag : 'notifications',
			data : {
				url : data.url
			}
		});
		// console.log('This push event has data: ',
		// event.data.text());
	} else {
		// console.log('This push event has no data.');
	}
});

self.addEventListener('notificationclick', function(event) {

	// var data = event.data.json();

	console.log('[Service Worker] Notification click Received.');
	// console.log(data.text());

	event.notification.close();

	if (event.notification.data && event.notification.data.url) {
		event.waitUntil(clients.openWindow(event.notification.data.url));
	}

});
