<section class="l-calendar my-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-6 offset-1 mb-3">
                        <h3 class="c-title l-most-read__title-line position-relative u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Calendário
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-6">

                        <!-- swiper -->
                        <?php
                            $array_months = array (
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

                            $count = -1;
                        ?>

                        <div class="swiper-container js-swiper-month">

                            <div class="swiper-wrapper">

                                <?php foreach( $array_months as $month => $months ) : 
                                        $count++;
                                ?>
                                        <div 
                                        class="swiper-slide js-swiper-months" 
                                        data-month="<?php echo $months; ?>"
                                        data-count="<?php echo $count; ?>"
                                        data-monthnumeric="<?php echo $month; ?>">

                                            <h6 class="l-calendar__date u-font-weight-black text-center text-uppercase u-color-folk-primary">
                                                <!-- Agosto // 2021 -->
                                                <?php echo $months . ' //'; ?>
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

            <div class="col-12 mt-4" id="calendario">

                <!-- swiper -->
                <?php
                    // $array_months = array (
                    //     '01' => 'Janeiro',
                    //     '02' => 'Fevereiro',
                    //     '03' => 'Março',
                    //     '04' => 'Abril',
                    //     '05' => 'Maio',
                    //     '06' => 'Junho',
                    //     '07' => 'Julho',
                    //     '08' => 'Agosto',
                    //     '09' => 'Setembro',
                    //     '10' => 'Outubro',
                    //     '11' => 'Novembro',
                    //     '12' => 'Dezembro'
                    // );

                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    
                    $date_current = strftime('%m', strtotime('today'));
                    
                    // if ( isset ( $_GET['mes'] ) && !empty ( $_GET['mes'] ) ) {
                    //     $date_current = $_GET['mes'];
                    // }

                    $current_year = strftime('%Y', strtotime('today'));
                    $data_start = date('Y'.$date_current.'01');
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
                                'value'			=> $data_start,
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

                    $agendas = new WP_Query( $args );   

                    while( $agendas->have_posts() ) : $agendas->the_post();
                        $data_start = get_field( 'data_custom_post_agenda_inicio', get_the_ID() );
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        $cidades = get_the_terms( get_the_ID(), 'agendacidade');
                        
                        list($data_day, $data_month, $data_year) = explode("/", $data_start);
                        
                        $array_agendas[] = array ( 
                            'data'    => $current_year.'-'.$data_month.'-'.$data_day, 
                            'title'   => $title, 
                            'excerpt' => $excerpt, 
                            'cidades' => $cidades 
                        );
                    endwhile;
                        
                    wp_reset_postdata();

                    if ( !empty ( $array_agendas ) ) :
                        usort ( $array_agendas, 'mantenedora_cmp' );
                ?>
                        <div class="swiper-container swiper-container-day js-swiper-day">

                            <div class="swiper-wrapper">

                                <!-- foreach( $array_months as $month => $months ) : -->
                                    <div class="swiper-slide flex-wrap">

                                        <div class="col-md-6 my-3 my-md-0">

                                            <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                                destaques:
                                            </h6>

                                            <!-- loop -->
                                            <?php foreach ( $array_agendas as $agenda ) :
                                                    list($data_year, $data_month, $data_day) = explode("-", $agenda['data']); 
                                                    if ( $date_current == $data_month ) :
                                            ?>
                                                        <div class="my-2">
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
                                                    endif;
                                                endforeach; 
                                            ?>
                                            <!-- end loop -->

                                            <!-- <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 07
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Coordenação AMJ-Paraná (virtual)
                                                </p>
                                            </div>

                                            <div class="my-2"> 
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 08-21
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Encontro formativo para Diretores Salesianos 
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 13-15
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Congresso Virtual Continental de Vida Religiosa
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 14
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Romaria da Família Salesiana - Aparecida/SP | Assembleia 
                                                    Inspetorial dos Ex-Alunos
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 24
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Comissão Nacional das Paróquias (virtual)
                                                </p>
                                            </div> -->
                                        </div>

                                        <div class="col-md-6">
                                            
                                            <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                                comemorações e memória:
                                            </h6>

                                            <!-- loop -->
                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 14
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Nascimento | P. Ivo Poffo (1940)
                                                </p>
                                            </div>
                                            <!-- end loop -->

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 21
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Nascimento | P. Lino Satler (1925)
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 23
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Nascimento | P. Severino Piccinini (1940)
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 28
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Nascimento | P. Gilson Marcos da Silva (1975)
                                                </p>
                                            </div>

                                            <div class="my-2">
                                                <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                    // 29
                                                </p>

                                                <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                    Nascimento | P. Edvaldo Nogueira da Silva (1983)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <!-- endforeach; -->
                                
                                <!-- <div class="swiper-slide flex-wrap">

                                    <div class="col-md-6 my-3 my-md-0">

                                        <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                            destaques:
                                        </h6>

                                        loop
                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 02-03
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Conselho Inspetorial – Porto Alegre/RS
                                            </p>
                                        </div>
                                        end loop

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 07
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Coordenação AMJ-Paraná (virtual)
                                            </p>
                                        </div>

                                        <div class="my-2"> 
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 08-21
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Encontro formativo para Diretores Salesianos 
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 13-15
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Congresso Virtual Continental de Vida Religiosa
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 14
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Romaria da Família Salesiana - Aparecida/SP | Assembleia 
                                                Inspetorial dos Ex-Alunos
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 24
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Comissão Nacional das Paróquias (virtual)
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my-3 my-md-0">
                                        
                                        <h6 class="l-calendar__title u-font-weight-black text-uppercase u-color-folk-primary">
                                            comemorações e memória:
                                        </h6>

                                        loop
                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 14
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Nascimento | P. Ivo Poffo (1940)
                                            </p>
                                        </div>
                                        end loop

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 21
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Nascimento | P. Lino Satler (1925)
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 23
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Nascimento | P. Severino Piccinini (1940)
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 28
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Nascimento | P. Gilson Marcos da Silva (1975)
                                            </p>
                                        </div>

                                        <div class="my-2">
                                            <p class="l-calendar__text u-font-weight-extrabold u-color-folk-primary mb-0">
                                                // 29
                                            </p>

                                            <p class="l-calendar__text u-font-weight-semibold mb-0">
                                                Nascimento | P. Edvaldo Nogueira da Silva (1983)
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                <?php endif; ?>
                <!-- end swiper -->
            </div>

            <div class="col-12 mb-5 my-md-5">

                <div class="row">

                    <div class="col-md-6">
                        <a
                        class="l-calendar__btn hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary mb-3 mb-md-0 py-3 px-4"
                        href="#"
                        data-aos="zoom-in">
                            Todos os eventos
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a
                        class="l-calendar__btn hover:u-opacity-8 d-block d-md-inline-block u-font-weight-bold text-decoration-none u-color-folk-white u-bg-folk-secondary mt-3 mt-md-0 py-3 px-4"
                        href="#"
                        data-aos="zoom-in">
                            Calendário completo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
  var variaveljs = 'Eu sou uma variável JavaScript.';
 </script>

<?php
   $variavelphp = "<script>document.write(variaveljs)</script>";
   echo 'teste: ' . $variavelphp;
?>