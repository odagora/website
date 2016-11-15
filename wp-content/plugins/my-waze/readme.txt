=== MyWaze ===
Contributors: roeeyossef, ramiy
Tags: Waze, Navigation, Mobile
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 1.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add a Waze navigation button to your mobile WordPress site and get visitors navigate to your location in a click!

== Description ==

= About Waze =

[Waze](https://www.waze.com/) is a free social traffic and navigation app that uses real-time road reports from drivers nearby to improve your daily commute.

https://www.youtube.com/watch?v=e_4hHhKGgWQ

= MyWaze WordPress Plugin =

MyWaze is the first WordPress plugin that lets you integrate a Waze navigation button into your WordPress site in a simple way.

== Installation ==

= Installation =
1. In your WordPress Dashboard go to "Plugins" -> "Add Plugin".
2. Search for "MyWaze".
3. Install the plugin by pressing the "Install" button.
4. Activate the plugin by pressing the "Activate" button.
5. Go to "MyWaze" Settings section on the wordpress admin panel and enter your location via Google Maps.
6. Choose an icon of your choice.
7. Select the alignment of the button.
8. Place **[my_waze]** shortcode wherever you want the button to appear your page.

= Minimum Requirements =
* WordPress version 4.0 or greater.
* PHP version 5.2.4 or greater.
* MySQL version 5.0 or greater.

= Recommended Requirements =
* The latest WordPress version.
* PHP version 5.6 or greater.
* MySQL version 5.5 or greater.

== Frequently Asked Questions ==

= What does the plugin do? =

The plugin integrate a waze navigation button into your WordPress site.

= How do add navigation button =

To add waze navigation button place the following shortcode wherever you want the button to appear your page:

`[my_waze]`

= Can I set custom parameters to my navigation button? =

For advanced customization, use following shortcode:

`[my_waze lat="" long=""]`

= Why can't i see the button ? =

The plugin use the **wp_is_mobile()** function so the button should appear **only on mobile devices**.

== Screenshots ==

1. "MyWaze" settings page.
2. Paste **[my_waze]** shortcode to your post/page editor.

== Changelog ==

= 1.6 =
* i18n: Use [translate.wordpress.org](https://translate.wordpress.org/) to translate the plugin.

= 1.5 =
* Rewrite the shortcode.
* Security: Prevent direct access to php files.
* Security: Prevent direct access to directories.
* Add i18n support.
* Add uninstall.
* Add phpDocs to the code.
* Add and update screenshots.

= 1.4.3 =
* Fix navigation errors.

= 1.4.2 =
* Fix for is_mobile() function.

= 1.4.1 =
* Fix an issue with the new icons.

= 1.4 =
* **A complete redesign of the plugin !**
* Choose your location using Google Maps API.
* Ability to choose the icon out of 4 different icons.
* Ability to choose the icon alignment.

= 1.3.2 =
* BUGFIX - fixed issue - icon appears on wrong.

= 1.3.1 =
* BUGFIX - fixed issue - icon always appears on top.

= 1.3 =
* BUGFIX - fixed issue - ixed an issue with the new icon.

= 1.2 =
* Improvement - Icon replaced to a modern icon.

= 1.1 =
* BUGFIX - fixed issue - fixed a CSS error which prevented the icon from showing.

= 1.0 =
* Initial release.
