<?php get_header() ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h1><?php the_title(); ?></h1>
        <div class="content"><?php the_content(); ?></div>
    </div>

<?php get_footer() ?>