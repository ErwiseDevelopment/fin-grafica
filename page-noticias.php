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

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<?php
    if( isset( $_GET[ 'cat' ] ) ) {
        $category_id = $_GET[ 'cat' ]; 
        $category_current = get_category( $category_id );
    }
?>

<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <img
                class="img-fluid"
                src="<?php echo get_field( 'imagem_de_fundo', $category_current )?>"
                alt="<?php echo $category_current->name; ?>">
            </div>
        </div>
    </div>
</section>

<section class="l-page-news mt-4 mb-5 pb-5">

    <div class="container">

        <div class="row">

            <!-- highlight -->
            <?php
                if( isset( $category_id )) {
                    $category_highlight = get_category( $category_id );
                    $category_slug = $category_highlight->slug;
                    $category_slug_highlight = $category_slug . '-destaque';
                }
                 
                $editorias = array(
                    'Portal',
                    'Institucional',
                    'Paróquia',
                    'Ensino',
                    'Pastoral Juvenil',
                    'Vocacional',
                    'Obras Sociais',
                    'Gráfica'
                );

                $args = array(
                    'posts_per_page' => 1,
                    'post_type'      => 'post',
                    'category_name'  => $category_slug_highlight,
                    'order'          => 'DESC'
                );

                $post_highlight = new WP_Query( $args );
                $cats = array();
                
                if( $post_highlight->have_posts() ) :
                    while( $post_highlight->have_posts() ) : $post_highlight->the_post();
                        $post_highlight_id = get_the_ID();

                        foreach (get_the_category($post_id) as $c) {
                            $cat = get_category($c);
                            array_push($cats, $cat);
                            
                        }

                        foreach($cats as $catt) {
                            foreach( $editorias as $editoria) {
                                if( $catt->name == $editoria) {
                                    $backgroundColor = get_field( 'cor_de_fundo', $catt );
                                }
                            }
                        } 
            ?>
                                    <div class="col-12">

                                        <div 
                                        class="l-page-news__box p-3"
                                        style="background-color:<?php echo $backgroundColor; ?>">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <?php
                                                        $altTitle = get_the_title();
                                                        
                                                        the_post_thumbnail('post-thumbnail', 
                                                            array(
                                                                'class' => 'img-fluid w-100 h-100',
                                                                'alt'   => $altTitle,
                                                        ));
                                                    ?>

                                                    <div class="row justify-content-center">
                                                        <span 
                                                        class="l-page-news__highlight u-font-weight-bold u-color-folk-white mt-n3 mt-sm-n5 py-2 px-5"
                                                        style="background-color:<?php echo $backgroundColor; ?>">
                                                            // Destaque
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 d-flex flex-column justify-content-center">

                                                    <h6 class="l-news__highlight__card-title u-line-height-100 u-font-weight-extrabold u-color-folk-white mt-2">
                                                        <?php the_title() ?>
                                                    </h6>

                                                    <p class="l-news__highlight__card-info u-line-height-100 mt-3">
                                                        <span class="u-font-weight-semibold u-color-folk-white">
                                                            por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?>
                                                        </span> <br>

                                                        <span class="u-font-weight-bold u-color-folk-white">
                                                            em <?php echo get_the_date( 'd/m/Y', $post_highlight->ID ) ?>
                                                        </span>
                                                    </p>

                                                    <span class="l-news__highlight__card-excerpt d-block u-font-weight-semibold u-color-folk-white">
                                                        <?php echo(limit_words(get_the_excerpt(), 25)); ?>
                                                    </span>

                                                    <div class="row">

                                                        <div class="col-lg-6 mt-3">
                                                            <a 
                                                            class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-3 px-5" 
                                                            href="<?php the_permalink() ?>">
                                                                Ler mais
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            <?php endwhile;
                endif;

                wp_reset_query();
            ?>
            <!-- end highlight -->

            <!-- other posts -->
            <div class="col-12 my-5 pb-5">

                <div class="row">

                    <div class="col-md-9">

                        <div class="row">

                            <?php
                                $args = array(
                                    'posts_per_page' => -1,
                                    'post_type'      => 'post',
                                    'cat'            => $category_id,
                                    'order'          => 'DESC'
                                );
                
                                $other_posts = new WP_Query( $args );
                                
                                if( $other_posts->have_posts() ) :
                                    while( $other_posts->have_posts() ) : $other_posts->the_post();
                                        if( get_the_ID() != $post_highlight_id ) :
                            ?>
                                            <div class="col-md-6 col-lg-4 my-3">

                                                <div class="card h-100 border-0">

                                                    <div class="card-img">
                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body d-flex flex-column justify-content-between pt-2 px-0">

                                                        <div>
                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                <?php the_title() ?>
                                                            </h6>

                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                <span class="u-font-weight-semibold">
                                                                    por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?>
                                                                </span> <br>
                                                                
                                                                <span class="u-font-weight-bold">
                                                                    em <?php echo get_the_date( 'd/m/Y', $other_posts->ID ) ?>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-10">
                                                                <a
                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                href="<?php the_permalink() ?>"
                                                                style="background-color:<?php echo $backgroundColor; ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            <?php        endif;
                                    endwhile;
                                endif;

                                wp_reset_query();
                            ?>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <a href="<?php echo get_field( 'link_ilustrativa' )?>">
                            <img
                            class="img-fluid sticky-top pt-3"
                            src="<?php echo get_field( 'imagem_ilustrativa' ) ?>"
                            alt="<?php the_title() ?>">
                        </a>                        
                    </div>
                </div>
            </div>
            <!-- end other posts -->
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
