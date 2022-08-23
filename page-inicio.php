<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary">
<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- banner -->
<?php echo get_template_part( 'template-parts/content', 'banner' ) ?>
<!-- end banner -->

<!-- product categories -->
<?php echo get_template_part( 'template-parts/content', 'product-categories' ) ?>
<!-- end product categories -->

<!-- best sellers -->
<?php echo get_template_part( 'template-parts/content', 'best-sellers' ) ?>
<!-- end best sellers -->

<!-- show products -->
<?php echo get_template_part( 'template-parts/content', 'show-products' ) ?>
<!-- end show products -->

<!-- testimonials -->
<?php echo get_template_part( 'template-parts/content', 'testimonials' ) ?>
<!-- end testimonials -->

<!-- form contact -->
<?php echo get_template_part( 'template-parts/content', 'form-contact' ) ?>
<!-- end form contact -->

<img
class="img-fluid d-none"
data-src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/image.png"
alt="">

<?php endwhile; ?>

</main><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
