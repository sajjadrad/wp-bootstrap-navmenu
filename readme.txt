=== Plugin Name ===
Contributors: sajjadrad
Tags: bootstrap, wordpress nav menu
Requires at least: 3.0.1
Tested up to: 3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Convert Wordpress nav menu to Twitter Bootstrap style.
for feedback email sajjad[dot]273[at]gmail[dot]com

== Description ==

WP Bootstrap navmenu convert wordpress nav menu style to Twitter Bootsrap [http://twitter.github.com/bootstrap/] navmenu style.

== Installation ==

1. Upload `wp-bootstrap-navmenu.php` to the `/wp-content/plugins/wp-bootstrap-navmenu/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Style your bootstrap navmenu and place `<?php echo getNavMenu( MENU NAME ); ?>` in your templates to get menu list.

Example:
<code>
	<div class="navbar">
		<div class="navbar-inner">  
 			<div class="container">
				<ul class="nav">
					<?php if (function_exists('getNavMenu')): ?>
						<?php echo getNavMenu('mainmenu'); ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</code>

== Screenshots ==

1.screenshot_1.jpg
2.screenshot_2.jpg

== Changelog ==

= 0.4.7 =
* First release.

