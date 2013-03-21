=== Plugin Name ===
Contributors: sajjadrad
Tags: bootstrap, wordpress navmenu
Requires at least: 3.0.1
Tested up to: 3.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Convert Wordpress nav menu to Twitter Bootstrap style.

== Description ==

WP Bootstrap Menu convert wordpress nav menu style to Twitter Bootstrap [http://twitter.github.com/bootstrap/] navmenu style.
You can join to WP Bootstrap Menu developing [https://github.com/sajjadrad/wp-bootstrap-navmenu] .
Compatible with Bootstrap 2.2.2 and support sub menu.


== Installation ==

1. Upload `wp-bootstrap-navmenu.php` to the `/wp-content/plugins/wp-bootstrap-navmenu/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Style your bootstrap navmenu and place `<?php echo getNavMenu( MENU NAME ); ?>` in your templates to get menu list.
1. To change options for dropdown item,you can set option argument when calling getNavMenu function.Dropdown has two options,"hover" and "click".In "click" option,dropdown items link address set to # and in "hover" option full address used.The default option set to "click".

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

or:

<code>
	<div class="navbar">
		<div class="navbar-inner">  
 			<div class="container">
				<ul class="nav">
					<?php if (function_exists('getNavMenu')): ?>
						<?php echo getNavMenu('mainmenu','hover'); ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</code>


== Screenshots ==

1. **Wordpress Navmenu**
2. **Output Bootstrap style**
3. **Submenu**

== Changelog ==

= 0.4.7 =
* First release.

= 0.4.8 =
* Fix Page title loading in link tag.
* Fix showing last parent item.

= 1.0.4 =
* Sub menu supported.
* Last item showing fixed.

= 1.0.5 =
* Dropdown hover problem fixed.

= 1.1.0 =
* Hover or click options for Dropdown items added.

