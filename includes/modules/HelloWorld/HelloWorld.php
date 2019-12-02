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

	/**
 	* Remove empty paragraphs created by wpautop()
 	* @author Ryan Hamilton
 	* @link https://gist.github.com/Fantikerz/5557617
 	*/
	public function remove_empty_p( $content ) {
		$content = force_balance_tags( $content );
		$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
		$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
		return $content;
	}

	public function get_all_experiences() {
		$args = array(  
			'post_type' => 'job_experience',
			'post_status' => 'publish',
			// 'posts_per_page' => -1, 
			// 'orderby' => "title", 
			// 'order' => "ASC", 
		);

		$loop = new WP_Query( $args ); 
		
		foreach ( $loop->posts as $exps ) {
			$field = get_field( 'rol_name', $exps->ID );
			// echo '<pre>' . var_export($exps, true) . '</pre>';
			echo '<pre>' . $field . '</pre>';
		}

		/*
		while ( $loop->have_posts() ) : $loop->the_post(); 
			var_dump(get_field('rol_name'));
		endwhile;
		*/
		wp_reset_postdata();
	}	

	public function render( $attrs, $content = null, $render_slug ) {
		$engine = new StringTemplate\SprintfEngine;

		$template = '';
		$template .= '<div class="nmd-ext-resume">';
		$template .= '<h4 class="nmd-ext-resume__heading">{title}</h4>';
		$template .= '</div>';

		$this->get_all_experiences();

		return $engine->render($template, [
			"title" => $this->props['title']
		]);		
	}
}

new NOEX_HelloWorld;
