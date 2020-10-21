<?php
/**
 * Plugin Name:  Disallow Indexing
 * Plugin URI:   https://github.com/sitepilot/project-wordpress
 * Description:  Disallow indexing of your site on non-production environments.
 * Version:      1.0.0
 * Author:       Sitepilot
 * Author URI:   https://sitepilot.io
 * License:      GPL3
 */

if (defined('WP_ENV') && WP_ENV !== 'production' && !is_admin()) {
    add_action('pre_option_blog_public', '__return_zero');
}
