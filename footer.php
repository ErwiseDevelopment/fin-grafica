<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
  
    <?php get_template_part( 'footer-widget' ); ?>
    
    <!-- <footer id="colophon" class="site-footer <php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
        <div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <php echo date('Y'); ?> <php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="WordPress Technical Support" alt="Bootstrap WordPress Theme"><php echo esc_html__('Bootstrap WordPress Theme','wp-bootstrap-starter'); ?></a>

            </div>
        </div>
    </footer> #colophon -->

    <!-- loader -->
    <!-- echo get_template_part( 'template-parts/content', 'loader' ); -->
    <!-- end loader -->

    <!-- cart -->
    <?php echo get_template_part( 'template-parts/content', 'cart' ); ?>
    <!-- end cart -->

    <div class="l-btn-up d-none d-lg-flex u-bg-folk-theme js-btn-up">
        <span class="u-icon__free u-icon__up u-font-weight-bold u-color-folk-white"></span>
    </div>
    

    <footer class="l-footer d-none u-bg-folk-primary mt-5">
        
        <div class="container">

            <div class="row">

                <div class="col-12 mt-n4">
                    
                    <div class="row justify-content-center">

                        <div class="col-md-5 order-3 order-md-1 mt-3 mt-md-0">

                            <div class="row justify-content-md-end">
                    
                                <div class="col-md-9 mb-3 mr-md-5">
                                    <h3 class="c-title d-block u-font-weight-bold text-center text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> endereço
                                    </h3>

                                    <div class="row">

                                        <div class="col-12 mt-2">

                                            <span class="l-footer__text d-block u-font-weight-semibold text-center text-md-right">
                                                <?php echo get_field( 'endereco', 'option') ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center my-4">

                                    <p class="u-font-weight-semibold text-center text-md-left u-color-folk-white mb-0">
                                        @INSPETORIA SALESIANA SÃO PIO X 2020. TODOS OS DIREITOS RESERVADOS.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-10 col-md-2 order-1 order-md-2 d-flex px-0">

                            <div class="l-footer__box-brand w-100 u-bg-folk-white">

                                <img
                                class="img-fluid"
                                src="<?php echo get_field( 'logo_do_rodape', 'option' ) ?>"
                                alt="<?php echo get_bloginfo('name') ?>">
                            </div>
                        </div>

                        <div class="col-md-5 order-2 order-md-3 mt-3 mt-md-0">

                            <div class="row">
                                
                                <div class="col-md-9 mb-3 ml-md-5">
                                    <h3 class="c-title d-block u-font-weight-bold text-center text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> contato
                                    </h3>

                                    <div class="row">

                                        <div class="col-12 mt-2">

                                            <p class="l-footer__text u-font-weight-semibold text-center text-md-left u-color-folk-white">
                                                <?php echo get_field( 'e-mail', 'option' ) ?> <br>
                                                <?php echo get_field( 'telefone', 'option' ) ?>
                                            </p>
                                        </div>

                                        <div class="col-12 mt-2">

                                            <ul class="l-top__social-media d-flex justify-content-center mb-0 pl-0">

                                                <?php if(get_field( 'instagram', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'instagram', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Instagram
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'facebook', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__facebook u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'facebook', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Facebook
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'youtube', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'youtube', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Youtube
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__whatsapp u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'whatsapp', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Whatsapp
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9 d-flex flex-column flex-md-row justify-content-between align-items-center my-4 ml-lg-5">
                                    <img
                                    class="img-fluid my-3 my-md-0"
                                    src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/footer-image.png"
                                    alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <footer class="l-footer u-bg-folk-primary mt-5 py-4">
        
        <div class="container">

            <div class="row">

                <div class="col-12">
                    
                    <div class="row justify-content-center">

                        <div class="col-md-5 mt-3 mt-md-0">

                            <div class="row justify-content-center">
                    
                                <div class="col-md-9">
                                    <h3 class="c-title d-block u-font-weight-bold text-uppercase u-color-folk-white">
                                        onde nos <br>
                                        <span class="u-font-weight-black u-color-folk-white">encontrar</span>
                                    </h3>

                                    <div class="row">

                                        <div class="col-12">

                                            <span class="l-footer__text d-block u-font-weight-semibold">
                                                <?php echo get_field( 'endereco', 'option') ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 d-flex justify-content-center mt-3 mt-md-0">

                            <div class="row justify-content-center">
                                
                                <div class="col-md-9">
                                    <h3 class="c-title d-block u-font-weight-bold text-uppercase u-color-folk-white">
                                        fale <br>
                                        <span class="u-font-weight-black u-color-folk-white">conosco</span>
                                    </h3>

                                    <div class="row">

                                        <div class="col-12">

                                            <p class="l-footer__text u-font-weight-semibold u-color-folk-white">
                                                <?php echo get_field( 'e-mail', 'option' ) ?> <br>
                                                <?php echo get_field( 'telefone', 'option' ) ?>
                                            </p>
                                        </div>

                                        <div class="col-12 mt-2">

                                            <ul class="l-top__social-media d-flex mb-0 pl-0">

                                                <?php if(get_field( 'instagram', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'instagram', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Instagram
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'facebook', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__facebook u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'facebook', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Facebook
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'youtube', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'youtube', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Youtube
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center u-bg-folk-white mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__whatsapp u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'whatsapp', 'option' ) ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Whatsapp
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-9 d-flex justify-content-center align-items-center my-4">
                            
                            <a 
                            href="#"
                            target="_blank"
                            rel="noreferrer noopener">
                                <img
                                class="img-fluid my-3 my-md-0"
                                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/footer-image.png"
                                alt="">
                            </a>
                        </div>

                         <div class="col-12 mb-4">

                            <p class="u-font-weight-semibold text-center u-color-folk-white mb-0">
                                @INSPETORIA SALESIANA SÃO PIO X <?php echo date( 'Y' ); ?>. TODOS OS DIREITOS RESERVADOS.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>