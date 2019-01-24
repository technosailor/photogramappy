<?php
namespace Technosailor\Photogramappy\Google_Maps;

/**
 * Class Defaults
 * @package Technosailor\Photogramappy\Google_Maps
 *
 * More and more, it's considered bad form to use arrays just to store things. No context is given to IDEs, and there
 * is no way to enforce type hinting on values. Instead, we use a class. Additionally, object iteration consumes less memory.
 *
 * @see https://www.brandonsavage.net/stop-returning-arrays-use-objects-instead/
 * @see https://steemit.com/php/@crell/php-use-associative-arrays-basically-never
 * @see https://dev.to/aleksikauppila/dont-return-associative-arrays-28il
 */
class Defaults {

	/**
	 * @var int
	 */
	private $zoom = 13;

	/**
	 * @var int
	 */
	private $height = 640;

	/**
	 * @var int
	 */
	private $width = 640;

	/**
	 * @param int $zoom
	 */
	public function setZoom( int $zoom ): void {
		$this->zoom = $zoom;
	}

	/**
	 * @param int $height
	 */
	public function setHeight( int $height ): void {
		$this->height = $height;
	}

	/**
	 * @param int $width
	 */
	public function setWidth( int $width ): void {
		$this->width = $width;
	}

	/**
	 * @return int
	 */
	public function getZoom(): int {
		return $this->zoom;
	}

	/**
	 * @return int
	 */
	public function getHeight(): int {
		return $this->height;
	}

	/**
	 * @return int
	 */
	public function getWidth(): int {
		return $this->width;
	}

}