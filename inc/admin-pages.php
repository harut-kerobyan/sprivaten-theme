<?php
function appointments_admin_page_callback() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'appointment';
    $results = $wpdb->get_results("SELECT * FROM {$table_name} ORDER BY `created_at` DESC");

    ?>
    <div class="wrap">
        <h1>All Appointments</h1>

        <?php if (!empty($results)) : ?>
        <table class="wp-list-table widefat fixed striped table-view-list">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Time</th>
                <th>Message</th>
                <th>Submission date</th>
            </tr>
            <?php foreach ($results as $row) : ?>
            <tr>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->department; ?></td>
                <td><?php echo $row->time; ?></td>
                <td><?php echo $row->message; ?></td>
                <td><?php echo $row->created_at; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else : ?>
            <p>No data yet</p>
        <?php endif; ?>
    </div>
    <?php
}

function add_custom_admin_page() {
    add_menu_page('All Appointments', 'Appointments', 'manage_options', 'appointments-page', 'appointments_admin_page_callback', 'dashicons-calendar-alt', 30);
}

add_action('admin_menu', 'add_custom_admin_page');