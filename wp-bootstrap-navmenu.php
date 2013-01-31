<?php
/*
  Plugin Name: WP Bootstrap Menu
  Version: 1.0.4
  Description: Convert Wordpress nav menu to Twitter Bootstrap style.
  Plugin URI: http://wordpress.org/extend/plugins/wp-bootstrap-navmenu/
  Author: Sajjad Rad
  Author URI: http://sajjadrad.com/
 */

    $plugin_dir = plugin_basename(__FILE__);
    function getNavMenu($menuName)
    {
        $menu = $menuName; //Nav menu name
        $items = wp_get_nav_menu_items($menu); // Get nav menu items list
        $level = 0;
        $last_title = "";
        $last_url = "";
        $objectID_stack = array();
        $objectIDStackTop = 0;
        $output = "";
        foreach ($items as $list)
        {
            if($list->menu_item_parent == "0")
            {
                while(count($objectID_stack))
                {
                    array_pop($objectID_stack);
                }
                if($level == 1)
                {
                    $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li>";
                }
                if($level == 3)
                {
                    $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li></ul></li></ul></li>";
                }
                if($level == 2)
                {
                    $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li></ul></li>";
                }
                $level = 1 ;
                array_push($objectID_stack, $list->object_id);
                $last_title = $list->title;
                $last_url = $list->url;
            }
            else
            {
                $stackTop = count($objectID_stack)-1;
                if($list->menu_item_parent == $objectID_stack[$stackTop])
                {
                    if($level == 1)
                    {
                        $output = $output."<li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">".$last_title."<b class=\"caret\"></b></a><ul class=\"dropdown-menu\">";
                        $last_title = $list->title;
                        $last_url = $list->url;
                        $level = 2;
                        array_push($objectID_stack, $list->object_id);
                    }
                    else if ($level == 2)
                    {
                        $output = $output."<li class=\"dropdown-submenu\"><a href=\"#\">".$last_title."</a><ul class=\"dropdown-menu\">";
                        $last_title = $list->title;
                        $last_url = $list->url;
                        $level = 3;
                    }
                    else if($level == 3)
                    {
                        $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li>";
                        $last_title = $list->title;
                        $last_url = $list->url;
                        $level = 3;
                    }       
                }
                else
                {
                    if($level == 2)
                    {
                        array_pop($objectID_stack);
                        $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li>";
                        $last_title = $list->title;
                        $last_url = $list->url;
                        $level = 2;
                        array_push($objectID_stack, $list->object_id);
                    }
                    if($level == 3)
                    {
                        array_pop($objectID_stack);
                        $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li></ul></li>";
                        $last_title = $list->title;
                        $last_url = $list->url;
                        $level = 2;
                        array_push($objectID_stack, $list->object_id);
                    }
                    
                }
            }
        }
        if($level == 1) //If is parent and not printed.
            $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li>";
        else if($level == 2) //If is sub and not printed.
            $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li></ul></li>";
        else if($level == 3) //If is sub of sub and not printed.
            $output = $output."<li><a href=\"".$last_url."\">".$last_title."</a></li></ul></li></ul></li>";
        return $output;
    }