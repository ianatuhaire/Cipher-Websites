<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an social icons control
 */
class Glb__Options_Icons extends Glb__Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'icons';
	public $default = array();

	public function render_content() {
		?>
			<div class="options-control-inputs">
				<icons v-bind:value="data" v-bind:icons="_glbicons" v-on:change="triggerChange"></icons>
			</div>
		<?php
	}
}
