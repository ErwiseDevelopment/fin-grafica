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

<section class="l-single-post py-5">

    <div class="container">

        <div class="row">

            <div class="col-12 mb-5 pb-5">
                
                <div class="row">

                    <div class="col-lg-8">
                        
                        <!-- <img
                        class="img-fluid"
                        src="http://www.dombosco.net/wp-content/uploads/2021/12/48897837752_4ec846307d_o-e1639750168139-970x550.jpg"
                        alt="Nome do post"> -->

                        <?php
                            $altTitle = get_the_title();
                            
                            the_post_thumbnail('large', 
                                array(
                                    'class' => 'img-fluid w-100',
                                    'alt'   => $altTitle,
                            ));
                        ?>

                        <h1 class="l-single-post__title u-font-weight-bold my-4">
                            <!-- 5 curiosidades sobre a vida de Dom Bosco -->
                            <?php the_title() ?>
                        </h1>

                        <div class="d-flex justify-content-between pr-4">
                            <p class="u-font-size-14 u-font-weight-medium">
                                <strong>Em: </strong> <?php echo get_the_date( 'd/m/Y', $post->ID ); ?>
                            </p>

                            <p class="u-font-size-14 u-font-weight-medium">
                                <!-- <strong>Por: </strong>Inspetoria São Pio X -->
                                <strong>Por: </strong><?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?>
                            </p>
                            
                            <?php
                                $cats = array();
                                
                                foreach (get_the_category($post_id) as $c) {
                                    $cat = get_category($c);
                                    array_push($cats, $cat->name);
                                }

                                if (sizeOf($cats) > 0) {
                                    $post_categories = implode(', ', $cats);
                                } 
                            ?>

                            <p class="u-font-size-14 u-font-weight-medium">
                                <strong>Categorias: </strong><?php echo $post_categories; ?>
                            </p>
                        </div>

                        <hr>

                        <span class="d-block">
                            <!-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae nibh in ex scelerisque facilisis. Donec interdum eros ac orci tempor consequat. Fusce id consequat libero, a porttitor dui. Nulla imperdiet vitae ligula id tincidunt. Nam in purus placerat, scelerisque justo eget, ornare lectus. Morbi enim turpis, convallis vel elit sed, posuere pulvinar velit. Proin condimentum turpis facilisis eros venenatis, et lacinia magna commodo. Vestibulum ante dolor, laoreet ac mi eget, viverra congue odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam id turpis cursus, tempus urna nec, pulvinar sem. Aenean lobortis dolor vel diam suscipit laoreet. Cras dapibus ligula sit amet elementum porttitor. Suspendisse eget finibus urna, vitae rhoncus felis. Curabitur quis pulvinar felis, non pellentesque lorem. <br>
                            Nam et nisi dictum, luctus mauris at, sodales sapien. Sed iaculis, neque a eleifend efficitur, odio nunc venenatis orci, quis bibendum enim turpis placerat lorem. Vivamus vel augue sit amet turpis consequat facilisis. Mauris sed fermentum diam. Cras placerat porta quam, in tristique leo sollicitudin et. Vivamus sagittis mi sed purus ultricies luctus. Praesent rutrum libero tellus, at egestas leo convallis vel. Proin molestie, leo id feugiat luctus, metus sem facilisis massa, quis pellentesque magna orci vitae nunc. Maecenas quis erat et mi sagittis mollis quis quis elit. <br><br>
                            Duis laoreet lobortis leo, at egestas felis feugiat at. Vivamus porttitor dolor vel justo lobortis iaculis. Sed ut eleifend magna. Aliquam nunc lectus, suscipit nec elit ut, venenatis auctor augue. Sed aliquam laoreet sapien, dignissim feugiat lorem vulputate quis. Morbi convallis commodo luctus. Nam sapien justo, sagittis non mi id, cursus mollis massa. Morbi in euismod odio. Morbi scelerisque eget neque et bibendum. Cras a ex in enim rhoncus consequat. Cras fringilla sagittis pharetra. Suspendisse condimentum posuere nulla non aliquet. Suspendisse vel enim tincidunt, ultricies libero eu, placerat diam. Cras mattis blandit lacus non imperdiet. <br>
                            In dapibus iaculis fringilla. Pellentesque auctor tortor leo, vehicula posuere nulla congue eu. Maecenas a metus lectus. Curabitur cursus sodales arcu eget lacinia. Donec accumsan euismod justo nec auctor. Duis eu metus in elit vestibulum faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sagittis cursus dui vel sollicitudin. Aliquam velit enim, tincidunt sodales erat id, ultrices efficitur felis. Donec viverra vel velit non congue. Sed mauris ligula, mollis at tellus ut, accumsan interdum leo. Nulla elementum ante eu justo feugiat lobortis. Curabitur eget erat et eros mattis fringilla et et libero. Aenean lacinia, eros laoreet porta commodo, diam metus viverra nunc, nec mollis sem lorem sed ipsum. <br><br>
                            Sed at tincidunt ipsum, sit amet viverra orci. Morbi tristique ex at ante sollicitudin sodales. Ut vitae urna nec arcu mollis lobortis ac at quam. Vestibulum tellus sapien, tincidunt eget auctor non, pellentesque a nisi. Morbi euismod, elit ut pellentesque pellentesque, sapien arcu venenatis est, non tincidunt nibh quam eget est. Cras varius velit in sapien viverra, quis consequat libero pellentesque. In hac habitasse platea dictumst. Curabitur hendrerit eros id tincidunt elementum. Nunc nibh eros, pulvinar ut lectus suscipit, elementum consectetur tellus.                         -->

                            <?php the_content() ?>
                        </span>
                    </div>

                    <div class="col-lg-4 pt-3">
                        
                        <div class="row">

                            <div class="col-12">
                                <p class="l-single-post__subtitle u-font-weight-bold">
                                    Buscar
                                </p>

                                <form 
                                role="search" 
                                method="get" 
                                action="<?php echo get_home_url( null, '/' ) ?>">

                                    <div class="row">

                                        <div class="col-10">

                                            <input
                                            class="c-input__search w-100 u-font-size u-font-weight-medium py-1 px-2"
                                            type="search"
                                            name="s"
                                            value=""
                                            placeholder="Pesquisar ...">
                                        </div>

                                        <div class="col-2 d-flex align-items-center px-0">

                                            <span class="u-icon u-icon__free u-icon__search u-font-size-0 before::u-font-size-20 u-font-weight-semibold u-cursor-pointer js-icon-search">
                                                Pesquisar
                                            </span>

                                            <input 
                                            class="d-none js-input-search"
                                            type="submit"
                                            value="Pesquisar">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 mt-4">

                                <p class="l-single-post__subtitle u-font-weight-bold">
                                    Posts Recentes
                                </p>

                                <div class="row">

                                    <!-- loop -->
                                    <?php
                                        $postCurrentID = $post->ID;

                                        $args = array(
                                            'posts_per_page' => 5,
                                            'post_type'      => 'post',
                                        );

                                        $posts_recent = new WP_Query( $args );
                                        
                                        if( $posts_recent->have_posts() ) : 
                                            while( $posts_recent->have_posts() ): $posts_recent->the_post();
                                                if($postCurrentID != get_the_id()) : 
                                    ?>

                                                    <div class="col-12 u-border-bottom-1 last-child:u-border-none u-border-color-light-gray mb-3 pb-3">

                                                        <div class="row">

                                                            <div class="col-4">
                                                                <!-- <img
                                                                class="img-fluid"
                                                                src="http://www.dombosco.net/wp-content/uploads/2021/12/IMG_2236-150x150.jpg"
                                                                alt="Nome do post">  -->
                                                                
                                                                <?php
                                                                    $altTitle = get_the_title();
                                                                    
                                                                    the_post_thumbnail('post-thumbnail', 
                                                                        array(
                                                                            'class' => 'img-fluid',
                                                                            'alt'   => $altTitle,
                                                                    ));
                                                                ?>
                                                            </div>

                                                            <div class="col-8">
                                                                <a
                                                                class="u-font-size-14 u-font-weight-bold text-uppercase u-color-folk-black"
                                                                href="#">
                                                                    <!-- 5 curiosidades sobre a vida de Dom Bosco -->
                                                                    <?php the_title() ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                    <?php       endif;
                                            endwhile; 
                                        endif;

                                        wp_reset_query();
                                    ?>

                                    <!-- <div class="col-12 my-3">

                                        <div class="row">

                                            <div class="col-4">
                                                <img
                                                class="img-fluid"
                                                src="http://www.dombosco.net/wp-content/uploads/2021/12/IMG_2236-150x150.jpg"
                                                alt="Nome do post">                                            
                                            </div>

                                            <div class="col-8">
                                                <a
                                                class="u-font-size u-font-weight-bold text-uppercase u-color-folk-black"
                                                href="#">
                                                    5 curiosidades sobre a vida de Dom Bosco
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 my-3">

                                        <div class="row">

                                            <div class="col-4">
                                                <img
                                                class="img-fluid"
                                                src="http://www.dombosco.net/wp-content/uploads/2021/12/IMG_2236-150x150.jpg"
                                                alt="Nome do post">                                            
                                            </div>

                                            <div class="col-8">
                                                <a
                                                class="u-font-size u-font-weight-bold text-uppercase u-color-folk-black"
                                                href="#">
                                                    5 curiosidades sobre a vida de Dom Bosco
                                                </a>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- loop -->
                                </div>
                            </div>
                        </div>
                    </div>
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
