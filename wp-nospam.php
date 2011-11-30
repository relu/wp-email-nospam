<?php
/*
Plugin Name: WP NOSPAM
Plugin URI:
Description: Wordpress No Spam plugin
Author: Aurel Canciu
Version: 1.0
Author URI: https://github.com/relu
License: GPLv2 or later
*/


/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
?>
<?php

function wpns_content_filter($content) {
	$content = preg_replace('/(?<=mailto:)(.+@)([-.\w\d]+)/i', "$1NOSPAM$2", $content);

	return $content;
}
add_filter('the_content', 'wpns_content_filter');

?>
