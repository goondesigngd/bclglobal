var map;
// Map object
var markers = [];
// Store markers

function initialize() {

	var mapOptions = {
		scrollwheel : false,
		disableDefaultUI : true,
		zoomControl : false,
		maxZoom : 16,
		zoom : 8,
		center : new google.maps.LatLng(-29.3796468, -50.9014877),
		draggable : true,
	};

	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	loadMarkers(function(data) {

		/**
		 * Navigate across itens and set the content
		 */
		$.each(data, function(i, item) {

			/**
			 * Infowindow for marker object
			 */

			var infowindow = new google.maps.InfoWindow();

			var geocoder = new google.maps.Geocoder();

			geocoder.geocode({
				'address' : item.texto
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {

					/**
					 * Marker latitude and longitude
					 */

					/**
					 * Marker icon
					 */
					var image = 'img/icon-map.png';
					/**
					 * Set marker options
					 */
					var marker = new google.maps.Marker({
						position : results[0].geometry.location,
						map : map,
						icon : image
					});

					/* Insert marker on array */
					markers.push(marker);

					/**
					 * Set content for marker infowindow
					 */
					var content = makeContent(item);
					infowindow.setContent(content);

					/**
					 * Add click listener for marker
					 */
					google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {

						return function() {
							if (infowindow) {
								infowindow.close();
							}
							infowindow.setContent(content);
							infowindow.open(map, marker);
						};

						marker[0].infowindow.close();

					})(marker, content, infowindow));

				}
			});

		});
	});

}

/**
 * Return ajax load
 */
function loadMarkers(callback) {

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			callback(JSON.parse(xhttp.responseText));
		}
	};
	xhttp.open("POST", root_url_default + "locais-atuacao", true);
	xhttp.send();
}

/**
 * Call initialization
 */
google.maps.event.addDomListener(window, 'load', initialize);

/**
 * Make content for a marker
 *
 * @param Marker object
 */
function makeContent(item) {
	var content = '<h2>' + item.texto + '</h2>';

	return content;
}