<?php
/**
* Plugin Name: Personalized Activity for Buddypress - Following & Admin
* Description: Makes Buddypress Activity Personalized For Users, by Including Activity Feeds Only From Users They Are Following And Administrator of Your Community.
* Version: 1.0.3
* Author: Rubix from SPARCK
* Author URI: https://drip-sparck.pantheonsite.io
* License:      GPL3
* License URI:  https://www.gnu.org/licenses/gpl-3.0.html
**/

function personalized_activity_for_buddypress_FwA_by_rubix_args( $args ) {
	
	if( ! bp_is_activity_directory() || !  is_user_logged_in() ) {
		return $args;
	}
	
	//get owner's user id - by rubix	
	$user_id_by_rubix = get_current_user_id();
	
	//includes activity from user with user id as 1, generally it's of wp admin -by rubix
	$user_admin_by_rubix = 1;
	
	//get user ids of followings of user viewing it - by rubix
	$user_id_followings_by_rubix = bp_get_following_ids ( $user_id );
	
	//include activities from below mentioned ids collected in above statements - by rubix 
	array_push( $user_id_by_rubix, $user_admin_by_rubix, $user_id_followings_by_rubix);
	
	$args['user_id_by_rubix'] = $user_id_followings_by_rubix;
	
	return $args;
	
}
add_filter( 'bp_after_has_activities_parse_args', 'personalized_activity_for_buddypress_FwA_by_rubix_args' );
