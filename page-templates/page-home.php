<?php
/**
 * Template Name: Home Page
 */

get_header();

the_post();

?>
    <div id="page-<?php the_ID(); ?>" <?php post_class( 'home-content' ); ?>>
        <?php if( have_rows('components') ) : ?>
            <?php while ( have_rows('components') ) : the_row(); ?>
                <?php if( get_row_layout() == 'hero_section' ) : ?>
                    <?php get_template_part('sections/section', 'hero'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'why_choose_us_section' ) : ?>
                    <?php get_template_part('sections/section', 'why_choose_us'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'video_section' ) : ?>
                    <?php get_template_part('sections/section', 'video'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'testimonials_section' ) : ?>
                    <?php get_template_part('sections/section', 'testimonials'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'team_section' ) : ?>
                    <?php get_template_part('sections/section', 'team'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'contact_us_section' ) : ?>
                    <?php get_template_part('sections/section', 'contact_us'); ?>
                <?php endif; ?>
                <?php if( get_row_layout() == 'cta_section' ) : ?>
                    <?php get_template_part('sections/section', 'cta'); ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
<?php
get_footer();
