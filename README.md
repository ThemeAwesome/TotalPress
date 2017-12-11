# TotalPress #

[![TotalPress Screenshot](https://raw.githubusercontent.com/ThemeAwesome/TotalPress/master/screenshot.png)](https://themeawesome.com/totalpress-wordpress-foundation-theme/)

**Theme Name:** TotalPress<br />
**Tags:** blog, one-column, two-columns, three-columns, right-sidebar, left-sidebar, footer-widgets, custom-background, flexible-header, custom-menu, editor-style, featured-images, full-width-template, microformats, post-formats, sticky-post, translation-ready, theme-options, custom-logo, custom-colors<br />
**Donate:** [TotalPress Project](https://www.paypal.me/themeawesome)<br />
**Requires at least:** 4.9.1<br />
**Tested up to:** 5.0-alpha-42380<br />
**Stable tag:** 1.0.5<br />
**License:** GNU General Public License v3.0<br />
**License URI:** [http://www.gnu.org/licenses/gpl-3.0.html](http://www.gnu.org/licenses/gpl-3.0.html)<br />

Description
===
Hello world, I'm TotalPress! I'm Based off _s (Underscores) and I also come with Zurb's Foundation for Sites fully integrated. What makes me awesome? I am fully responsive, meaning I adjust seamlessly to any screen resolution so I look good on any device. There's Schema microdata built in for posts and pages, I've got 9 widget areas built in as well as 6 different sidebar page templates. Did I mention hooks and filters? I got a ton of those. Another reason I'm awesome is I use the Kirki plugin. The Kirki plugin provides 30 custom control types for the theme customizer ranging from simple sliders and tooltips to complex typography controls including Google-Fonts. Kirki makes developing themes a lot faster and easier for developers and more meaningful for users. I also work really well with page builders like Elementor, Site Origin and many others. So what are you waiting for? Download me now and take me for a spin.

### Demo ###

[TotalPress demo site](https://themeawesome.com/themes/totalpress/) - Check it out.

Installation
===
* In your admin panel, go to `Appearance > Themes` and click the `Add New` button.
* Use the Search or Filter options to locate the TotalPress theme or click `Upload Theme`, then click `Choose File`, then select the TotalPress's ZIP file. Click Install Now.
* Click Activate to start using Totalpress.
* Once you have activated TotalPress, you will be promted by the TGM Plugin to install the Kirki Plugin: This theme recommends the following plugin: Kirki Plugin.
* If you you do not install the Kirki Plugin you will not be able to see or take advantage of the Theme Options section in the customizer.
* Once you have installed and activated the Kirki Plugin, go to `Appearance > Customizer > Theme Options` to start customizing your site.


Changelog
===
#### 1.0.6 ####
* Removed `CHANGELOG.txt` file from the theme. One less file means overall smaller file size. Not by much. Changes will be available via the `README.md` file on the GitHub Repository.

#### 1.0.5 ####

* Turned all the loops into hooks for easier modification.
* moved all html into hooks as well, still have a few files with html in them. That is for 1.0.6


#### 1.0.4 ####

* Changed the order of the sidebars to reflect a "top down" approach.
* renamed sidebar-1 and sidebar-2 in functions.php, sidebar-1 is now content sidebar one and sidebar-2 is now content sidebar two. Someone pointed out to me that right and left sidebars do not matter on mobile as the content is stacked. Made sense so I changed the names.

#### 1.0.3.1 ####

* corrected an issue with a PHP short tag in one of the files.

#### 1.0.3 ####

* Removed admin.css. It was not being used.
* Corrected typo in the header sidebar area.
* Added styles to top sidebar and footer sidebar so sub menu items will not display. Top Sidebar and Footer Sidebar menus are meant to be simple.
* Adjusted the layout of the header. Also adjusted where some of the hooks were being displayed in the header as well as removed some hooks from the header.
* Changed the name of the right sidebar from Main to Right Sidebar.

#### 1.0.2 ####

* Corrected issue where certain options were not working due to the fact that i did not updated those functions when i added the unique names in 1.0.1
* Adjusted a few css styles.
* Changed the order of appearance in the customizer of Header Alignment.

#### 1.0.1 ####

* Added CHANGELOG.txt file to keep track of changes made to the theme.
* Removed an extra occurance of "add_theme_support('post-thumbnails');" which was located on line 31 of functions.php
* Added unique prefix for everything the Theme defines in the public namespace, including options, functions, global variables, constants, post meta, etc.

#### 1.0.0 ####

* initial submission to the theme review team on 11/02/20175.0-alpha-42202