<?php
/**
Plugin Name: WP Email NOSPAM
Plugin URI: https://github.com/relui/wp-email-nospam
Description: Prevents email address extraction from "mailto:" links in your content, comments and text widgets
Author: Aurel Canciu
Version: 1.0
Author URI: https://github.com/relu
License: GPLv2 or later
*/


/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
?>
<?php

/**
 * Filters
 */
add_filter('the_content', 'wpns_content_filter', 99);
add_filter('get_comment_text', 'wpns_content_filter', 99);
add_filter('widget_text', 'wpns_content_filter', 99);

/**
 * Register script enqeue to wp_enqueue_scripts hook
 */
add_action('wp_enqueue_scripts', 'wpns_load_script');

/**
 * This is the filter that replaces the @ character in
 * all occurrences of "mailto:" urls with a distinct string
 * "_AT_NOSPAM_"
 */
function wpns_content_filter($content) {
	$content = preg_replace('/(?<=mailto:)(.+)@([-.\w\d]+)/i', "$1_AT_NOSPAM_$2", $content);

	return $content;
}

/**
 * Script enqueue
 */
function wpns_load_script() {
	if (! is_admin()) {
		wp_enqueue_script('wp-email-nospam', plugins_url('wp-email-nospam.js', __FILE__), array(), '1.0', true);
	}
}

?>
