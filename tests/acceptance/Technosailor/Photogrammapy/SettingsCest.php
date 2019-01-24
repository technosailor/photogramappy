<?php namespace Technosailor\Photogrammapy;


use AcceptanceTester;
use Codeception\Test\Cest;

class SettingsCest {
	public function _before( AcceptanceTester $I ) {
	}

	public function test_save_google_api_key( AcceptanceTester $I ) {
		$I->am( 'an administrator' );
		$I->wantTo( 'verify that the Google Maps API field exists and can be saved' );

		$I->amOnPage( 'wp-login.php' );
		$I->wait(2);
		$I->fillField( '#user_login', 'admin' );
		$I->fillField( '#user_pass', 'password' );
		$I->click( '#wp-submit' );

		$I->amOnPluginsPage();
		$I->activatePlugin( 'photogramappy');
		$I->see( 'Plugins' );

		$I->amOnAdminPage( 'options-general.php?page=photogrammapy' );
		$I->fillField( '#pgmpy-googlemaps-key', 'abcdefg' );
		$I->click( '#submit' );

		$I->seeInField( '#pgmpy-googlemaps-key', 'abcdefg' );
	}
}
