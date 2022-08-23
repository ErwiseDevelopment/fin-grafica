<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

global $wp_query;


get_header(); ?>

<!-- 
    $cat = $wp_query->get_queried_object();
    $category = get_category( $cat->term_id );
    $backgroundColor = get_field( 'cor_de_fundo', $category);
-->
<section id="primary" class="content-area l-categories">

    <div id="main" class="site-main container" role="main">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <?php
                        if ( have_posts() ) : ?>

                            <header class="page-header d-none">
                                <?php
                                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                ?>
                            </header><!-- .page-header -->

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                    * Include the Post-Format-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                    */                                
                                
                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; 
                    ?>
                </div>
                
            </div> 
        </div>
    </div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
