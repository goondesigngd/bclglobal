
	// if there's service worker registered	
	var _registration = null;
	var _bt = null;
	
	function registerServiceWorker() {
		
		// initializeing service worker register
		
		 // _bt = document.getElementById("enable-notifications");
		 // _bt.style.visibility = 'hidden';
		 // _bt.disabled = true;

		if (('serviceWorker' in navigator ) && ('PushManager' in window)) {
		
			return navigator.serviceWorker.register('js/service-worker.js').then(function(registration) {
				console.log('Service worker successfully registered.');
				
				// _bt = document.getElementById("enable-notifications");
				// _bt.style.visibility = 'visible';
				// _bt.disabled = false;
				
				_registration = registration;
				
				var permission = Notification.permission;
				
				if(permission=='default'){
					askPermission();
				}	
				
				if(permission=='granted'){
					subscribeUserToPush();
				}	
				
				
				
				return registration;
			}).catch(function(err) {
				console.error('Unable to register service worker.', err);
			});
		}
	}

	function askPermission() {

			return new Promise(function(resolve, reject) {
				const permissionResult = Notification.requestPermission(function(result) {
					resolve(result);
				});

				if (permissionResult) {
					permissionResult.then(resolve, reject);
				}
			}).then(function(permissionResult) {
				if (permissionResult !== 'granted') {
					try{
					throw new Error('O Recebimento de notificacoes esta bloqueado nas configuracoes do seu navegador, desbloqueie para ativar as notificacoes.');
					}catch(e){
						// alert(e.message);
					}
				} else {
					subscribeUserToPush();
				}
			});
	}
	
	


	function urlBase64ToUint8Array(base64String) {
		const padding = '='.repeat((4 - base64String.length % 4) % 4);
		const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');

		const rawData = window.atob(base64);
		const outputArray = new Uint8Array(rawData.length);

		for (let i = 0; i < rawData.length; ++i) {
			outputArray[i] = rawData.charCodeAt(i);
		}
		return outputArray;
	}

	function getSWRegistration() {
		var promise = new Promise(function(resolve, reject) {
			// do a thing, possibly async, then…

			if (_registration != null) {
				resolve(_registration);
			} else {
				reject(Error("It broke"));
			}
		});
		return promise;
	}

	function subscribeUserToPush() {
		
		getSWRegistration().then(function(registration) {
			console.log(registration);
			const subscribeOptions = {	
				userVisibleOnly : true,
				applicationServerKey : urlBase64ToUint8Array(pub_key)
			};

			return registration.pushManager.subscribe(subscribeOptions);
		}).then(function(pushSubscription) {
			console.log('Received PushSubscription: ', JSON.stringify(pushSubscription));
			sendSubscriptionToBackEnd(pushSubscription);
			return pushSubscription;
		});
	}

	function sendSubscriptionToBackEnd(subscription) {
		return fetch( action_sub, {
			method : 'POST',
			headers : {
				'Content-Type' : 'application/json'
			},
			body : JSON.stringify(subscription)
		}).then(function(response) {
			if (!response.ok) {
				throw new Error('Bad status code from server.');
			}

			return response.json();
		}).then(function(responseData) {
			console.log('bad data: ', responseData);
			if (!(responseData && responseData.success)) {
				// + JSON.stringify(responseData)
				throw new Error('Bad response from server.');
			}
		});
	}

	function enableNotifications() {
		// register service worker
		// check permission for notification/ask
		
			askPermission();
		
			
	}

	registerServiceWorker(); 