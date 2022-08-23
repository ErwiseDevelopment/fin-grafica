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

<section class="l-template-blogs__banner">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <?php
                    $altTitle = get_the_title();
                    
                    the_post_thumbnail('post-thumbnail', 
                        array(
                            'class' => 'img-fluid w-100',
                            'alt'   => $altTitle,
                    ));
                ?>
            </div>
        </div>
    </div>
</section>

<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-9">

                <div class="row">

                    <div class="col-md-6">
                        <p>
                            Tem alguma dúvida ou sugestão. <br>
                            Entre em contato conosco agora mesmo!
                        </p>
                        
                        <?php the_content() ?>
                    </div>

                    <div class="col-md-5 offset-md-1 mt-5 mt-md-0">

                        <p class="u-font-weight-bold text-uppercase mb-0    ">
                            Endereço:
                        </p>

                        <span class="d-block u-font-size-12">
                            <?php echo get_field( 'endereco', 'option' ) ?>
                        </span>

                        <p class="u-font-weight-bold text-uppercase mb-0">
                            Telefone:
                        </p>

                        <span class="d-block u-font-size-12">
                            <?php echo get_field( 'telefone', 'option' ) ?>
                        </span>

                        <p class="u-font-weight-bold text-uppercase mt-3 mb-0">
                            E-mail:
                        </p>

                        <span class="d-block u-font-size-12">
                            <?php echo get_field( 'e-mail', 'option' ) ?>
                        </span>

                        <hr>

                        <p class="u-font-weight-bold text-uppercase">
                            nossas redes sociais
                        </p>

                        <ul class="l-top__social-media d-flex flex-column justify-content-center mb-0 pl-0">

                            <?php if(get_field( 'instagram', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'instagram', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="l-top__social-media__item u-icon__brands u-icon__instagram position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-white u-bg-folk-primary mr-3"></span>
                                        Instagram
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'facebook', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'facebook', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="l-top__social-media__item u-icon__brands u-icon__facebook position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-white u-bg-folk-primary mr-3"></span>
                                        Facebook
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'youtube', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'youtube', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="l-top__social-media__item u-icon__brands u-icon__youtube position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-white u-bg-folk-primary mr-3"></span>
                                        Youtube
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'whatsapp', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="l-top__social-media__item u-icon__brands u-icon__whatsapp position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-white u-bg-folk-primary mr-3"></span>
                                        Whatsapp
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
