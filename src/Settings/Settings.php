<?php

namespace Technosailor\Photogramappy\Settings;

use Technosailor\Photogramappy\Contracts\Exceptions\Option_Exception;

class Settings {

	const NAME = 'photogrammapy-settings';

	const NONCE = 'pgmpy-settings';
	const GOOGLE_APIKEY = 'pgmpy-googlemaps-apikey';

	protected $disabled_api_field = false;

	/**
	 * @action admin_menu
	 */
	public function menu_item() {
		add_options_page( __( 'Photogrammapy', 'photogrammapy' ), __( 'Photogrammapy', 'photogrammapy' ), 'manage_options', 'photogrammapy', [ $this, 'settings' ] );
	}

	/**
	 *
	 */
	public function settings() {
	    $apikey = get_option( self::GOOGLE_APIKEY );

		?>
		<div class="wrap">
			<h1><?php _e( 'Photogrammapy Settings', 'photogrammapy' ) ?></h1>
			<form action="" method="post">
				<?php
				wp_nonce_field( self::NONCE, self::NONCE );
				?>
				<table class="form-name">
					<tbody>
						<tr>
							<th scope="row"><?php _e( 'Google Maps API key', 'photogrammapy' ) ?></th>
							<td>
								<input id="pgmpy-googlemaps-key" name="<?php echo self::GOOGLE_APIKEY ?>" class="regular-text" type="text" value="<?php echo esc_attr( $apikey ); ?>" <?php echo esc_attr( $this->disabled_api_field ) ?>>
							</td>
						</tr>
					</tbody>
				</table>
				<?php
                if ( empty ( $this->disabled_api_field ) ) {
	                submit_button();
                } else {
                    echo sprintf( '<p class="description">%s</p>', __( 'Your Google API Key has been set in your <code>wp-config.php</code> file and cannot be updated here.', 'photogramappy' ) );
                }
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * @return string
	 */
	public function get_api_key( string $apikey ) : string {
		if( defined( 'GMAPS_APIKEY' ) ) {
			$apikey = GMAPS_APIKEY;
			$this->disabled_api_field = 'disabled';
		}

		return $apikey;
    }

	/**
	 * @action admin_init
	 *
	 * @return bool
	 */
	public function save_settings() : bool {

		if( ! isset( $_POST[ self::NONCE ] ) ) {
			return false;
		}

		if( ! wp_verify_nonce( $_POST[ self::NONCE ], self::NONCE ) ) {
			return false;
		}

		if( ! isset( $_POST[ self::GOOGLE_APIKEY ] ) ) {
			return false;
		}

		return update_option( self::GOOGLE_APIKEY, sanitize_text_field( $_POST[ self::GOOGLE_APIKEY ] ) );
	}
}