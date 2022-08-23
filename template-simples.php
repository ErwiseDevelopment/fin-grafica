<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evolutap
 *
 * Template Name: Template Simples
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <?php
                    $alt_title = get_the_title();

                    the_post_thumbnail(
                        'post-thumbnail',
                        array(
                            'class' => 'img-fluid w-100 h-100',
                            'alt'   => $alt_title 
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</section>

<section class="mt-3 pb-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10">

                <?php the_content() ?>
            </div>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
