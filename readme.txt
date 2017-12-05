=== TotalPress ===
Tags: blog, one-column, two-columns, three-columns, right-sidebar, left-sidebar, footer-widgets, custom-background, flexible-header, custom-menu, editor-style, featured-images, full-width-template, microformats, post-formats, sticky-post, translation-ready, theme-options, custom-logo, custom-colors
Requires at least: 4.9.1
Tested up to: 4.91
Stable tag: 1.0.4
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Hello world, I'm TotalPress! I'm Based off Underscores and I also come with Zurb's Foundation for Sites fully integrated. What makes me awesome? I am fully responsive, meaning I adjust seamlessly to any screen resolution so I look good on any device. There's Schema microdata built in for posts and pages, I've got 9 widget areas built in as well as 6 different sidebar page templates. Did I mention hooks and filters? I got a ton of those. Another reason I'm awesome is I use the Kirki plugin. The Kirki plugin provides 30 custom control types for the theme customizer ranging from simple sliders and tooltips to complex typography controls including Google-Fonts. Kirki makes developing themes a lot faster and easier for developers and more meaningful for users. I also work really well with page builders like Elementor, Site Origin and many others. So what are you waiting for? Download me now and take me for a spin.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to start using TotalPress.
4. Once you have activated TotalPress, you will be promted by the TGM Plugin to install the Kirki Plugin: This theme recommends the following plugin: Kirki Plugin.
5. You will also be promted in the customizer screen to install and activate the Kirki plugin.
6. Keep in mind that if you you do not install the Kirki Plugin you will not be able to see or take advantage of the Theme Options section in the customizer.
7. Once you have installed and activated the Kirki Plugin, go to Appearance > Customizer > Theme Options to start customizing your site.

== Frequently Asked Questions ==
- Question: Why do I need to install the Kirki Plugin
- Answer: The Kirki Plugin provides a set of customizer controls that were built using WordPress standards. Without the Kirki plugin, you will not have access to the TotalPress theme options in the customizer.

= Supported Plugins =

* Jetpack Infinite Scroll.
* WooCommerce

== License ==
All of the components used in the creation of TotalPress are licensed as follows:
* WordPress - [GPLv2](http://www.gnu.org/licenses/gpl-2.0.html)
* Foundation Framework - [MIT License](https://github.com/zurb/foundation/blob/master/LICENSE)
* Motion-UI - [MIT License](https://github.com/zurb/motion-ui/commit/2a6617b9e45eaaa7f8888ba04a811002c5ebff5e)
* What-Input - [MIT License](https://github.com/ten1seven/what-input/blob/master/LICENSE)
* Font-Awesome - [fully open source and GPL friendly](http://fortawesome.github.io/Font-Awesome/license/)
* Underscores - http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

== Credits ==

* Some of the code (a very small amount) used in TotalPress was derived from the GeneratePress theme created by Tom Usborne https://wordpress.org/themes/generatepress/ - GPLv2 or later, https://www.gnu.org/licenses/gpl-2.0.html - You created a very nice theme Tom. Thanks for the inspiration.
* Metabox code was created using Meta Box Generator over at GenerateWP https://generatewp.com/

== Changelog ==

= 1.0.4 =
* Changed the order of the sidebars to reflect a "top down" approach.
* renamed sidebar-1 and sidebar-2 in functions.php, sidebar-1 is now content sidebar one and sidebar-2 is now content sidebar two. Someone pointed out to me that right and left sidebars do not matter on mobile as the content is stacked. Made sense so I changed the names.

= 1.0.3.1 =
*corrected an issue with a PHP short tag in one of the files.

= 1.0.3 =
* Removed admin.css. It was not being used.
* Corrected typo in the header sidebar area.
* Added styles to top sidebar and footer sidebar so sub menu items will not display. Top Sidebar and Footer Sidebar menus are meant to be simple.
* Adjusted the layout of the header. Also adjusted where some of the hooks were being displayed in the header as well as removed some hooks from the header.
* Changed the name of the right sidebar from Main to Right Sidebar.

= 1.0.2 =
* Corrected issue where certain options were not working due to the fact that I did not updated those functions when I added the unique names in 1.0.1
* Adjusted a few css styles.

= 1.0.1 =
* Added CHANGELOG.txt file to keep track of changes made to the theme.
* Removed an extra occurance of "add_theme_support('post-thumbnails');" which was located on line 31 of functions.php
* Added unique prefix for everything the Theme defines in the public namespace, including options, functions, global variables, constants, post meta, etc.

= 1.0.0 =
* initial submission to the theme review team on 11/02/2017