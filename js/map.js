jQuery( function () {
	var map = L.map( 'map' ).setView([51.505, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		maxZoom: 18,
		id: 'mapbox.dark',
		accessToken: 'sk.eyJ1IjoicHJ0a3N4bmEiLCJhIjoiY2o5dGxkNHNjMzRhcDMybWlnd3Fkb3BuNiJ9.7z36O9zk3WJ-LzO0Rdh-vw'
	}).addTo(map);

	var markers = L.markerClusterGroup();
	window.locations.forEach( function ( location ) {
		if ( location.latitude !== '' && location.longitude !== '' ) {
			markers.addLayer(L.marker([location.latitude, location.longitude]));
		}
	} );
	map.addLayer(markers);
	map.fitBounds( markers.getBounds() );
} );
