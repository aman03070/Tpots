<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header bg-navy">
    <div class="container header-inner">
        
        <div class="site-logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo-white.png' ); ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>

        <nav class="primary-navigation">
            <?php
            wp_nav_menu( [
                'theme_location' => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'nav-list',
                'fallback_cb'    => false, // Don't show pages if no menu is set
            ] );
            ?>
        </nav>

        <div class="header-cta">
            <a href="#" class="btn-primary trigger-modal">Apply Now</a>
        </div>
        
    </div>
</header>