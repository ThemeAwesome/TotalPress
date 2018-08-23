# Changelog
### [1.0.29] - 2018-08-23
###### `Fixed`
* Fixed an issue with the translation markup. There were a few `esc_attr_e` that were not needed and were throwing errors. This caused version `1.0.28` not to be accepted. Plus I should have tested the theme againt the `Theme Check Plugin`, which I normally do but didn't do it this time.

###### `Changed`
* Redid the `.po` file to make the translation strings were correct.

##### [1.0.28] - 2018-08-23
###### `Fixed`
* An issue where the theme support for `Gutenberg` had changed. If you used the `Gutenberg` plugin a bunch of errors would be displayed.
* An issue with the `site-branding` portion of the header. If no `site title` was used or if no `site-description` was used and the `header-sidebar` was active, then the `header-sidebar` would reposition under the `site-branding` div.
* Issue with the `z-index` of a few elements related to `WooCommerce`. The `Sale` banner as well as the `serch` icon related to products had a very high `z-index`. This caused them to be above the menu when it was set to `Sticky`, `Scroll Hide` or `Sticky Shrink`.
* Fixed issue where the wrong translation strings were added. I had `esc_attr_()` when in reality I should have had `__()`.

###### `Added`
* Created a `.po` file and added a `language` file to make the theme truly translatable.
* Wrapped the content containers in section specific classes. If you are viewing the blog section or a post the classes that wrap them are now `post-container` and when viewing a page it is `page-container`. This was done to allow the user to target specific classes for each type instead of just one.

###### `Changed`
* Changed all `esc_attr_()` to `__()`
* Changed the `bottom` positioning of the `Back to Top` from `25px` to `15px`. Also changed the `right` positioning from `30px` to `33px`. This gives the `Back to Top` button a better visual appearance.
* Renamed `Content Layout` under `Content > Posts` to `Post Layout`. This was done to better identify and define this area.
* Changed some of the styles related to the `Page Builder` metabox options to acount for the new post page/page content settings.
* Changed the screenshot of TotalPress. This was done because the Theme Review team changed the rule regarding words that can be used in the screenshot of a theme. In other words they do not want the screenshot to look like an ad. To be safe I just made a new screenshot.

###### 1.0.27 - 2018-07-03
###### `Fixed`
* Error on line 150 of `styles.css`. There was an extra comma and period on this line.

###### `Added`
* Added new `Notification` which links to `About TotalPress`.
* Added `About TotalPress` page under `Appearance`.
* Added a `TotalPress Documentation` section in the customizer.

###### `Removed`
* The text decoration for `entry-meta` links. These links display under post titles.
* Versioning comments from some of the files. These are no longer needed.

###### `Changed`
* Changed the `Extend TotalPress` section in the customizer.

###### [1.0.26] 2018-06-25
###### `Added`
* CSS for `Motion UI 2.0` which was released on June 7,2018.
* CSS for the `Akismet Privavcy Notice`.
* Added `is_plugin_active` function to `totalpres-customizer.php`. This will load new panels if/when the `TP Primo` plugin is activated. This was added because once the user switched themes and went into the new theme's customizer, a `Fatal error:` would be generated. To remove the error the user would have to navigate to the Plugins page and deactivate `TP Primo`. This corrects that issue.

###### `Changed`
* Modified code for the metaboxes. The metaboxes will show for any custom post type. Thanks `@wordpressguy`.
* Modified the css that handles the color of links in the footer, specifically `.site-info a`.

###### `Removed`
* CSS for lists in mobile. For some reason I added some css to remove the way lists looked on mobile. All list types will now look the way they are supposed to on mobile devices.

###### [1.0.25] 2018-05-27
###### `Added`
* Theme support for the [`Header Footer Elementor plugin`](https://wordpress.org/plugins/header-footer-elementor/).
* Added `position` and `z-index` to the `top-bar` for `small only` media queries.
* Support for `Gutenberg wide/fullimages` in `functions.php`.
* Primary colors for theme to `Gutenberg` color block.
* CSS for `Gutenberg wide/fullimages` in `style.css`.
* Added padding to the `.inside-top-sidebar.cell` element, for some reason this was missing.
* Added `z-index:1` to `.main-navigation.grid-container`.
* Added `border and padding` to `img[class*="align"],img[class*="wp-image-"],img[class*="attachment-"]`.
* Added `GDPR` compliance to the comment form.
* Added styles for `p.comment-form-cookies-consent`.
* Added `$consent` parameter to `comments.php` - this is to avoid a php `Notice` that would appear when `WP_DEBUG` in `wp-config.php` was set to true.

###### `Changed`
* Background color of `switch controls` to match the default `customizer` colors.
* background color of `tooltips` to match the default `customizer` colors.

###### `Removed`
* `grid-x grid-padding-x` from the `top-bar`.
* Removed commented versioning from all files. It looked like this `/* @version 1.0.24 */`I would change this commented versioning everytime time to match the latest version being released. This made it look like all files had been changed. This was keeping anyone from seeing just the latest changes on GitHub or in the WordPress.org repo.

###### [1.0.24] 2018-05-12
###### `Added`
* Padding options to `Navigation > Layout`. Now users can adjust the padding of top level links as well as sub links.
* `Top-Bar Colors` the `Navigation` panel. This will allow the user to change all of the colors associated with the `Top-Bar` navigation menu.
* Typography options to the `Navigation` panel. Allows the user to change the font family for links in the main menu.
* Function to `totalpress-app.js` to remove empty `p` and `br` tags from `Accordion` and `Orbit` that are added automatically by the post/page editor.
* `Equalizer` to the `Footer Widgets` area. `Equalizer` gives multiple items equal height. You can read more about it over at [Foundation for Sites: Equalizer](https://foundation.zurb.com/sites/docs/equalizer.html).
* `Content Layout` section to the `Content` panel of `TotalPress Options`.
* `.site-content-full` body class. This is for when the end user selects `Full Width` in the new `Content Layout` section that was added to the `Content` section.
* Styles for the new body class elements `.inside-content`,`.site-content-full .site-content.grid-container` and `.site-content-inner-full .inside-content`.
* `Padding` and `Margin` control for the new `.inside-content` container.

###### `Changed`
* Some styles related to the navigation area. These changes correspond to the addition of navigation color options in TP Primo.
* The priority of the `Layout` section of the `Navigation` panel to 1, making it the first section in that panel.
* The name of the `Layout` section under `Content > Posts` to `Blog Posts`. This was done to better differentiate between posts on the blog page or single view posts.
* Some of the styles pertaining to the `Top Sidebar`. The padding was removed from the main container that holds the `Top Sidebar` and moved to the inner `Top Sidebar` container.
* Some of the styles pertaining to the `Footer Widgets`. The padding was removed from the main container that holds the `Footer Widgets` and moved to the inner `Footer Widget` container.
* Some of the styles pertaining to the `Footer`. The padding was removed from the main container that holds the `Footer` and moved to the inner `Footer` container.

###### `Removed`
* `Links` section from `style.css` and added all the link styles into their appropriate section. I did this to make it easier to modify each section more easiley.
* The function from `totalpress-app.js` that added `<span class="screen-reader-text"></span>` to `.menu-social-container a` as the social icons were removed when `Font Awesome` was removed.

###### [1.0.23] 2018-04-29
###### `Added`
* `Upsell section` to the customizer.
* Added styles to the customizer css to highlight the `upsell section`.

###### `Changed`
* Back to Top arrow. Uses pure css to create the arrow.

###### `Removed`
* FontAwesome from the theme. It was really not needed and did not perform very well. Trying to get the new version to work was a pain and switching back to FA4 would increase the size of the theme. Best just to gid rid of it.
* Styles associated with FA. This section was called `Social Navigation`. Also removed the `.menu-social-container` css.

###### [1.0.22] 2018-04-15
###### `Removed`
* Again, I left a few choice words in the code that should not be there so I removed them. Note to self "Do not do that anymore".

###### [1.0.21] 2018-04-15
###### `Removed`
* A few extra letters that are not so appropriate. I ususally add a saying when I am trying to figure stuff out and usually remove them, however I accidentally left it in this time.

###### [1.0.20] 2018-04-15
###### `Changed`
* The layout of the code in `totalpress-functions.php`. This was done to make the flow of the code more logical and easier to understand. The code is supposed to take a `top-down` approach.
* name of `Footer Widget Layout` to `Footer Widgets Layout`.
* Moved `Theme Layout` under `General Options` to the first position.
* Default font set to `sans-serif`.
* `totalpress_posted_on` action as well as the `totalpress_entry_footer` action hook in `totalpress-extras.php`.

###### `Added`
* Padding styles for the `one-container` content area of 404 pages.
* Top and bottom margins for images with a post that are linked. Line `389` of `style.css`
* `totalpress_single_entry_footer` and `totalpress_single_posted_on`

###### `Removed`
* Remeoved `h4` from line 296 of `style.css`. This was done to group all of the css produced by Kirki.
* `$show_edit_top` from `totalpress-extras.php` on line `44`, which shows the edit button below the title.

###### [1.0.19] 2018-04-03
###### `Added`
* Styling for the content area of 404 pages.
* `large-auto` to `totalpress_404_start` action.
* Extra space after the `,` on line 291 of `totalpress-extras.php`. Adds space in between all of the tags assigned to a post.

###### `Changed`
* Default font `Source Sans Pro` was changed to a default `System Font Stack`. This was done to make the theme load faster on the user end.
* Changed `get_theme_mod('totalpress_blog_layout') == 'sidebars_left')` in `totalpres-functions.php` on line 180 to `get_theme_mod('totalpress_blog_layout') == 'no_sidebars')`.
* Link in the footer section of the theme.

###### `Removed`
* Extra instance of `get_theme_mod('totalpress_blog_layout') == 'sidebars_left` in `totalpress-functions.php` in the `totalpress_open_post_container` action.

###### [1.0.18] 2018-03-23
###### `Fixed`
* Fixed issue with missing customizer setting `Sidebar | Content` for the default layout.

###### `Added`
* Updated list of `Google Fonts` to the `TotalPress Options > General > Typography` section. Now all `847` fonts are available, along with all the variables.

###### [1.0.17] 2018-03-22
###### `Fixed`
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

[1.0.29]: https://github.com/themeawesome/totalpress/compare/1.0.28...1.0.29
[1.0.28]: https://github.com/themeawesome/totalpress/compare/1.0.27...1.0.28
[1.0.27]: https://github.com/themeawesome/totalpress/compare/1.0.26...1.0.27
[1.0.26]: https://github.com/themeawesome/totalpress/compare/1.0.25...1.0.26
[1.0.25]: https://github.com/themeawesome/totalpress/compare/1.0.24...1.0.25
[1.0.24]: https://github.com/themeawesome/totalpress/compare/1.0.23...1.0.24
[1.0.23]: https://github.com/themeawesome/totalpress/compare/1.0.20...1.0.23
[1.0.20]: https://github.com/themeawesome/totalpress/compare/1.0.19...1.0.20
[1.0.19]: https://github.com/themeawesome/totalpress/compare/1.0.18...1.0.19
[1.0.18]: https://github.com/themeawesome/totalpress/compare/1.0.17...1.0.18
[1.0.17]: https://github.com/themeawesome/totalpress/compare/1.0.16...1.0.17