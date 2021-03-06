var $ = jQuery;

$( function () {
	// position and sizing of map
	$( '#colophon' ).css( 'margin-top', 0 );
	var viewportHeight = $( window ).height();
	var mastheadHeight = $( '#masthead' ).height();
	var magicMargin = 220;
	$( '#map' ).css( 'height', viewportHeight - ( mastheadHeight + magicMargin ) );

	// map stuff
	var map = L.map( 'map' ).setView([20.593, 78.962], 5);
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
					.attr( 'width', 200 )
				)
			);

			marker.bindPopup( $popup[0].outerHTML );
			markers.addLayer( marker );
		}
	} );
	map.addLayer(markers);
} );
