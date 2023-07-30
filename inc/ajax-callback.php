<?php
/**
 * callback function for "Appointment" form
 */
function sprivaten_appointment_form_ajax_callback() {
    if (empty($_POST['_nonce']) && !wp_verify_nonce($_POST['_nonce'], 'sprivaten_ajax_nonce')) {
        echo json_encode(['status' => 'error', 'msg' => 'Something went wrong, please try again later.']);
        die;
    }

    $errors = [];
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $department = $_POST['department'] ?? '';
    $time = $_POST['time'] ?? '';
    $message = $_POST['message'] ?? '';

    if (empty($name)) {
        $errors[] = 'Name field is required';
    }

    if (empty($email)) {
        $errors[] = 'Email field is required';
    }

    if (empty($department)) {
        $errors[] = 'Department field is required';
    }

    if (empty($time)) {
        $errors[] = 'Time field is required';
    }

    if (!empty($errors)) {
        echo json_encode(['status' => 'error', 'msg' => implode(', ', $errors)]);
        die;
    }

	$available_data = check_availability( $email, $department, $time );

	if ( ! $available_data['available'] ) {
		echo json_encode( [ 'status' => 'error', 'msg' => $available_data['msg'] ] );
		die;
	}

    insert_appointment_row($name, $email, $department, $time, $message);

	$output = ['status' => 'ok'];

	echo json_encode( $output );
	die;
}

add_action( 'wp_ajax_appointment_form', 'sprivaten_appointment_form_ajax_callback' );
add_action( 'wp_ajax_nopriv_appointment_form', 'sprivaten_appointment_form_ajax_callback' );

