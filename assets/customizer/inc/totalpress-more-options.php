<?php
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_field( 'totalpress_theme_customizer', array(
	'type'        => 'custom',
	'settings'    => 'tp-primo-link',
	'section' => 'upsell_section',
	'default' => '<div class="info-wrapper radius">Make TotalPress even more <strong>AWESOME</strong> with the <strong>TP Primo</strong> plugin! By adding additional options, TP Primo will help you go to the next level and create the site you have always wanted. Here are just a few of the options added with TP Primo:<ul class="primo-options"><li>Added Layout Options</li><li>Added Font Options</li><li>Added Color Options</li><li>Added Navigation Options</li><li>Added Post Options</li><li>Added Page Options</li><li>Right Sidebar Options</li><li>Left Sidebar Options</li></ul><p>and much more...</p><a class="tp button button-primary" href="https://themeawesome.com/tp-primo/" target="_blank">' . __('View All TP Primo Options','totalpress') . '</a></div>',
	'priority' => 999,
));