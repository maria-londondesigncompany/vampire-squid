<?php

function theme_after_switch_theme($old_name = null, $old_theme = null)
{
  error_log(var_export(compact('old_name', 'old_theme'), true));
}


add_action('after_switch_theme', 'theme_after_switch_theme', 10, 2);




function theme_wp_install($user = null)
{
  error_log(var_export(compact('user'), true));
}


add_action('wp_install', 'theme_wp_install', 10, 2);
