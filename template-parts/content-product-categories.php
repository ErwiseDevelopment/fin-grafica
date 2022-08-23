<section class="l-product-categories py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-6 pr-lg-0">

                        <!-- <img
                        class="img-fluid w-100 h-100"
                        src="http://grafica.test/wp-content/uploads/2022/03/product-categories-image.png"
                        alt=""> -->

                        <img
                        class="img-fluid w-100 h-100"
                        src="<?php echo get_field( 'imagem_como_podemos_ajudar' ) ?>"
                        alt="<?php the_title() ?>">
                    </div>

                    <div class="col-lg-5 mt-3 mt-lg-0">

                        <div class="row justify-content-center">
                            
                            <div class="col-12">

                                <h3 class="u-title u-font-weight-bold text-uppercase all:u-color-folk-theme mb-0">
                                    como podemos <br>
                                    <span class="u-title--highlight u-font-weight-black">ajudar?</span>
                                </h3>
                            </div>

                            <!-- loop -->
                            <?php
                                if( have_rows( 'categorias_como_podemos_ajudar' ) ) :
                                    while( have_rows( 'categorias_como_podemos_ajudar' ) ) : the_row();
                            ?>
                                        <div class="col-6 my-1">

                                            <a 
                                            class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                            href="<?php echo get_sub_field( 'link' ) ?>">
                                                <!-- // Folhetos -->
                                                // <?php echo get_sub_field( 'categoria' ) ?>
                                            </a>
                                        </div>
                            <?php   endwhile;
                                endif;
                            ?>
                            <!-- end loop -->

                            <!-- <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div>

                            <div class="col-6 my-1">

                                <a 
                                class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white py-2"
                                href="#">
                                    // Folhetos
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>