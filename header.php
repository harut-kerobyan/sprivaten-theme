<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'sprivaten-theme'); ?></a>

<div id="wrapper">
    <header id="header">
        <nav class="sprivaten-nav">
            <div class="sprivaten-brand">
                <a class="logo-wrap" href="<?php echo esc_url(home_url()); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <?php if (!empty(get_field('logo', 'option'))) : ?>
                        <img <?php awesome_acf_responsive_image(get_field('logo', 'option')['ID'], 'full', '187px'); ?>
                                alt="logo"/>
                    <?php
                    else :
                        echo esc_attr(get_bloginfo('name', 'display'));
                    endif;
                    ?>
                </a>
            </div>
            <div class="sprivaten-menu-wrap">
                <?php
                wp_nav_menu(
                    array(
                        'menu_class' => 'sprivaten-menu-nav',
                        'container' => '',
                        'theme_location' => 'main-menu',
                    )
                );
                ?>
            </div>
        </nav>
    </header>

    <main id="main">
