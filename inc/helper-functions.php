<?php
/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */
function awesome_acf_responsive_image( $image_id, $image_size, $max_width ) {

	// check the image ID is not blank
	if ( $image_id != '' ) {

		// set the default src image size
		$image_src = wp_get_attachment_image_url( $image_id, $image_size );

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );
		
		// generate the markup for the responsive image
		echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
	}
}

/**
 * Insert Book Appointment form data to DB
 *
 * @param $name
 * @param $email
 * @param $department
 * @param $time
 * @param $message
 * @return void
 */
function insert_appointment_row($name, $email, $department, $time, $message) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointment';
    $created_at = current_time('mysql');

    $data = array(
        'name' => $name,
        'email' => $email,
        'department' => $department,
        'time' => $time,
        'message' => $message,
        'created_at' => $created_at,
    );

    $data_formats = array('%s', '%s', '%s', '%s', '%s', '%s');

    $wpdb->insert($table_name, $data, $data_formats);
}
