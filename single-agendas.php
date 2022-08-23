<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<section class="l-single-agenda__banner d-flex justify-content-center align-items-center">

    <div class="container">
        
        <div class="row">

            <div class="col-12">

                <h2 class="text-center u-color-folk-white">
                    <?php the_title() ?>
                </h2>
            </div>
        </div>
    </div>
</section>

<section class="l-single-agenda mt-4 pb-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <h3 class="u-font-weight-bold text-uppercase u-color-folk-primary">
                    informações
                </h3>
            </div>

            <div class="col-md-8">
                
                <p>
                    <strong class="text-uppercase">Horário:</strong> <?php echo get_field( 'txt_horario_custom_post_agenda_inicio' ); ?>
                </p>

                <p>
                    <strong class="text-uppercase">Data:</strong> <?php echo get_field( 'data_custom_post_agenda_inicio' ) . ' (' . get_field( 'txt_dia_semana_custom_post_agenda' ) . ')'; ?>
                </p>

                <p>
                    <strong class="text-uppercase">Local:</strong> <?php echo get_field( 'txt_local_custom_post_agenda' ) ?>
                </p>

                <p>
                    <strong class="text-uppercase">Observações</strong>
                </p>

                <span class="d-block">
                    <?php echo get_field( 'txt_observacoes_custom_post_agenda' ) ?>
                </span>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
