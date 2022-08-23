<section class="l-links u-border-top-2 u-border-color-primary pb-3">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                    
                    <div class="col-10 offset-1 mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-primary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Parceiros
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center mt-4">

                <!-- swiper -->
                <div class="swiper-container js-swiper-partners">

                    <div class="swiper-wrapper">

                        <?php 
                            if(have_rows( 'parceiros', 'option' )) : 
                                while(have_rows( 'parceiros', 'option' )) : the_row();
                        ?>
                                    <div class="swiper-slide">
                                        <a 
                                        href="<?php echo get_sub_field( 'link_logo_parceiros' ) ?>"
                                        target="_blank"
                                        rel="noreferrer noopener">
                                            <img
                                            class="img-fluid"
                                            src="<?php echo get_sub_field( 'logo_parceiros' ) ?>"
                                            alt="<?php the_title() ?>">
                                        </a>
                                    </div>
                        <?php endwhile;
                            endif;
                        ?>
                    </div>
                </div>

                <div class="swiper-button-prev swiper-button-prev-partners js-swiper-button-prev-partners"></div>
                <div class="swiper-button-next swiper-button-next-partners js-swiper-button-next-partners"></div>
                <!-- end swiper -->
            </div>
        </div>
    </div>
</section>