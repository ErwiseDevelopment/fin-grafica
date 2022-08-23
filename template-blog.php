<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evolutap
 *
 * Template Name: Template Blog
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section class="l-template-blogs__banner">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <?php
                    $altTitle = get_the_title();
                    
                    the_post_thumbnail('post-thumbnail', 
                        array(
                            'class' => 'img-fluid w-100',
                            'alt'   => $altTitle,
                    ));
                ?>
            </div>
        </div>
    </div>
</section>

<section class="l-template-blogs u-border-top-2 u-border-color-secondary">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-10 offset-1 d-lg-flex align-items-center mb-5">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> <?php the_title() ?>
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            <!-- Conteúdos de todas as nossas áreas <br>
                            de atuação para você se aprofundar -->
                            <?php the_content() ?>
                        </p>
                    </div>
                </div>

                <div class="row">

                    <!-- loop -->
                    <?php
                            $post_link = get_field( 'link_do_post', 'option' );
                            $categoria = get_field( 'categoria_do_post' );
                            $request_posts = wp_remote_get( $post_link );

                            if(!is_wp_error( $request_posts )) :
                                $body = wp_remote_retrieve_body( $request_posts );
                                $data = json_decode( $body );

                                if(!is_wp_error( $data )) :
                                    foreach( $data as $rest_post ) :
                                        foreach( $rest_post->child_category as $categories ) :    
                                            if( $categories == $categoria->name ) :
                    ?>
                                                <a 
                                                class="col-12 u-border-bottom-1 last-child:u-border-none u-border-color-light-gray u-color-folk-pattern mb-4 pb-4"
                                                href="<?php echo esc_url( $rest_post->link ); ?>">

                                                    <div class="row">

                                                        <div class="col-md-4 mb-3 mb-md-0">
                                                            <!-- <img
                                                            class="img-fluid w-100"
                                                            src="http://portalerwise.test/wp-content/uploads/2022/01/blog-image-1.png"
                                                            alt="Nome do post"> -->

                                                            <img
                                                            class="img-fluid w-100"
                                                            src="<?php echo $rest_post->featured_image_src; ?>"
                                                            alt="<?php echo $rest_post->title->rendered; ?>">

                                                            <!--
                                                                $altTitle = get_the_title();
                                                                
                                                                the_post_thumbnail('post-thumbnail', 
                                                                    array(
                                                                        'class' => 'img-fluid w-100',
                                                                        'alt'   => $altTitle,
                                                                        'order' => 'DESC'
                                                                ));
                                                            -->
                                                        </div>
                                                        
                                                        <div class="col-md-8">

                                                            <h2 class="l-template-blogs__title u-font-weight-bold">
                                                                <!-- Título do conteúdo 01 -->
                                                                <?php echo $rest_post->title->rendered; ?>
                                                            </h2>

                                                            <p class="u-font-size-14 u-font-weight-medium">
                                                                <strong>Em </strong><?php echo $rest_post->post_date; ?>
                                                            </p>

                                                            <p class="u-font-size-14 u-font-weight-medium">
                                                                <?php echo(limit_words($rest_post->post_excerpt, 25)); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                    <?php               endif;
                                    endforeach;
                                endforeach;
                            endif; 
                        endif; 
                    ?>
                    <!-- end loop -->
                </div>
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
