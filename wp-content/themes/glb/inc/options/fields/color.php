<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Glb__Options_Color extends Glb__Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'color-picker';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
			<div class="options-control-inputs">
				<color v-bind:value="data" v-on:change="triggerChange"></color>
			</div>
		<?php
	}
}
