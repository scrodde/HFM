<?php

function contest_invitations_query($args = array()) {
	$defaults = array('post_type' => 'contest-invitation',
						'posts_per_page' => 0
						 
					);

	$args = array_merge($args, $defaults);
	$query = new WP_Query($args);
	return $query;
}

function contest_invitation_is_valid($post) {
	$post = get_post($post);
	
	$registrationStart = get_post_meta($post->ID, 'registration_start', true);
	$registrationEnd = get_post_meta($post->ID, 'registration_end', true);
	
	date_default_timezone_set('Europe/Helsinki');
	
	$now = strtotime(date('Y-m-d'));
	$startTime = strtotime($registrationStart);
	$endTime = strtotime($registrationEnd);
	
	if($startTime <= $now && $now <= $endTime) {
		return true;
	}
	
	return false;
}

function contest_invitation_categories($post) {
	
}
?>