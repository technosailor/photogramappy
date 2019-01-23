<?php

namespace Technosailor\Photogramappy\Settings;

use Technosailor\Photogramappy\Contracts\Exceptions\Option_Exception;

class Settings {

	const NAME = 'photogrammapy-settings';

	const NONCE = 'pgmpy-settings';
	const GOOGLE_APIKEY = 'pgmpy-googlemaps-apikey';

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
								<input id="pgmpy-googlemaps-key" name="<?php echo self::GOOGLE_APIKEY ?>" class="regular-text" type="text" value="<?php echo esc_attr( get_option( self::GOOGLE_APIKEY ) ) ?>"
							</td>
						</tr>
					</tbody>
				</table>
				<?php
				submit_button();
				?>
			</form>
		</div>
		<?php
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