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

<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <img
                class="img-fluid"
                src="<?php echo get_home_url( null, 'wp-content/uploads/2022/02/banner-osj.png') ?>"
                alt="<?php the_title() ?>">
            </div>
        </div>
    </div>
</section>

<section>

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <?php 
                        if( have_rows( 'galeria' ) ) :
                            while( have_rows( 'galeria' ) ) : the_row();
                    ?>
                                <div class="col-3 my-3">
                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_sub_field( 'foto' ) ?>"
                                    alt="">
                                </div>
                    <?php   endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
