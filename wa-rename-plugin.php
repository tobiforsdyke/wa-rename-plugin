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


// function wa_rename_fix( $content ) {
//   $search = array( 'wacartscollege.co.uk', 'wac' );
//   $replace = array( 'WacArtsCollege.co.uk', 'WAC' );
//   return str_replace( $search, $replace, $content );
// }
// add_filter( 'the_content', 'wa_rename_fix' );


// Settings menu and page

add_action('admin_menu', 'wa_rename_plugin_menu');

function wa_rename_plugin_menu() {
	add_menu_page('WA Rename Settings', 'WA Rename Settings', 'administrator', 'wa-rename-plugin-settings', 'wa_rename_plugin_settings_page', '
dashicons-welcome-write-blog');
}

function wa_rename_plugin_settings_page() {
  <div class="wrap">
    <h2>Staff Details</h2>
    <form method="post" action="options.php">
        <?php settings_fields( 'wa-rename-plugin-settings-group' ); ?>
        <?php do_settings_sections( 'wa-rename-plugin-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Word to Search For:</th>
            <td><input type="text" name="search_word" value="<?php echo esc_attr( get_option('accountant_name') ); ?>" /></td>
            </tr>

            <tr valign="top">
            <th scope="row">Replace with:</th>
            <td><input type="text" name="replace_word" value="<?php echo esc_attr( get_option('accountant_phone') ); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
  </div>
}

// Registering the settings

add_action( 'admin_init', 'wa_rename_plugin_settings' );

function wa_rename_plugin_settings() {
	register_setting( 'wa-rename-plugin-settings-group', 'search_word' );
	register_setting( 'wa-rename-plugin-settings-group', 'replace_word' );
}

// Search/Replace function from top

function wa_rename_fix( $content ) {
  $search = array( 'wacartscollege.co.uk', 'wac' );
  $replace = array( 'WacArtsCollege.co.uk', 'WAC' );
  return str_replace( $search, $replace, $content );
}
add_filter( 'the_content', 'wa_rename_fix' );

?>
