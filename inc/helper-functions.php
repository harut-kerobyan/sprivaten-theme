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

function rate_stars_html($rate = 5) {
    if ($rate < 1 || $rate > 5) {
        return;
    }

    $empty_stars = 5 - $rate;
    $output = '<div class="rate-stars">';
    $star = '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
        <path d="M20.6716 8.41256C20.6139 8.24274 20.5078 8.09353 20.3663 7.98335C20.2248 7.87316 20.0542 7.80681 19.8754 7.79251L14.6463 7.377L12.3835 2.36798C12.3114 2.20665 12.1942 2.06963 12.046 1.97344C11.8977 1.87726 11.7248 1.82602 11.5482 1.82593C11.3715 1.82583 11.1985 1.87687 11.0502 1.9729C10.9019 2.06892 10.7845 2.20582 10.7123 2.36707L8.44944 7.377L3.22029 7.79251C3.04459 7.80642 2.87663 7.87066 2.73649 7.97754C2.59636 8.08442 2.48998 8.2294 2.43008 8.39516C2.37019 8.56091 2.35931 8.74041 2.39876 8.91218C2.43821 9.08395 2.52631 9.24072 2.65252 9.36373L6.51682 13.1308L5.15015 19.0488C5.10865 19.2279 5.12195 19.4154 5.18832 19.5869C5.25469 19.7584 5.37107 19.9059 5.52236 20.0105C5.67365 20.115 5.85286 20.1716 6.03673 20.173C6.2206 20.1744 6.40065 20.1205 6.55351 20.0183L11.5479 16.6888L16.5422 20.0183C16.6984 20.1221 16.8827 20.1755 17.0702 20.1713C17.2577 20.1672 17.4394 20.1058 17.591 19.9953C17.7425 19.8848 17.8566 19.7306 17.9178 19.5533C17.9791 19.3761 17.9846 19.1843 17.9336 19.0039L16.256 13.1336L20.4166 9.38941C20.689 9.14359 20.789 8.76019 20.6716 8.41256Z" fill="#F3CD03"/>
    </svg>';

    $star_empty = '<svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22" fill="none">
        <path d="M6.53239 13.1308L5.16571 19.0488C5.12339 19.228 5.1361 19.4158 5.20217 19.5877C5.26824 19.7596 5.3846 19.9075 5.53606 20.0122C5.68752 20.1169 5.86704 20.1735 6.05117 20.1746C6.23529 20.1757 6.41547 20.1212 6.56816 20.0183L11.5625 16.6888L16.5568 20.0183C16.7131 20.1221 16.8973 20.1755 17.0848 20.1714C17.2723 20.1673 17.4541 20.1058 17.6056 19.9953C17.7571 19.8849 17.8712 19.7306 17.9325 19.5534C17.9937 19.3761 17.9993 19.1844 17.9483 19.0039L16.2707 13.1336L20.4312 9.38944C20.5645 9.26946 20.6597 9.11304 20.705 8.93955C20.7503 8.76605 20.7437 8.58308 20.6861 8.41327C20.6286 8.24345 20.5225 8.09424 20.381 7.98408C20.2395 7.87392 20.0688 7.80764 19.8901 7.79345L14.6609 7.37703L12.3981 2.36801C12.326 2.20672 12.2087 2.06976 12.0604 1.97366C11.9121 1.87755 11.7392 1.82642 11.5625 1.82642C11.3858 1.82642 11.2129 1.87755 11.0646 1.97366C10.9163 2.06976 10.7991 2.20672 10.7269 2.36801L8.46409 7.37703L3.23493 7.79254C3.05924 7.80645 2.89128 7.87069 2.75114 7.97757C2.61101 8.08445 2.50463 8.22943 2.44473 8.39518C2.38483 8.56094 2.37396 8.74044 2.41341 8.91221C2.45286 9.08398 2.54095 9.24074 2.66717 9.36376L6.53239 13.1308ZM9.14926 9.16288C9.31298 9.14998 9.47022 9.09328 9.60449 8.99871C9.73875 8.90414 9.84511 8.77519 9.9124 8.62538L11.5625 4.97387L13.2126 8.62538C13.2799 8.77519 13.3863 8.90414 13.5205 8.99871C13.6548 9.09328 13.812 9.14998 13.9757 9.16288L17.619 9.45181L14.6187 12.1521C14.3582 12.387 14.2546 12.7484 14.35 13.0859L15.4993 17.108L12.0725 14.8231C11.9221 14.7222 11.745 14.6683 11.5639 14.6683C11.3827 14.6683 11.2057 14.7222 11.0553 14.8231L7.47439 17.2107L8.43749 13.0409C8.4728 12.8876 8.46806 12.7277 8.42372 12.5767C8.37939 12.4257 8.29695 12.2887 8.18433 12.1787L5.39777 9.4619L9.14926 9.16288Z" fill="#F3CD03"/>
    </svg>';

    for ($i = 0; $i < $rate; $i++) {
        $output .= $star;
    }

    if ($empty_stars) {
        for ($i = 0; $i < $empty_stars; $i++) {
            $output .= $star_empty;
        }
    }

    echo $output . '</div>';
}

function check_availability( $email, $department, $time ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'appointment';
	$output     = [ 'available' => true ];

	// Prepare SQL queries
	$user_email_sql = $wpdb->prepare(
		"SELECT * FROM {$table_name} WHERE `email` = %s AND `time` = %s",
		[ $email, $time ]
	);
	$user_dep_sql = $wpdb->prepare(
		"SELECT * FROM {$table_name} WHERE `email` = %s AND `department` = %s",
		[ $email, $department ]
	);
	$time_sql  = $wpdb->prepare(
		"SELECT * FROM {$table_name} WHERE `department` = %s AND `time` = %s",
		[ $department, $time ]
	);

	// SQL queries execution
	$user_email_exist = $wpdb->get_row( $user_email_sql );
	$user_dep_exist = $wpdb->get_row( $user_dep_sql );
	$time_booked = $wpdb->get_row( $time_sql );

	if ( $user_email_exist || $user_dep_exist ) {
		$output['available'] = false;
		$output['msg']       = 'You already booked an appointment.';
	} elseif ( $time_booked ) {
		$output['available'] = false;
		$output['msg']       = 'That time is already booked.';
	}

	return $output;
}
