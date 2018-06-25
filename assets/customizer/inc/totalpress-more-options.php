<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_field( 'totalpress_theme_customizer', array(
	'type'        => 'custom',
	'settings'    => 'tp-primo-link',
	'label'       => __('Make TotalPress even more <strong>AWESOME</strong> with the <strong>TP Primo</strong> plugin! By adding additional options, TP Primo will help you go to the next level and create the site you have always wanted.<br /><br />','totalpress'),
	'section' => 'upsell_section',
	'default' => '<a class="tp button expanded" href="https://themeawesome.com/tp-primo/" target="_blank">' . __('Download TP Primo Today','totalpress') . '</a>',
	'priority' => 999,
));