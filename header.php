<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'sprivaten-theme' ); ?></a>

<div id="wrapper">
    <header id="header" class="bg-white fixed-top">
        <nav class="sprivaten-mega-menu">
            <div class="sprivaten-mega-menu-header">
                <a class="logo-wrap" href="<?php echo esc_url( home_url() ); ?>"
                   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php if ( ! empty( $mega_menu_logo ) ) : ?>
                        <img class="img-fluid" <?php awesome_acf_responsive_image( $mega_menu_logo['ID'], 'full', '230px' ); ?>
                             alt="logo"/>
					<?php
					else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
					endif;
					?>
                </a>
            </div>
            <div class="sprivaten-mega-menu-container">
                <div class="sprivaten-mega-menu-wrap">
                    <?php
                    wp_nav_menu(
                        array(
                            'menu_class'     => 'sprivaten-menu-nav',
                            'container'      => '',
                            'theme_location' => 'main-menu',
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main id="main">
