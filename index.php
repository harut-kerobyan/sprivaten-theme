<?php get_header(); ?>
    <div class="container">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <div class="content"><?php the_content(); ?></div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
<?php
get_footer();
