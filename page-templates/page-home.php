<?php
/**
 * Template Name: Home Page
 */

get_header();

the_post();

?>
    <div id="page-<?php the_ID(); ?>" <?php post_class( 'home-content' ); ?>>

    </div>
<?php
get_footer();
