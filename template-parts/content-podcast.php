<section class="l-podcast mb-4">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-7 px-0">
                <img
                class="img-fluid w-100 h-100"
                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/podcast-background.png"
                alt="">
            </div>

            <div class="col-lg-5">
                
                <div class="row justify-content-center justify-content-lg-start">
                    
                    <div class="col-lg-8">
                        
                        <div class="row">

                            <!-- loop -->
                            <?php
                                $args = array(
                                    'posts_per_page' => 3,
                                    'post_type'      => 'podcast',
                                    'order'          => 'DESC'
                                );

                                $podcasts = new WP_Query( $args );

                                if( $podcasts->have_posts() ) :
                                    while( $podcasts->have_posts() ) : $podcasts->the_post();
                            ?>
                                        <div class="col-12">

                                            <div class="d-flex justify-between-center align-items-center">
                                                <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                                    <!-- #06 -->
                                                    <?php echo get_field( 'numero_episodio' ) < 10 ? '#0' . get_field( 'numero_episodio' ) : '#' . get_field( 'numero_episodio' ); ?>
                                                </p>

                                                <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                                    <!-- AMJ: E ela ‘tá’ ‘tá’ 
                                                    movimentando -->
                                                    <?php the_title() ?>
                                                </p>
                                            </div>

                                            <p class="u-font-size-12 u-font-weight-semibold">
                                                <!-- Neste programa, os coordenadores Lucas 
                                                Eduardo Lunardi e Giovana Celli vão conversar 
                                                com os missionários Guilherme Peters, Flaviane 
                                                Mandagará Pereira, Eduarda Testoni Scoz e 
                                                Fabrício Bavarovsku dos Santos. -->
                                                <?php echo get_field( 'descricao_do_episodio' ) ?>
                                            </p>

                                            <a 
                                            class="d-flex justify-content-end align-items-center"
                                            href="<?php echo get_field( 'link_episodio' ) ?>"
                                            target="_blank"
                                            rel="noreferrer noopener">
                                                <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                                    <!-- 02 de agosto <br>
                                                    58 minutos -->
                                                    <?php 
                                                        $data_podcast = get_field( 'data' );
                                                        list($data_day, $data_month) = explode("/", $data_podcast);
                                                        
                                                        echo $data_day . ' de ' . $data_month . '<br>';
                                                    ?>
                                                    
                                                    <?php echo get_field( 'tempo_do_episodio' ) . ' minutos'; ?>
                                                </p>

                                                <img
                                                class="img-fluid"
                                                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                                alt="">
                                            </a>
                                        </div>
                            <?php   endwhile;
                                endif;
                            ?>
                            <!-- end loop -->

                            <!-- <div class="col-12">

                                <div class="d-flex justify-between-center align-items-center">
                                    <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                        #05
                                    </p>

                                    <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                        Ajudar os outros?
                                        Porquê? Para que?
                                    </p>
                                </div>

                                <p class="u-font-size-12 u-font-weight-semibold">
                                    Neste programa, P. Edvaldo Nogueira, referencial 
                                    da PJS no Rio Grande do Sul, e P. Adriano Toiller, 
                                    referencial da PJS no Paraná, conversam com Juan 
                                    Carlos Montenegro, coordenador do "Salesian 
                                    Volunteers" e Irmã Solange Sanches, Filha de Maria 
                                    Auxiliadora. Acompanhe.
                                </p>

                                <a 
                                class="d-flex justify-content-end align-items-center"
                                href="#">
                                    <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                        30 de agosto <br>
                                        62 minutos
                                    </p>

                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                    alt="">
                                </a>
                            </div>

                            <div class="col-12">

                                <div class="d-flex justify-between-center align-items-center">
                                    <p class="l-other-posts__podcast-number u-font-weight-bold u-color-folk-primary mb-0">
                                        #04
                                    </p>

                                    <p class="l-other-posts__podcast-title u-line-height-100 u-font-weight-bold u-color-folk-green mb-0 ml-2">
                                        Missionário...
                                        Eu?
                                    </p>
                                </div>

                                <p class="u-font-size-12 u-font-weight-semibold">
                                    Neste programa, os missionários Ana e Irmão 
                                    Lucas vão conversar sobre o "ser missionário" 
                                    com os convidados da noite: P. Gilson Marcos da 
                                    Silva, Inspetor Salesiano; Gilson Cardoso, Assessor 
                                    e Coordenador de Pastoral e Ane Caroline 
                                    Machado, coordenadora da AMJ.
                                </p>

                                <a class="d-flex justify-content-end align-items-center"
                                href="#">
                                    <p class="u-font-size-12 u-font-weight-bold text-right u-color-folk-primary mb-0 mr-2">
                                        30 de julho <br>
                                        62 minutos
                                    </p>

                                    <img
                                    class="img-fluid"
                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-play.png"
                                    alt="">
                                </a>
                            </div> -->
                        </div>

                        <div class="row">

                            <div class="col-12 d-flex mt-2">
                                <a
                                class="hover:u-opacity-8 u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary py-2 px-4"
                                href="https://open.spotify.com/show/0BJ9E4USipeP3zG9KEEY8b?si=d46cbcd25e854286">
                                    Ver mais
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>