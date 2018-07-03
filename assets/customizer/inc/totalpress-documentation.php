<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_field( 'totalpress_theme_customizer', array(
	'type'        => 'custom',
	'settings'    => 'totalpress_documentation',
	'section' => 'totalpress_docs_section',
	'default' => '<div class="info-wrapper radius"><h3 class="tp-docs">TotalPress Documentation</h3><p>Make sure to check out the full documentation for detailed instructions on how to set up and use TotalPress right out of the box.</p><p>You will also find documentation on how to use some of the hidden benefits of TotalPress.</p> <a class="tp button button-primary" href="https://themeawesome.com/docs/totalpress/" target="_blank">' . __('View TotalPress Documentation','totalpress') . '</a></div>',
	'priority' => 999,
));