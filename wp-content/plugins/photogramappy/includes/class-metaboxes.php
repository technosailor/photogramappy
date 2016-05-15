<?php
namespace Photogramappy\Metaboxes;

class Metaboxes {

	public function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'metaboxes' ] );
		add_action( 'save_post', [ $this, 'save_latlong' ], 10, 2 );
	}

	public function metaboxes() {
		\add_meta_box( 'location', __( 'Latitutde and Longitude', 'pgm' ), [ $this, 'latlong' ], 'photographs' );
	}

	public function latlong( $post ) {
		$latlong = get_post_meta( $post->ID, 'pgm_latlong', true );
		$latitude = $latlong[0];
		$longitude = $latlong[1];
		?>
		<table>
			<tr>
				<th scope="row">
					<label for="latitude"><?php _e( 'Latitude:', 'pgm' ) ?></label>
				</th>
				<td>
					<input type="text" name="latitude" id="latitude" value="<?php echo esc_attr( $latitude ) ?>">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="longitude"><?php _e( 'Longitude:', 'pgm' ) ?></label>
				</th>
				<td>
					<input type="text" name="longitude" id="longitude" value="<?php echo esc_attr( $longitude ) ?>">
				</td>
			</tr>
		</table>
		<?php
	}

	public function save_latlong( $post_id, $post ) {
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return false;
		}

		// @todo sanitize POST vars
		if( isset( $_POST['latitude'] ) && isset( $_POST['longitude'] ) ) {
			update_post_meta( $post_id, 'pgm_latlong', [ $_POST['latitude'], $_POST['longitude'] ] );
		}
	}
}

new Metaboxes;