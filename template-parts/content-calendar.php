<section class="l-calendar u-border-top-2 u-border-color-primary my-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-primary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> próximos eventos:
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-6">

                        <!-- swiper -->
                        <?php
                            $year_current = date( "Y" );

                            $array_meses = array (
                                '01' => 'Janeiro',
                                '02' => 'Fevereiro',
                                '03' => 'Março',
                                '04' => 'Abril',
                                '05' => 'Maio',
                                '06' => 'Junho',
                                '07' => 'Julho',
                                '08' => 'Agosto',
                                '09' => 'Setembro',
                                '10' => 'Outubro',
                                '11' => 'Novembro',
                                '12' => 'Dezembro'
                            );
                            
                        ?>
                        <div class="swiper-container js-swiper-month">

                            <div class="swiper-wrapper">

                                <?php foreach ($array_meses as $mes => $meses): ?>
                                    <div class="swiper-slide">

                                        <h6 class="l-calendar__date u-font-weight-black text-center text-uppercase u-color-folk-green">
                                            <!-- Agosto // 2021 -->
                                            <?php echo $meses . ' // ' . $year_current; ?>
                                        </h6>
                                    </div>
                                <?php endforeach; ?>                                

                                <!-- <div class="swiper-slide">

                                    <h6 class="l-calendar__date u-font-weight-black text-center text-uppercase u-color-folk-primary">
                                        Setembro // 2021
                                    </h6>
                                </div> -->
                            </div>
                        </div>
                        <!-- end swiper -->

                        <!-- arrow -->
                        <div class="swiper-button-prev swiper-button-prev-calendar js-swiper-button-prev-calendar js-swiper-find-month-active"></div>
                        <div class="swiper-button-next swiper-button-next-calendar js-swiper-button-next-calendar js-swiper-find-month-active"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">

                <!-- swiper -->
                <div class="swiper-container swiper-container-day js-swiper-day">

                    <div class="swiper-wrapper">
                        
                        <?php 
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                                
                            $post_agenda_count = wp_count_posts( 'agendas' );
                            $post_agenda_count_current = intval( $post_agenda_count->publish );
                            $count = -1;

                            foreach ($array_meses as $mes => $meses): 
                                $date_current = $mes;
                                $current_year = strftime('%Y', strtotime('today'));
                                $data_inicio = date('Y'.$date_current.'01');
                                $data_final = date('Y'.$date_current.'31');

                                $args = array (
                                    'post_type'       	=> 'agendas',
                                    'posts_per_page'	=> -1,
                                    'orderby'			=> 'meta_value',
                                    'order'				=> 'ASC',
                                    'meta_key'          => 'data_custom_post_agenda_inicio',
                                    'meta_query'		=> array (
                                        'relation'			=> 'AND',
                                        array (
                                            'key'			=> 'data_custom_post_agenda_inicio',
                                            'value'			=> $data_inicio,
                                            'compare'		=> '>=',
                                            'type'			=> 'DATE',
                                        ),
                                        array (
                                            'key'			=> 'data_custom_post_agenda_inicio',
                                            'value'			=> $data_final,
                                            'compare'		=> '<=',
                                            'type'			=> 'DATE',
                                        ),
                                    ),
                                );
                                
                                $agendas = new WP_Query($args);
                                
				                while( $agendas->have_posts()) : $agendas->the_post();
                                    $data = get_field( 'data_custom_post_agenda_inicio', get_the_ID() );
				                    $title = get_the_title();
				                    $excerpt = get_the_excerpt();
				                    $cidades = get_the_terms(get_the_ID(), 'agendacidade');
				                    list($data_day, $data_month, $data_year) = explode("/", $data);
				                    $array_agendas[] = array ( 'data' => $current_year.'-'.$data_month.'-'.$data_day, 'title' => $title, 'excerpt' => $excerpt, 'cidades' => $cidades );
                                endwhile; 
                                
                                wp_reset_postdata();

                                if ( !empty ( $array_agendas ) ) :
                                    usort ( $array_agendas, 'mantenedora_cmp' );
                        ?>
                                    <div class="swiper-slide">

                                        <div class="col my-3 my-md-0">

                                            <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-green">
                                                destaques:
                                            </h6>

                                            <div class="col-12 d-flex flex-wrap pl-0">
                                                <!-- loop -->
                                                <?php 
                                                    foreach ( $array_agendas as $agenda ) :
                                                        list($data_year, $data_month, $data_day) = explode("-", $agenda['data']);

                                                        if ( $date_current == $data_month ) : 
                                                            $count = 0;
                                                ?>
                                                            <div class="col-lg-6 my-2 pl-0">
                                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                                    <!-- // 02-03 -->
                                                                    // <?php echo $data_day . '-' . $data_month; ?>
                                                                </p>

                                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                                    <!-- Conselho Inspetorial – Porto Alegre/RS -->
                                                                    <?php echo $agenda["title"]; ?>
                                                                </p>
                                                            </div>     
                                                <?php 
                                                        else : $count++; 
                                                            if( $count == $post_agenda_count_current ) {
                                                                $count = 0;
                                                                echo '<p>Não há eventos!</p>';
                                                            }
                                                ?>
                                                <?php   endif;
                                                    endforeach; 
                                                ?>
                                                <!-- end loop -->
                                            </div>
                                        </div>
                                    </div>
                        <?php   else : ?>
                                    <div class="swiper-slide justify-content-start">
                                        <p>
                                            Não tem nenhum evento!
                                        </p>
                                    </div>        
                        <?php   endif;
                            endforeach; 
                        ?>
                    </div>
                </div>
                <!-- end swiper -->
            </div>

            <div class="col-12 mb-5 my-md-5">

                <div class="row justify-content-center">

                    <div class="col-md-6 d-flex justify-content-center">
                        <a
                        class="l-calendar__btn hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-green mb-3 mb-md-0 py-3 px-4"
                        href="<?php echo get_home_url( null, 'agenda' ) ?>"
                        data-aos="zoom-in">
                            Calendário completo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>