<section class="l-mvv mb-5">
    
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <!--
                    $altTitle = get_the_title();
                    the_post_thumbnail('post-thumbnail', 
                        array('class' => 'img-fluid',
                                'alt'   => $altTitle,
                        ));
                -->

                <img
                class="img-fluid"
                src="<?php echo get_field( 'imagem_destacada_meio' ) ?>"
                alt="Meio">
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            
            <div class="col-12 mt-5 mt-lg-n4">

                <div class="row justify-content-center">
                    
                    <?php if( have_rows( 'sobre_meio' ) ) : 
                            while( have_rows( 'sobre_meio' ) ) : the_row();
                    ?>
                                <div class="col-12 l-mvv__col-child my-3 my-md-0">

                                    <div class="row">

                                        <div class="col-md-6 l-mvv__item-child">
                                            <img
                                            class="img-fluid w-100"
                                            src="<?php echo get_sub_field( 'imagem_meio' ) ?>"
                                            alt="<?php echo get_sub_field( 'titulo_meio' ) ?>"
                                            data-aos="zoom-in"
                                            data-aos-duration="600">
                                        </div>

                                        <div class="col-md-6 l-mvv__item-child d-flex flex-column justify-content-center mt-3 mt-md-0">
                                            <h5 class="l-mvv__title u-font-weight-black text-uppercase">
                                                <span class="l-mvv__title-child">//</span>
                                                <span class="l-mvv__title-child"><?php echo get_sub_field( 'titulo_meio' ) ?></span>
                                            </h5>

                                            <span class="l-mvv__text d-block u-font-weight-semibold mb-0 pl-md-4">
                                                <?php echo get_sub_field( 'descricao_meio' ) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                    <?php   endwhile; 
                        endif;
                    ?>
                </div>

                <div class="row justify-content-center">

                    <div class="col-md-3 mt-5">
                        <a 
                        class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-2 px-5" 
                        href="<?php echo get_field( 'saiba_mais_meio' ) ?>">
                            Saiba mais!
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>