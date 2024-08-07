<?php

function get_menu_id($location)
{
    $locations = get_nav_menu_locations();
    return $locations[$location] ?? '';
}

function custom_nav_menu($location)
{
    $menu_id = get_menu_id($location);

    if (!$menu_id) {
        return "Menu location '$location' not found or not assigned.";
    }

    $menu_items = wp_get_nav_menu_items($menu_id);

    if (!$menu_items) {
        return "No menu items found for location '$location'.";
    }

    $top_menu_list = '<ul id="top-menu" class="nav flex gap-2">';
    $submenu_list = '<div class="submenu-wrapper flex gap-2">';
    $menu_array = [];

    // Organize menu items into a hierarchical array
    foreach ($menu_items as $item) {
        if ($item->menu_item_parent == 0) {
            $menu_array[$item->ID] = [
                'item' => $item,
                'children' => []
            ];
        } elseif (isset($menu_array[$item->menu_item_parent])) {
            $menu_array[$item->menu_item_parent]['children'][$item->ID] = [
                'item' => $item,
                'children' => []
            ];
        } else {
            foreach ($menu_array as &$parent_item) {
                if (isset($parent_item['children'][$item->menu_item_parent])) {
                    $parent_item['children'][$item->menu_item_parent]['children'][$item->ID] = [
                        'item' => $item,
                        'children' => []
                    ];
                    break;
                }
            }
        }
    }

    // Build the top menu and submenus
    foreach ($menu_array as $item_id => $item) {
        $top_menu_list .= '<li id="nav-item-' . $item_id . '" class="nav_item_parent"><a href="' . esc_url($item['item']->url) . '">' . esc_html($item['item']->title) . '</a></li>';
        if (!empty($item['children'])) {
            $submenu_list .= '<ul id="submenu-' . $item_id . '" class="sub-menu">';
            foreach ($item['children'] as $child_id => $child) {
                $submenu_list .= build_sub_menu_item($child, 1, $child_id);
            }
            $submenu_list .= '</ul>';
        }
    }

    $top_menu_list .= '</ul>';
    $submenu_list .= '</div>';

    return '<nav class="nav-wrapper">' . $top_menu_list . $submenu_list . '</nav>';
}

function build_sub_menu_item($item, $level = 1, $item_id)
{
    $li_class = ($level === 1) ? 'sub_menu--nav-item' : 'grandchild-list__nav-item';
    $ul_class = ($level === 1) ? 'grandchild-list' : 'great-grandchild-list';

    $menu_item = '<li id="nav-item-' . $item_id . '" class="' . $li_class . '">';
    $menu_item .= '<a href="' . esc_url($item['item']->url) . '">' . esc_html($item['item']->title) . '</a>';

    if (!empty($item['children'])) {
        $menu_item .= '<ul id="submenu-' . $item_id . '" class="' . $ul_class . '">';
        foreach ($item['children'] as $child_id => $child) {
            $menu_item .= build_sub_menu_item($child, $level + 1, $child_id);
        }
        $menu_item .= '</ul>';
    }

    $menu_item .= '</li>';
    return $menu_item;
}
