<section class="l-links u-border-top-2 u-border-color-secondary pb-3">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                    
                    <div class="col-10 offset-1 mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Links úteis
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                <?php 
                    $duration = 200;

                    if(have_rows( 'links_uteis', $post->ID )) : 
                        while(have_rows( 'links_uteis', $post->ID )) : the_row();
                            $duration = $duration + 200;
                ?>
                            <a 
                                        href="<?php echo get_sub_field( 'link' ) ?>"
                                        target="_blank"
                                        rel="noreferrer noopener">
                            <img
                            class="img-fluid"
                            src="<?php echo get_sub_field( 'logo' ) ?>"
                            alt=""
                            data-aos="fade-up"
                            data-aos-duration="600"
                            data-aos-delay="<?php echo $duration; ?>">
                            </a>
                <?php endwhile;
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>