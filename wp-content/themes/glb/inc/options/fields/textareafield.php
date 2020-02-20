<?php
defined( 'ABSPATH' ) or die();


/**
 * This class will be present an text control
 * for theme optionsr
 */
class Glb__Options_TextareaField extends Glb__Options_Control
{
	/**
	 * The control type
	 * 
	 * @var  string
	 */
	public $type = 'textareafield';
	
	/**
	 * Render the control markup
	 * 
	 * @return  void
	 */
	public function render_content() {
		?>
			
			<div class="options-control-inputs">
				<textareafield v-bind:value="data" v-on:change="triggerChange"></textareafield>
			</div>

		<?php
	}
}
