<?php
namespace Technosailor\Photogramappy\Object_Meta;

use MetaboxOrchestra\Boxes;

/**
 * Object Meta should be a class that implements this interface.
 * Create a directory for the meta object, and instantiate 3 classes implementing the following interface.
 * That are required to generate the meta box.
 * - PostMetabox|TermMetabox (This registers a metabox with WordPress)
 * - BoxView (This is the _content_ of the metabox
 * - BoxAction (This handles the submitted content)
 *
 * Your class should have the `register_meta()` method and inject a `Boxes` object into it.
 * 
 * @see Technosailor\Photogramappy\Object_Meta\Geo_Coordinate\Geo_Coordinate
 *
 * Interface MetaBox
 * @package Technosailor\Photogramappy\Object_Meta
 */
interface MetaBox {
	public function register_meta( Boxes $boxes );
}