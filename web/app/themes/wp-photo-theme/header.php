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

<header id="site-header" class=""">
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
</header><!-- #site-header -->

<?php
// Output the menu modal.
get_template_part( 'template-parts/modal-menu' );
