<section class="l-videos my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-10 offset-1 d-flex align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> vídeos
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            Assista aos nossos conteúdos e atualize-se!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">

                <!-- swiper -->
                <div class="swiper-container js-swiper-videos">

                    <div class="swiper-wrapper">

                        <?php if(have_rows( 'videos' )) :
                                while(have_rows( 'videos' )) : the_row(); 
                        ?>
                                    <div class="swiper-slide">

                                        <div class="card w-100 h-100 border-0">

                                            <div class="card-img">
                                                <!-- <iframe 
                                                class="l-videos__card-video"
                                                src="https://www.youtube.com/embed/trSw7lpYqT4" 
                                                title="YouTube video player" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen></iframe> -->
                                                
                                                <?php echo get_sub_field( 'video' ) ?>
                                            </div>

                                            <div class="card-body px-0">
                                                <h6 class="l-videos__card-title u-font-weight-bold text-center text-lg-left">
                                                    <!-- Quem é Dom Bosco em nosso meio? -->
                                                    <?php echo get_sub_field( 'titulo_video' ) ?>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile;
                            endif;
                        ?>

                        <!-- <div class="swiper-slide">

                            <div class="card w-100 h-100 border-0">

                                <div class="card-img">
                                    <iframe 
                                    class="l-videos__card-video"
                                    src="https://www.youtube.com/embed/trSw7lpYqT4" 
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                                </div>

                                <div class="card-body px-0">
                                    <h6 class="l-videos__card-title u-font-weight-bold text-center text-lg-left">
                                        Mensagem do Inspetor 
                                        Salesiano para o 
                                        Aniversário de Dom 
                                        Bosco 2021
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">

                            <div class="card w-100 h-100 border-0">

                                <div class="card-img">
                                    <iframe 
                                    class="l-videos__card-video"
                                    src="https://www.youtube.com/embed/trSw7lpYqT4" 
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                                </div>

                                <div class="card-body px-0">
                                    <h6 class="l-videos__card-title u-font-weight-bold text-center text-lg-left">
                                        10 anos de Ação 
                                        Missionária Juvenil
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">

                            <div class="card w-100 h-100 border-0">

                                <div class="card-img">
                                    <iframe 
                                    class="l-videos__card-video"
                                    src="https://www.youtube.com/embed/trSw7lpYqT4" 
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                                </div>

                                <div class="card-body px-0">
                                    <h6 class="l-videos__card-title u-font-weight-bold text-center text-lg-left">
                                        10 anos de Ação Missionária Juvenil
                                    </h6>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- arrows -->
                <div class="swiper-button-prev swiper-button-prev-videos js-swiper-button-prev-videos"></div>
                <div class="swiper-button-next swiper-button-next-videos js-swiper-button-next-videos"></div>
                <!-- end swiper -->
            </div>
        </div>
    </div>
</section>