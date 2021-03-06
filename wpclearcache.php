<?php

/**
 * Plugin Name: WP Clear Cache
 * Description: Manages the <code>.wpclearcache</code> file to clear dentries and inodes when WordPress updates a plugin or theme.
 * Author:      WordPress Core Contributors
 * Author URI:  https://make.wordpress.org/core
 * License:     GPLv2 or later
 * Version:     1.0.0
 */

add_action(
	'pre_move_dir',
	function() {
		global $wp_filesystem;

		if ( ! $wp_filesystem ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		$wp_filesystem->touch( '/tmp/.wpclearcache' );
	}
);

add_action(
	'post_move_dir',
	function() {
		global $wp_filesystem;

		usleep( 200000 );

		if ( ! $wp_filesystem ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		$wp_filesystem->delete( '/tmp/.wpclearcache' );
	}
);
