<?php
/*
Plugin Name: WA Rename Plugin
Plugin URI:  http://www.tobiforsdyke.co.uk/
Description: This plugin replaces certain words with your own words.
Version:     1.0
Author:      Tobi Forsdyke
Author URI:  http://www.tobiforsdyke.co.uk/
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

function wa_rename_fix( $content ) {
  $search = array( 'wacartscollege.co.uk', 'wac' );
  $replace = array( 'WacArtsCollege.co.uk', 'WAC' );
  return str_replace( $search, $replace, $content );
}
add_filter( 'the_content', 'wa_rename_fix' );

?>
