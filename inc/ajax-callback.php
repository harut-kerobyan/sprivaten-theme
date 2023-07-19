<?php
/**
 * callback function for "Appointment" form
 */
function sprivaten_appointment_form_ajax_callback() {
	$output = [];


	echo json_encode( $output );
	die;
}

add_action( 'wp_ajax_appointment_form', 'sprivaten_appointment_form_ajax_callback' );
add_action( 'wp_ajax_nopriv_appointment_form', 'sprivaten_appointment_form_ajax_callback' );

