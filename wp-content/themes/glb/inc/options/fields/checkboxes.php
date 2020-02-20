<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Glb__Options_Checkboxes extends Glb__Options_Control
{
	public $type = 'checkboxes';
	public $default = array();

	public function render_content() {
		?>

			<div class="options-control-inputs">
				<checkboxes v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></checkboxes>
			</div>
		
		<?php
	}
}
