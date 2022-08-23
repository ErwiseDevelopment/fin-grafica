<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<section class="l-single-agenda__banner d-flex justify-content-center align-items-center">

    <div class="container">
        
        <div class="row">

            <div class="col-12">

                <h2 class="text-center u-color-folk-white">
                    <?php the_title() ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="l-single-agenda mt-4 pb-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8">

                <?php
                    $altTitle = get_the_title();
                    
                    the_post_thumbnail('post-thumbnail', 
                        array(
                            'class' => 'img-fluid w-100 h-100',
                            'alt'   => $altTitle,
                    ));
                ?>
            </div>

            <div class="col-md-10 col-lg-8 mt-3">
                
                <p>
                    <strong>Data:</strong> <?php echo get_field( 'data_inicio_custom_post_calendario' ) ?>
                </p>

                <span class="d-block">
                    <?php echo get_field( 'descricao_data_especial' ) ?>
                </span>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
