<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="post-inner">
        <div class="entry-content">
            <?php
                the_content( __( 'Continue reading', 'wpt' ) );
            ?>
        </div><!-- .entry-content -->
    </div><!-- .post-inner -->
</article><!-- .post -->
