<section class="l-most-read my-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12">

                <div class="col-10 col-lg-6 offset-1 mb-3">
                    <?php
                        $link_pattern = get_field( 'link_padrao_portal', 'option' );
                        $menu_post_link = $link_pattern . get_field( 'link_da_editorias', 'option');
                        $request_posts = wp_remote_get( $menu_post_link );

                        if(!is_wp_error( $request_posts )) :
                            $body = wp_remote_retrieve_body( $request_posts );
                            $data = json_decode( $body );
                            $status = false;

                            if(!is_wp_error( $data )) :
                                foreach( $data as $rest_post ) :
                    ?>
                                    <h3 class="c-title c-title__small l-most-read__title-line position-relative u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-primary py-3 px-4">
                                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> <?php echo $rest_post->titulo_mais_lidas; ?>
                                    </h3>
                    <?php       endforeach;
                            endif; 
                        endif; 
                    ?>
                </div>
            </div>

            <div class="col-11 col-md-9 mt-3">

                <div class="row">

                    <?php
                        $pastoral_post_link = $link_pattern . get_field( 'link_do_pastoral_juvenil', 'option' );
                        $request_posts = wp_remote_get( $pastoral_post_link );

                        if(!is_wp_error( $request_posts )) :
                            $body = wp_remote_retrieve_body( $request_posts );
                            $data = json_decode( $body );
                            $count = 0;
                            if(!is_wp_error( $data )) :
                                foreach( $data as $rest_post ) :
                                    $count++;
                    ?>
                                    <div class="col-md-4 l-most-read__post-item my-3 my-md-0">

                                        <a
                                        class="l-most-read__post-link"
                                        href="<?php echo esc_url( $rest_post->link ); ?>"
                                        target="_blank"
                                        rel="noreferrer noopener">
                                            <h6 class="l-most-read__post-title u-font-weight-extrabold text-uppercase u-color-folk-theme mb-0">
                                                <!-- // ensino -->
                                                <?php echo $rest_post->title->rendered; ?>
                                            </h6>

                                            <p class="l-most-read__post-content u-font-weight-semibold mb-0">
                                                <!-- Celebrações marcam os 10 anos de AMJ em Santa 
                                                Catarina -->
                                                <?php echo(limit_words($rest_post->post_excerpt, 12)); ?>
                                            </p>
                                        </a>
                                    </div>
                    <?php               
                                    
                                    if($count == 3) 
                                        break;
                                endforeach;
                            endif; 
                        endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>