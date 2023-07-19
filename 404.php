<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="entry-title"><?php esc_html_e( 'Not found', 'sprivaten-theme' ); ?></h1>
                <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'sprivaten-theme' ); ?></p>
            </div>
        </div>
    </div>

<?php
get_footer();
