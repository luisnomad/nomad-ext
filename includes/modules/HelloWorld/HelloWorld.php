<?php

class NOEX_HelloWorld extends ET_Builder_Module {

	public $slug       = 'noex_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'noex-nomad-ext' );
	}

	public function get_fields() {
		return [
			'title' => array(
				'label'           => esc_html__( 'Title', 'noex-nomad-ext' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'noex-nomad-ext' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'noex-nomad-ext' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'noex-nomad-ext' ),
				'toggle_slug'     => 'main_content',
			),
		];
	}

	public function render( $attrs, $content = null, $render_slug ) {
		$template = '';
		$template .= '<div class="alert alert-success" role="alert">';
		$template .= '<h4 class="alert-heading">%1$s</h4>';
		$template .= '<p>%2$s</p>';
		$template .= '<hr />';
		$template .= '</div>';
		return sprintf(
			$template, 
			$this->props['title'], 
			$this->props['content'] 
		);
	}
}

new NOEX_HelloWorld;
