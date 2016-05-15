<?php
namespace Photogramappy\Inline_JS;

class Inline_JS {
	public function __construct() {
		add_action( 'wp_head', [ $this, 'gmaps' ] );
	}

	public function gmaps() {
		$markers = wp_cache_get( 'photo-locations' );
		if( ! $markers ) {
			$locs = new \WP_Query( [
				'post_type'     => 'photographs',
				'posts_per_page'=> 500,
				'no_found_rows' => true
			] );
			
			$markers = [];
			while( $locs->have_posts() ) {
				$locs->the_post();
				
				$latlong = get_post_meta( get_the_ID(), 'pgm_latlong', true );
				$latitude = $latlong[0];
				$longitude = $latlong[1];
				$markers[] = [ get_the_ID(), get_the_title(), $latitude, $longitude ];
				wp_cache_set( 'photo-locations', $markers, '', 3600 );
			}
		}
		?>
		<script>
			var styles = [
				{
					"featureType": "water",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#e9e9e9"
						},
						{
							"lightness": 17
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f5f5f5"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 17
						}
					]
				},
				{
					"featureType": "road.highway",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 29
						},
						{
							"weight": 0.2
						}
					]
				},
				{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 18
						}
					]
				},
				{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f5f5f5"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#dedede"
						},
						{
							"lightness": 21
						}
					]
				},
				{
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"visibility": "on"
						},
						{
							"color": "#ffffff"
						},
						{
							"lightness": 16
						}
					]
				},
				{
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"saturation": 36
						},
						{
							"color": "#333333"
						},
						{
							"lightness": 40
						}
					]
				},
				{
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "transit",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#f2f2f2"
						},
						{
							"lightness": 19
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.fill",
					"stylers": [
						{
							"color": "#fefefe"
						},
						{
							"lightness": 20
						}
					]
				},
				{
					"featureType": "administrative",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"color": "#fefefe"
						},
						{
							"lightness": 17
						},
						{
							"weight": 1.2
						}
					]
				}
			];

			function initMap() {
				map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: 39.299236, lng: -76.609383},
					zoom: 13,
					styles: styles
				});

				/*var baltimore = new google.maps.KmlLayer({
					url: '<?php echo esc_url( PGM_URL . "assets/baltimore.kmz" ) ?>',
					map: map
				});*/

				<?php
				if( ! empty( $markers ) ) {
					foreach ( $markers as $marker ) {
					?>
					var content = '<php echo get_the_post_thumbnail( $marker[0] ) ?>';
					var infowindow = new google.maps.InfoWindow({
						content: content
					});
					var marker_<?php echo (int) $marker[0] ?> = new google.maps.Marker({
						position: { lat: <?php echo (float) $marker[2] ?>, lng: <?php echo (float) $marker[3] ?>},
						map: map,
						title: '<?php echo esc_attr( $marker[1] ) ?>'
					});
					marker_<?php echo (int) $marker[0] ?>.addListener('click', function() {
						infowindow.open(map, marker_<?php echo (int) $marker[0] ?>);
					});
					<?php
					}
				}
				?>
			}
		</script>
		<?php
	}
}

new Inline_JS;