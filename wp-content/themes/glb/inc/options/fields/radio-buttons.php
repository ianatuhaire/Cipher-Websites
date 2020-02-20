<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Glb__Options_RadioButtons extends Glb__Options_Control
{
	public $type = 'radio-buttons';

	public function render_content() {
		?>

			<div class="options-control-inputs">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
