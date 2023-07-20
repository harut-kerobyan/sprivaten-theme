<?php
/**
 * Template Name: Home Page
 */

get_header();

the_post();

if (have_rows('components')) {
    while (have_rows('components')) {
        the_row();

        if (!get_sub_field('hide_section')) {
            if (get_row_layout() == 'hero_section') {
                get_template_part('sections/section', 'hero');
            }
            if (get_row_layout() == 'why_choose_us_section') {
                get_template_part('sections/section', 'why_choose_us');
            }
            if (get_row_layout() == 'video_section') {
                get_template_part('sections/section', 'video');
            }
            if (get_row_layout() == 'testimonials_section') {
                get_template_part('sections/section', 'testimonials');
            }
            if (get_row_layout() == 'team_section') {
                get_template_part('sections/section', 'team');
            }
            if (get_row_layout() == 'contact_us_section') {
                get_template_part('sections/section', 'contact_us');
            }
            if (get_row_layout() == 'cta_section') {
                get_template_part('sections/section', 'cta');
            }
        }
    }
}

get_footer();
