var $ = jQuery;

$( function () {
	var map = L.map( 'map' ).setView([51.505, -0.09], 13);
	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		maxZoom: 18,
		id: 'mapbox.light',
		accessToken: 'sk.eyJ1IjoicHJ0a3N4bmEiLCJhIjoiY2o5dGxkNHNjMzRhcDMybWlnd3Fkb3BuNiJ9.7z36O9zk3WJ-LzO0Rdh-vw'
	}).addTo(map);

	var markers = L.markerClusterGroup();
	window.locations.forEach( function ( location ) {
		if ( location.latitude !== '' && location.longitude !== '' ) {
			var marker = L.marker([location.latitude, location.longitude]);
			var $popup = $( '<span>' );

			$popup.append( $( '<a>' )
				.attr( 'href', location.url )
				.prepend( $( '<img>' )
					.attr( 'src', location.photo )
					.attr( 'alt', location.title )
					.attr( 'width', 100 )
				)
			);

			marker.bindPopup( $popup[0].outerHTML );
			markers.addLayer( marker );
		}
	} );
	map.addLayer(markers);
	map.fitBounds( markers.getBounds() );
} );
