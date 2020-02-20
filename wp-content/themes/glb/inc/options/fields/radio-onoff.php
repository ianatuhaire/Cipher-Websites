<?php
defined( 'ABSPATH' ) or die();


/**
 * Radio buttons control
 */
class Glb__Options_RadioOnOff extends Glb__Options_RadioButtons
{
	public function __construct( $id, $args = array() ) {
		parent::__construct( $id, $args );

		$this->choices = array(
			'on'  => _x( 'On', 'options', 'glb' ),
			'off' => _x( 'Off', 'options', 'glb' )
		);
	}


	public function render_content() {
		?>

			<div class="options-control-inputs options-control-onoff">
				<radio-buttons v-bind:value="data" v-bind:options="choices" v-on:change="triggerChange"></radio-buttons>
			</div>

		<?php
	}
}
