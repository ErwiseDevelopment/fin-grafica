<section class="l-show-products py-5">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <!-- swiper -->
                <div class="swiper-container swiper-container-show-products js-swiper-show-products">

                    <div class="swiper-wrapper">

                        <!-- slide -->
                        <?php
                            if( have_rows( 'produtos' ) ) :
                                while( have_rows( 'produtos' ) ) : the_row();
                        ?>
                                    <div class="swiper-slide">
                                        <img
                                        class="img-fluid w-100 h-100"
                                        src="<?php echo get_sub_field( 'produto_imagem' ) ?>"
                                        alt="<?php the_title() ?>">
                                    </div>
                        <?php   endwhile;
                            endif;
                        ?>
                        <!-- end slide -->

                        <!-- <div class="swiper-slide">
                            <img
                            class="img-fluid w-100 h-100"
                            src="http://grafica.test/wp-content/uploads/2022/03/show-product-image-1.png"
                            alt="">
                        </div>

                        <div class="swiper-slide">
                            <img
                            class="img-fluid w-100 h-100"
                            src="http://grafica.test/wp-content/uploads/2022/03/show-product-image-1.png"
                            alt="">
                        </div>

                        <div class="swiper-slide">
                            <img
                            class="img-fluid w-100 h-100"
                            src="http://grafica.test/wp-content/uploads/2022/03/show-product-image-1.png"
                            alt="">
                        </div>

                        <div class="swiper-slide">
                            <img
                            class="img-fluid w-100 h-100"
                            src="http://grafica.test/wp-content/uploads/2022/03/show-product-image-1.png"
                            alt="">
                        </div> -->
                    </div>
                </div>

                <div class="swiper-button-prev swiper-button-prev-partners swiper-button-prev-show-products d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-prev-show-products"></div>
                <div class="swiper-button-next swiper-button-next-partners swiper-button-next-show-products d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-next-show-products"></div>
                <!-- end swiper -->
            </div>

            <div class="col-12 d-lg-none mt-5">

                <div class="row">

                    <div class="col-6">
                        <div class="swiper-button-prev swiper-button-prev-partners swiper-button-prev-best-sellers after::u-color-folk-white u-bg-folk-theme js-swiper-button-prev-show-products"></div>
                    </div>

                    <div class="col-6">
                        <div class="swiper-button-next swiper-button-next-partners swiper-button-next-best-sellers after::u-color-folk-white u-bg-folk-theme js-swiper-button-next-show-products"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>