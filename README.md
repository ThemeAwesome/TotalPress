# TotalPress #

![TotalPress Screenshot](https://raw.githubusercontent.com/ThemeAwesome/TotalPress/master/screenshot.png)

**Theme Name:** TotalPress<br />
**Tags:** blog, one-column, two-columns, three-columns, right-sidebar, left-sidebar, footer-widgets, custom-background, flexible-header, custom-menu, editor-style, featured-images, full-width-template, microformats, post-formats, sticky-post, translation-ready, theme-options, custom-logo, custom-colors<br />
**Donate:** [TotalPress Project](https://www.paypal.me/themeawesome)<br />
**Requires at least:** 4.9.2<br />
**Tested up to:** 5.0-alpha-42525<br />
**Stable tag:** 1.0.10<br />
**License:** GNU General Public License v3.0<br />
**License URI:** [http://www.gnu.org/licenses/gpl-3.0.html](http://www.gnu.org/licenses/gpl-3.0.html)<br />

Description
===
Hello world, meet TotalPress! I'm Based off _s (Underscores) and I also come with Zurb's Foundation for Sites fully integrated. What makes me awesome? I am small and fast **(I'm just 890kb compressed)**. I am fully responsive, meaning I adjust seamlessly to any screen resolution so I look good on any device. I've got a ton of hooks and filters, I've got ten (10) widget areas built in as well as 6 different sidebar page templates. I use [Kirki Plugin](https://wordpress.org/plugins/kirki/). Kirki provides 30 custom control types for the theme customizer ranging from simple sliders and tooltips to complex typography controls including Google-Fonts. Kirki makes developing themes a lot faster and easier for developers and more meaningful for users. I also use the [Meta Box Plugin](https://wordpress.org/plugins/meta-box/) which is a powerful, professional toolkit for developers to create and handle everything related to custom meta boxes and custom fields for WordPress. Did I mention that I work really well with page builders like Elementor. So what are you waiting for? Get to downloading and take me for a spin.

### Demo ###

[TotalPress Theme Demo](https://themeawesome.com/themes/totalpress/)

Installation
===
* In your admin panel, go to `Appearance > Themes` and click the `Add New` button.
* Use the Search or Filter options to locate the TotalPress theme or click `Upload Theme`, then click `Choose File`, then select the TotalPress's ZIP file. Click Install Now.
* Click Activate to start using Totalpress.
* Once you have activated TotalPress, you will be promted by the TGM Plugin to install the [Kirki Plugin](https://wordpress.org/plugins/kirki/) as well as the the [Meta Box Plugin](https://wordpress.org/plugins/meta-box/): `This theme requires the following plugins: Kirki Plugin and Meta Box.`.
* Keep in mind that if you do not install either one of these plugins, you will not be able to see the `Theme Options` section in the customizer nor will you will see the metaboxes in the post/page editor..
* Once you have installed and activated the Kirki Plugin, go to `Appearance > Customizer > Theme Options` and start customizing your site.
* Once you have installed the Meta Box plugin, you will see an additional metabox below the post/page editor. This is a tabbed metabox called TotalPress Post/Page Options.


Changelog
===
### [1.0.10] 2018-01-18
* Accidentally added two instances of `../fonts` to the `font-awesome.css` file. This was causing an issue, but now it's corrected.
* Tidied up `Foundation for Sites` and `MotionUI` css in `styles.css` - Cleaned up a lot of empty space. Didn't make that big of a difference however it did reduce the overall theme size by **2kb**!
* Corrected issue where `sub navs` were displaying in a menu in the `header sidebar`. This will be added later in an update.
* Corrected a padding issue with the left and right sidebar in the `sidebar-content-sidebar.php` file.
* Removed `totalpress_header_items()` function from `template-functions.php`. Also rewrote `totalpress_build_logo()` and `totalpress_build_site_title()` functions and turned them into actions. This was done to make it easier for the end user to set the layout of the logo and site title/description in `TP-Primo.`

###### [1.0.9] 2018-01-13
* Moved Font-Awesome back to 4.7 - there was an issue with the 5.0.4 version. Will add later once it gets worked out. File size of `1.0.9` is bigger now.
* Added `font-awesome.css` back into `asstes/css` folder and added function call to load the `font-awesome.css` file before the theme file so the icons would be loaded first.

###### [1.0.8] 2018-01-08
* Added some styles to `style.css` to help with landing pages.
* Changed the name of the main sidebars back to `Right Sidebar` and `Left Sidebar`.
* Removed the `language` folder as well as `load_theme_textdomain('totalpress', get_template_directory() . '/assets/language');` - Do not need to have this in the theme as translations are handled by WordPress.org.
* Added `totalpress_remove_hentry_class` to remove `hentry` from the `post_class` because we are using microdata.
* Removed the ability to show or hide the `Back To Top` button. Moved this into the `TP-Primo` plugin.
* Renamed `blog-section.php` to `post-section.php`.
* Renamed `totalpress_content_section` in `post-section.php` to `totalpress_post_section`. This was done to better differentiate the post section from the page section in the `Content` section of `TotalPress Options`.
* Renamed `style.css` in `Meta-Box-Conditional-Logic` extension to `mbcl-style.css` - This was done because the theme check plugin was throwing the following recommendation: `RECOMMENDED: Tags: is either empty or missing in style.css`. According to this thread https://github.com/WordPress/theme-check/issues/50 themes can only have one file called `style.css`

###### [1.0.7] 2018-01-01
* Rewrote the installation instructions above, as well as in the `README.txt` file
* Updated Font-Awesome to 5.0.2 - Using `fa-brands.js` for the social icons.
* Removed the `Font-Awesome` css from `style.css`, also removed all of the `Font-Awesome` web fonts. Now the only file in the `fonts` folder is `fa-brands.js`. This has reduced the size of the theme significantly. ***387kb compressesd!***
* Changed the `Back To Top` arrow from a Font-Awesome directional arrow to a regular up arrow using css.
* Removed the word `Options` from the titles of the option panels in the customizer.
* Removed `global $post` and `$post->ID` so I could just use `get_the_ID()` which is a cleaner way of doing things.
* Removed an extra occurrence of `add_image_size('full-width-thumb', 1200, 9999);` from `functions.php` - I do not know how it got there, but obviously I added it when I wasn't paying attention. Derpy derp!
* Added the `meta-box-tabs` extension from `metabox.io` - I did this so the meta boxes will display in a tabbed format instead of taking up all of the realestate on the right hand side of the post editor. Looks reall nice if I do say so myself.

###### [1.0.6] 2017-12-26
* Moved all css files to `style.css` - This was done in order to make less calls as well as to make the site load faster.
* Removed `CHANGELOG.txt` file from the theme. One less file means overall smaller file size. Granted, not by much. Changes will be available via the `README.md` file on the GitHub Repository.
* Turned the `totalpress_entry_footer` into an action instead of just a function.
* Modified the WooCommerce css pertaining to the `Sale!` tag added to items on sale.
* Corrected an issue with the page loop. It was calling for `content-single.php` instead of `content-page.php`.
* Modified a few of the actions regarding the header areas of posts and pages by combining some of the actions.
* Turned `<?php totalpress_entry_page_footer(); ?>` into `<?php do_action('totalpress_entry_page_footer'); ?>`.
* Switched `<?php totalpress_posted_on(); ?>`, which was a function, into an action `<?php do_action('totalpress_posted_on'); ?>`.
* Switched all metaboxes from GenerateWP.com to the [Meta Box Plugin](https://wordpress.org/plugins/meta-box/) from [Metabox.io](https://metabox.io/).
* Added TGM Plugin Activation Configuration for the Meta Box plugin. since I made the decision to switch to this plugin for the metaboxes.
* Made the plugins listed in TGM PLugin Activation screen required. TotalPress is built around these plugins, so I figure the plugins need to be required.
* Changed the title of the checkbox in `Page Builder Options` from `Remove Content Padding` to `Remove Content Area Padding`.
* Corrected an issue where if a default layout was chosen in the customizer, the layout was displayed on single posts and pages even though a different layout template was chosen from the Page Attributes dropdown. Thanks Kel.
* Added `no-footer-widets` body class. If all of the boxes are checked under `Hide Footer Widgets` metabox, then the footer widget area will be hidden. Before, without the body class, the footer area would still be visible.
* Added `full-width-thumb` thumbnail size to `functions.php`. The actual size is 1200 wide with unlimited height.

###### [1.0.5] 2017-12-10

* Turned all the loops into hooks for easier modification.
* Moved all html into hooks as well, still have a few files with html in them. That is for 1.0.6


###### [1.0.4] 2017-12-05

* Changed the order of the sidebars to reflect a "top down" approach.
* renamed sidebar-1 and sidebar-2 in functions.php, sidebar-1 is now content sidebar one and sidebar-2 is now content sidebar two. Someone pointed out to me that right and left sidebars do not matter on mobile as the content is stacked. Made sense so I changed the names.

###### [1.0.3.1] 2017-12-04

* Corrected an issue with a PHP short tag in one of the files.
* Removed `admin.css` as it was not being used.
* Corrected typo in the header sidebar area.
* Added styles to top sidebar and footer sidebar so sub menu items will not display. Top Sidebar and Footer Sidebar menus are meant to be simple.
* Adjusted the layout of the header. Also adjusted where some of the hooks were being displayed in the header as well as removed some hooks from the header.
* Changed the name of the right sidebar from Main to Right Sidebar.

###### [1.0.3] 2017-12-04

* This version did not make it into the theme repo. There was an error with a PHP short tag being used in the theme.

###### [1.0.2] 2017-11-16

* Corrected issue where certain options were not working due to the fact that I did not updated those functions when I added the unique names in 1.0.1
* Adjusted a few css styles.
* Changed the order of appearance in the customizer of Header Alignment.

###### [1.0.1] 2017-11-13

* Added CHANGELOG.txt file to keep track of changes made to the theme.
* Removed an extra occurance of `add_theme_support('post-thumbnails');` which was located on line 31 of `functions.php`.
* Added unique prefix for everything the Theme defines in the public namespace, including options, functions, global variables, constants, post meta, etc.

###### [1.0.0] 2017-11-02

* Initial submission to the theme review team on 11/02/2017