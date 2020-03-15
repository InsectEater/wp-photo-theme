<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
wp_body_open();
?>
<div class="wpt-page-banner">

<div class="shadow" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.7); z-index: -1"></div>
<header id="site-header" class=""">

    <?php
            if ( has_nav_menu( 'primary' ) ) {
                ?>
                <nav class="mobile-menu-wrapper" role="navigation">
                    <div class="mobile-menu-button"></div>
                    <ul class="primary-menu">
                        <?php
                        wp_nav_menu(
                            array(
                                'container'  => '',
                                'theme_location' => 'primary',
                            )
                        );
                        ?>
                    </ul>
                </nav><!-- .mobile-menu-wrapper -->

                <?php
            }
    ?>

    <div class="header-bar">
        <div class="header-titles">
            <?php bloginfo( 'name' ); ?>
        </div><!-- .header-titles -->

        <div class="header-navigation-wrapper">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                ?>
                <nav class="primary-menu-wrapper" role="navigation">
                    <ul class="primary-menu">
                        <?php
                            wp_nav_menu(
                                array(
                                    'container'  => '',
                                    'theme_location' => 'primary',
                                )
                            );
                        ?>
                    </ul>
                </nav><!-- .primary-menu-wrapper -->
                <?php
            }
            ?>
        </div>
    </div> <!-- .header-bar -->
</header><!-- #site-header -->

