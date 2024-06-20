<?php

function theme_modules_init() {

	spl_autoload_register( function ( $class_name ) {
		if ( file_exists( get_template_directory() . '/page-templates/blocks/' . $class_name . '.php' ) ) {
			require_once get_template_directory() . '/page-templates/blocks/' . $class_name . '.php';
		}
	} );

	if ( function_exists( 'acf_register_block' ) ) {
		$modules = array(
			"newsletter"           => [ "class" => "Newsletter", "title" => "Newsletter", "icon" => "email" ],
		
		);

		foreach ( $modules as $key => $module ) {
			$acf_block = array_merge( [
				'name'            => $key,
				'render_callback' => function ( $block, $content, $is_preview, $post_id ) use ( $key, $module ) {
					$module = new $module['class']( $block, $content, $is_preview, $post_id, $key, $module );
					$module->render();
				},
				'category'        => 'formatting',
				'icon'            => 'admin-comments',
				'mode'            => 'edit',
				'align'           => 'wide',
				'supports'		=> [
					'align'			=> true,
					'anchor'		=> true,
					'jsx' 			=> true,
				]
			], $module );

			acf_register_block_type( $acf_block );
		}
	}
}

add_action( 'acf/init', 'theme_modules_init' );
