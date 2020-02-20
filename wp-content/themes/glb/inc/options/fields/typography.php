<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an colorpicker control
 */
class Glb__Options_Typography extends Glb__Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'typography';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>

			<div class="options-control-inputs">
				<typography v-bind:value="data" v-bind:fonts="_glbfonts" v-on:change="triggerChange"></typography>
			</div>
		
		<?php
	}
}
