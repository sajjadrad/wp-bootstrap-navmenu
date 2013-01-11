<?php
/*
  Plugin Name: WP Bootsrap Menu
  Version: 0.4.7
  Description: Convert Wordpress nav menu to Twitter Bootstrap style.
  Plugin URI: ?
  Author: Sajjad Rad
  Author URI: http://sajjadrad.com/
 */

    $plugin_dir = plugin_basename(__FILE__);
    function getNavMenu($menuName)
    {
        $menu = $menuName; //Nav menu name
        $items = wp_get_nav_menu_items($menu); // Get nav menu items list
        $isParent = False; //Checking this sub item is child of previous item or not
        $firstChild = False; //Checking this sub item is first child of previous item or not
        $hasChild = False; //Checking previous main item has a child or not
        $last_title = "";
        $last_url = "";
        $output = "";
        foreach ($items as $list)
        {
            if ($list->menu_item_parent != "0")
            {
                if ($isParent and $firstChild)
                {
                    $isParent = False;
                    $firstChild = False;
                    $hasChild = True;
                    $output = $output."<li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".$last_title."<b class=\"caret\"></b></a><ul class=\"dropdown-menu\"><li><a href=\"".$list->url."\">".$list->post_title."</a></li>";
                }
                else if ($hasChild and !$firstChild)
                {
                    $output = $output."<li><a href=\"".$list->url."\">".$list->post_title."</a></li>";

                }
            }
            else
            {
                if ($isParent)
                {
                    $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li>";
                }
                if ($hasChild)
                {
                    $output = $output."</ul></li>";
                    $hasChild = False;
                }
                $isParent = True;
                $firstChild = True;
                $last_title = $list->title;
                $last_url = $list->url;
            }
        }
        return $output;
    }

