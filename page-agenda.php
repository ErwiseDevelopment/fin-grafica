<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- page agendas -->
<section class="l-page-agenda mt-4">

    <div class="container">

        <div class="row">

            <div class="col-12">
                <?php
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

                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');

                    $date_current = strftime('%m', strtotime('today'));

                    if ( isset ( $_GET['mes'] ) && !empty ( $_GET['mes'] ) ) {
                        $date_current = $_GET['mes'];
                    }
                ?>
                <div class="row justify-content-between">

                    <div class="col-lg-3">
                        <h3 class="u-font-weight-bold u-color-folk-primary">
                            <?php echo $array_meses[$date_current]; ?>
                        </h3>
                    </div>

                    <div class="col-lg-4 d-flex justify-content-end">
                        <form method="get" action="<?php echo get_home_url( null, 'agenda' ) ?>" id="formulario" name="formulario" class="w-100 form-agenda">
                            <select id="mes" name="mes" class="l-page-agenda__select w-100 select-category w-select">
                                <option value="">Escolha o Mês</option>
                                <?php foreach ($array_meses as $mes => $meses): ?>
                                    <option value="<?php echo $mes; ?>" <?php if ( $mes == $date_current ) { echo 'selected'; } ?>><?php echo $meses; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">

                <div class="row">

                    <!-- loop -->
                    <?php
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
                            $data = get_field('data_custom_post_agenda_inicio', get_the_ID() );
                            $title = get_the_title();
                            $excerpt = get_the_excerpt();
                            $permalink = get_the_permalink();
                            $cidades = get_the_terms( get_the_ID(), 'agendacidade' );
                            list($dia_data, $mes_data, $ano_data) = explode("/", $data);
                            
                            $array_calendarios[] = array ( 
                                'data'    => $current_year.'-'.$mes_data.'-'.$dia_data, 
                                'title'   => $title, 
                                'excerpt' => $excerpt, 
                                'cidades' => $cidades,
                                'link'    => $permalink
                             );
                        endwhile; 
                        
                        wp_reset_postdata();

                        if( !empty( $array_calendarios ) ) :
                            usort( $array_calendarios, 'mantenedora_cmp' );
                            
                            foreach( $array_calendarios as $calendario ) :
                                list($ano_data, $mes_data, $dia_data) = explode("-", $calendario['data']);
                                
                                if( $date_current == $mes_data ) :
                    ?>
                                    <div class="col-lg-4 my-3">

                                        <a 
                                        class="l-page-agenda__card card text-decoration-none pb-4"
                                        href="<?php echo $calendario['link'] ?>">

                                            <div class="card-body">

                                                <h5 class="l-page-agenda__date u-font-weight-bold">
                                                    <!-- 11.02 -->
                                                    <?php echo $dia_data . '.' . $mes_data; ?>
                                                </h5>

                                                <p class="l-page-agenda__post-title u-font-weight-bold">
                                                    <!-- Nome do post -->
                                                    <?php echo $calendario['title']; ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                    <?php       endif; 
				            endforeach; 
			            else : 
				            echo "<div class='col-12'>Não há eventos para os critérios selecionados.</div>";
			            endif; 
                    ?>
                    <!-- end loop -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page agendas -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
