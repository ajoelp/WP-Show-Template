<?php

function show_me_the_template()
{
    global $template, $current_user, $wp_admin_bar;

    get_currentuserinfo();

    if (!is_user_logged_in() && $current_user->ID != '1') {
        return;
    }

    if (is_admin_bar_showing()) {
        preg_match('/\/themes(.*)/', $template, $matches);
        $wp_admin_bar->add_menu([
          'parent' => false,
          'id'     => 'template',
          'title'  => 'Template: '.$matches[0],
          'href'   => 'javascript:void(0)',
        ]);
    }
}
add_action('wp_head', 'show_me_the_template');
