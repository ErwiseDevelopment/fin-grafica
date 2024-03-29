<section class="l-best-sellers py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <h3 class="u-title u-font-weight-bold text-uppercase all:u-color-folk-theme mb-0">
                    mais <br>
                    <span class="u-title--highlight u-font-weight-black">vendidos</span>
                </h3>
            </div>

            <div class="col-12">

                <!-- swiper -->
                <div class="swiper-container swiper-container-best-sellers js-swiper-best-sellers">

                    <div class="swiper-wrapper">

                        <!-- slide -->
                        <?php
                            $args = array(
                                'posts_per_page' => -1,
                                'post_type'      => 'produtos',
                                'order'          => 'DESC',
                             );

                            $products = new WP_Query( $args );

                            if( $products->have_posts() ) :
                                while( $products->have_posts() ) : $products->the_post();
                        ?>
                                    <div class="swiper-slide align-items-start">

                                        <div class="card border-0">

                                            <div class="l-best-sellers__card-img card-img d-flex justify-content-center align-items-center">
                                  
                                                <!-- swiper -->
                                                <div class="swiper-container js-swiper-product-images">

                                                    <div class="swiper-wrapper">

                                                        <!-- loop -->
                                                        <?php
                                                            if( have_rows( 'imagem_produto' ) ) :
                                                                while( have_rows( 'imagem_produto' ) ) : the_row();
                                                                    if( get_sub_field( 'imagens_produto_todos' ) ) :
                                                        ?>
                                                                        <div class="swiper-slide">
                                                                            <img
                                                                            class="l-best-sellers__product-image img-fluid w-100"
                                                                            src="<?php echo get_sub_field( 'imagens_produto_todos' ) ?>"
                                                                            alt="<?php the_title() ?>">
                                                                        </div>
                                                        <?php       endif;
                                                                endwhile;
                                                            endif;
                                                        ?>
                                                        <!-- end loop -->
                                                    </div>
                                                </div>
                                                <!-- end swiper -->
                                            </div>

                                            <div class="card-body pb-0">

                                                <p class="l-best-sellers__card-title u-font-weight-bold u-color-folk-theme">
                                                    <!-- Embalagem Batata 
                                                    Frita Individual -->

                                                    <?php the_title() ?>
                                                </p>

                                                <span class="l-best-sellers__card-description d-block">
                                                    <?php echo get_field( 'descricao_produto' ) ?>
                                                </span>
                                            </div>

                                            <div class="card-footer border-0 u-bg-folk-none px-0">

                                                <div class="row">

                                                    <div class="col-lg-8">
                                                        <?php 
                                                        
                                                            $categoria = get_the_terms(get_the_ID(), 'produto-categoria');
                                                        ?>
                                                        <a 
                                                        class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-3 px-3" 
                                                        href="<?php echo get_home_url( null, 'solicitar-orcamento/?id=' . get_the_ID()  . '&meta=' .  $categoria[0]->name  );  ?>">
                                                           <?php echo get_field('botao_produtos', 'option') ?>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php   endwhile;
                            endif;
                            
                            wp_reset_query();
                        ?>
                        <!-- end slide -->

                    </div>
                </div>

                <div class="swiper-button-prev swiper-button-prev-partners swiper-button-prev-best-sellers d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-prev-best-sellers"></div>
                <div class="swiper-button-next swiper-button-next-partners swiper-button-next-best-sellers d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-next-best-sellers"></div>
                <!-- end swiper -->
            </div>

            <div class="col-12 d-lg-none mt-4">

                <div class="row">

                    <div class="col-6">
                        <div class="swiper-button-prev swiper-button-prev-partners swiper-button-prev-best-sellers after::u-color-folk-white u-bg-folk-theme js-swiper-button-prev-best-sellers"></div>
                    </div>

                    <div class="col-6">
                        <div class="swiper-button-next swiper-button-next-partners swiper-button-next-best-sellers after::u-color-folk-white u-bg-folk-theme js-swiper-button-next-best-sellers"></div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">

                <div class="row justify-content-center">

                    <div class="col-lg-3 my-3">
                        <a 
                        class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bgi-folk-orange py-3 px-8" 
                        href="<?php echo get_home_url(null, 'portfolio/')?>">
                            Todos os produtos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>