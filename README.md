# TotalPress #

![TotalPress Screenshot](https://raw.githubusercontent.com/ThemeAwesome/TotalPress/master/screenshot.png)

**Theme Name:** TotalPress<br />
**Tags:** blog, one-column, two-columns, three-columns, right-sidebar, left-sidebar, footer-widgets, custom-background, flexible-header, custom-menu, editor-style, featured-images, full-width-template, microformats, post-formats, sticky-post, translation-ready, theme-options, custom-logo, custom-colors<br />
**Donate:** [TotalPress Project](https://www.paypal.me/themeawesome)<br />
**Requires at least:** 4.9.4<br />
**Tested up to:** 4.9.4<br />
**Stable tag:** 1.0.18<br />
**License:** GNU General Public License v3.0<br />
**License URI:** [http://www.gnu.org/licenses/gpl-3.0.html](http://www.gnu.org/licenses/gpl-3.0.html)<br />

Description
===
Hello world, meet TotalPress! I'm Based off _s (Underscores) and I also come with Zurb's Foundation for Sites fully integrated. What makes me awesome? I am small and fast (**I'm just 438kb compressed**). I am fully responsive, meaning I adjust to any screen resolution so I look good on any device. I've got a ton of hooks and filters, ten (10) widget areas built in as well as 6 different sidebar page templates. I use the Kirki plugin which provides 30 custom control types for the theme customizer ranging from simple sliders and tooltips to complex typography controls including Google-Fonts. I also use the Meta-Box plugin which is a powerful, professional toolkit for developers to create and handle everything related to custom meta boxes and custom fields for WordPress. Did I mention that I work really well with page builders like Elementor. So what are you waiting for? Download me today and take me for a spin.

### Theme Demo ###

[TotalPress Theme Demo](https://themeawesome.com/themes/totalpress/)

### Theme Documentation (in progress) ###

[TotalPress Documentation](https://themeawesome.com/docs/totalpress/)

Installation
===
Installing theme from within WordPress

1. Visit `Appearance > Themes > Add New`.
2. Search for `TotalPress`.
3. Click the `Install Now` button to install the theme.
4. Click the `Activate` button to activate the theme.

Installing theme manually

1. Unzip the download package.
2. Upload `totalpress` to the `/wp-content/themes/` directory.
3. Activate the theme through the `Themes` menu in WordPress.

Additional Installation

1. Once you have activated TotalPress, you will be promted to install the Kirki Plugin, as well as the the Meta-Box Plugin. You will see the following message: "This theme requires the following plugins: Kirki Plugin and Meta Box".
2. When you have installed and activated the Kirki Plugin, go to `Appearance > Customizer > TotalPress Options` and start customizing your site.
3. Once you have installed the Meta-Box plugin, you will see an additional metaboxes in the post/page editor.
4. If you do not install either one of these plugins, you will not see the `TotalPress Options` section in the customizer and you will not see the metaboxes in the post/page editor.

Changelog
===
### [1.0.18] 2018-03-23
* OK let's do this one more time. Corrected an issue where I forgot to add the customizer setting for the default layout. I forgot to add the `Sidebar | Content` layout choice. It should be corrected now.
* Added the entire `updated list` of `Google Fonts` to the `TotalPress Options > General > Typography` section. Now all `847` fonts are available, along with all the variables.

###### [1.0.17] 2018-03-22
* Corrected an issue where I forgot to add the customizer setting for the default layout. It should be corrected now.

###### [1.0.16] 2018-03-22
* Corrected an issue where under `TotalPress Options > Navigation Layout`, most of the options had `Top-Bar` in the title. Switched them all to reflect `Main Menu`.
* Corrected a link style issue in the `Top Sidebar`.
* Added new version of `FontAwesome 5.0.6` - Using the `svg-with-js` and loading the `fontawesome-all.min.js`.
* Added `defer` attributes to `fontawesome-all.min.js`. I am still trying to correct the issue where any `Font-Awesome` icons `flash` on page load.
* Added some additional styles to the `previous post` and `next post butons` in mobile view.
* Adjusted the styles for `code` and `pre` elements.
* Renamed `template-functions.php` to `totalpress-functions.php`.
* Wrapped the `totalpress-copyright` flter in a action called `totalpress_credits`. This was done to add support to change the footer copyright message via the `TP-Primo` plugin.
* Added `.cell` to the stylesheet elements for `.header-sidebar`. Now all of the css targets `.header-sidebar.cell` instead of just `.header-sidebar`.
* Added support for `Gutenberg` wide images and color pallet.
* Adjusted the width of the left and right sidebars. Instead of being set with an actual column size, i.e. `large-4`, I have set them to `large-auto` while leaving the content container set to `large-8`. This will cause the sidebars to `auto` adjust to fill the necessary space. I have also removed the widths from `Body Source Ordering` and `Template Source Ordering` sections of `style.css`.
* Renamed the function `totalpress_open_post_container` to `totalpress_build_open_post_container` to go along more inline with the action `totalpress_open_post_container`.
* Added `p.attachment` to `style.css` and the value to `text-align:center`. Now when viewing an attachment page the image will display centered instead of left aligned.

###### [1.0.15] 2018-01-30
* Switched to minmized versions of `foundation.js`, `foundation.css`, `motionui.css`, `font-awesome.css`.

###### [1.0.14] 2018-01-25 
* Took out the `Kirki_Installer_Section` of `totalpress-include-kirki.php` per the theme review. This creates a a `Admin notice` that is not dismissable and is also not needed as the theme uses `TGM PLugin`.
* Switched `esc_attr__` to `esc_html__` per theme review.
* Reworked `screenshot.png` to reflect how the site will actually look once the theme is activated.
* Changed `app.js` to `totalpress-app.js` per theme review.
* Added `totalpress-` prefix to all files that are called with `require` per theme review.
* **Theme was approved by theme review team**.

###### [1.0.13] 2018-01-24
* Corrected an issue where `<span class="screen-reader-text">` was appearing next to `Leave a Comment`. I change `__(` to `esc_html(` which caused the issue.
* Added some styles to fix some issues with the padding of the content and right sidebar areas in `archive`, `page-template-default` and `search` pages.
* Added a few styles to `WooCommerce`.

###### [1.0.12] 2018-01-24
* Prefixed `modify_archive_title()` in `extras.php` with `totalpress`.
* Prefixed `add_image_size()` in `functions.php` with `totalpress`. Changed it from `full-width` to `totalpress-full-width`.
* Removed `search-form` from `add_theme_support('html5')` as I am customizing it myself.
* Corrected a fatal error that was occurring after the theme was activated and the user went to the customizer. I corrected it by removing the function `active_plugins` from `customizer.php`.
* Removed the `Meta Box Tabs` plugin. **This is a premium plugin and cannot be included in a free plugin or theme** according to the [Meta Box FAQ](https://metabox.io/faq/). This will be added to `TP-Primo`.

###### [1.0.11] 2018-01-20
* added `load_theme_textdomain` to make the theme translatable.
* Switched from using `TOTALPRESS_DIR` to `get_template_directory()` in `functions.php` and `customizer.php`
Removed some of the features from the `setup_totalpress` function in `functions.php` - just trying to trim the fat some more.
* Corrected css issue where social icon links in the left and right sidebar were not using the hover tranisitons set `transition: all .2s ease-in!important;`
* Set the requirement for the `Kirki` and `Meta Box` plugin to `false`, meaning they are not required even though they are - per the theme review team.
* Removed the `totalpress_remove_recent_comments_style` from `functions.php` - per theme review team.
* Removed custom excerpt length - per theme review team. Will make available via `TP-Primo`.
* Added ecerpt function from `TwentySeventeen` per the theme review team. Apprantly the old ecerpt function was affecting the admin side and this is not allowed.
* Declared my `copyright` in the `readme.txt` file - per the theme review team.
* Changed to the `WordPress.org` version of the `TGM Plugin Activation` plugin - per theme review team.
* Removed `totalpress_display_author` - this can be done via a plugin or hand coded. Just trimming more.
* Removed the `Featured Image Options` from being hidden unless there was an actual `featured image` attached to the post/page. This will be added back once I get with the dev's over at `MetaBox.io` so the issue can get corrected.
* Removed the `Meta Box Conditionals` plugin from the theme. Until the previous issue is corrected it is not needed. Will add it once the previous issue is taken care of.
* Replaced all instances of `_e` with `esc_html_e`.

###### [1.0.10] 2018-01-18
* Accidentally added two instances of `../fonts` to the `font-awesome.css` file. This was causing an issue, but now it's corrected.
* Tidied up `Foundation for Sites` and `MotionUI` css in `styles.css` - Cleaned up a lot of empty space. Didn't make that big of a difference however it did reduce the overall theme size by **2kb**!
* Corrected issue where `sub navs` were displaying in a menu in the `header sidebar`. This will be added later in an update.
* Corrected a padding issue with the left and right sidebar in the `sidebar-content-sidebar.php` file.
* Removed `totalpress_header_items()` function from `template-functions.php`. Also rewrote `totalpress_build_logo()` and `totalpress_build_site_title()` functions and turned them into actions. This was done to make it easier for the end user to set the layout of the logo and site title/description in `TP-Primo.`
* Corrected some padding issues with the template pages.

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