<?php
function totalpress_require_plugins() {
    $plugins = array( 
    	array(
			'name' => esc_html('Kirki Plugin','totalpress'),
			'slug'  => 'kirki',
			'required' => false,
		),
    	array(
			'name' => esc_html('Meta Box','totalpress'),
			'slug' => 'meta-box',
			'required' => false,
		)
	);
    $config = array( 
    	'id'           => 'totalpress',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',			
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
    );
    tgmpa( $plugins, $config );
}
add_action('tgmpa_register','totalpress_require_plugins');