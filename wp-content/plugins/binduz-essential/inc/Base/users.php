<?php
/**
 * @return array
 */


function binduz_user_meta_options() {
	$options = array(
	
		'user_designation' => array( 'type' => 'text', 'label' => esc_html__('Designation','binduz-essential'), 'value' => ' Founder' ),
		
	);
	return $options;
}

/**
 * Add new fields above 'Update' button.
 *
 * @param WP_User $user User object.
 */
function binduz_action_fw_additional_profile_fields( $user ) {

	$data = (array) get_the_author_meta( 'binduz-user-options', $user->ID );
    if(defined('FW')){
		echo fw()->backend->render_options( binduz_user_meta_options(), $data );
	}  
	
}

add_action( 'show_user_profile', 'binduz_action_fw_additional_profile_fields' );
add_action( 'edit_user_profile', 'binduz_action_fw_additional_profile_fields' );

/**
 * Save profile fields.
 *
 * @param int $user_id
 *
 * @return  bool
 */
function binduz_action_fw_save_profile_fields( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	return update_user_meta( $user_id, 'binduz-user-options', fw_get_options_values_from_input( binduz_user_meta_options() ) );
}

add_action( 'personal_options_update', 'binduz_action_fw_save_profile_fields' );
add_action( 'edit_user_profile_update', 'binduz_action_fw_save_profile_fields' );