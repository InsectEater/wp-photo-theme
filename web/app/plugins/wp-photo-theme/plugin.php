<?php
/**
 * Plugin Name: WP photo theme plugin
 * Plugin URI:  https://github.com/InsectEater/wp-photo-theme
 * Description: WP photo theme plugin is a supportive plugin fot the WP photo theme
 * Author: InsectEater
 * Author URI: http://www.infosphere.org
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
