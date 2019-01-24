<?php namespace Technosailor\Photogrammapy\Object_Meta;


use AcceptanceTester;
use Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Config\View;
use Technosailor\Photogramappy\Post_Types\Photographs;

class Geo_CoordinateCest {
	public function _before( AcceptanceTester $I ) {

	}

	public function test_that_latitude_is_saved( AcceptanceTester $I ) {
		$I->am( 'an administrator' );
		$I->wantTo( 'verify that the Latitude Field can be saved' );

		$I->amOnPage( 'wp-login.php' );
		$I->wait(2);
		$I->fillField( '#user_login', 'admin' );
		$I->fillField( '#user_pass', 'password' );
		$I->click( '#wp-submit' );

		$photograph_id = $I->havePostInDatabase( [
			'post_type' => Photographs::NAME
		] );

		$I->amEditingPostWithId( $photograph_id );
		$I->fillField( '#' . View::FIELD_LAT, '123' );
		$I->fillField( '#' . View::FIELD_LONG, '-987' );
		$I->click( '#publish' );

		$I->seeInField( '#' . View::FIELD_LAT, '123' );
		$I->seeInField( '#' . View::FIELD_LONG, '-987' );
	}
}
