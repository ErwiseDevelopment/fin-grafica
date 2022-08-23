<section class="l-news my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                    
                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Notícias
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            Fique por dentro de tudo o que está <br>
                            acontecendo em nossa Inspetoria
                        </p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 my-3 my-lg-0">
                        
                        <?php
                            $args = array(
                                'posts_per_page' => 1,
                                'post_type'      => 'post',
                                'category_name'  => 'portal-destaque',
                            );

                            $blog_post_highlight = new WP_Query( $args );
                            $cats = array();

                            if( $blog_post_highlight->have_posts() ) : 
                                while( $blog_post_highlight->have_posts() ): $blog_post_highlight->the_post();
                                
                                foreach (get_the_category($post_id) as $c) {
                                    $cat = get_category($c);
                                    array_push($cats, $cat);
                                }

                                foreach($cats as $catt) {
                                    if($catt->name == 'Portal Destaque') {
                                        $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                        $category_name = $catt->name;
                                    }
                                }
                        ?>
                                    <div class="card border-0">

                                        <div class="card-img">
                                            <?php
                                                $altTitle = get_the_title();
                                                
                                                the_post_thumbnail('post-thumbnail', 
                                                    array(
                                                        'class' => 'img-fluid w-100 h-100',
                                                        'alt'   => $altTitle,
                                                ));
											?>
                                        </div>

                                        <div class="card-body mt-n4 pt-0">

                                            <div class="d-flex justify-content-center">
                                                <p class="l-news__highlight__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> 
                                                    
                                                    <?php echo $category_name; ?>
                                                </p>
                                            </div>

                                            <h6 class="l-news__highlight__card-title u-line-height-100 u-font-weight-extrabold mt-2">
                                                <?php the_title() ?>
                                            </h6>

                                            <p class="l-news__highlight__card-info u-line-height-100 mt-3">
                                                <span class="u-font-weight-semibold">
                                                    por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?>
                                                </span> <br>
                                                <span 
                                                class="u-font-weight-bold"
                                                style="color: <?php echo $backgroundColor; ?>;">
                                                    em <?php echo get_the_date( 'd/m/Y', $blog_post_highlight->ID ) ?>
                                                </span>
                                            </p>

                                            <span class="l-news__highlight__card-excerpt d-block u-font-weight-semibold">
                                                <?php echo(limit_words(get_the_excerpt(), 25)); ?>
                                            </span>

                                            <div class="row">

                                                <div class="col-md-6 mt-3">
                                                    <a
                                                    class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-3 px-5"
                                                    style="background-color: <?php echo $backgroundColor; ?>;"
                                                    href="<?php the_permalink() ?>">
                                                        Ler mais
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php endwhile; 
                            endif;

                            wp_reset_query();
                        ?>
                    </div>

                    <div class="col-lg-6">

                        <div class="row">

                            <div class="col-12 my-3 my-lg-0">

                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal',
                                    );

                                    $blog_post_portal_hightlight = new WP_Query( $args );
                                    $status = false;
                                    $cats = array();

                                    if( $blog_post_portal_hightlight->have_posts() ) : 
                                        while( $blog_post_portal_hightlight->have_posts() ) : $blog_post_portal_hightlight->the_post();
                                            $blogPostPortalID1 = get_the_ID();        
                                            $status = true;
                                            
                                            foreach (get_the_category($post_id) as $c) {
                                                $cat = get_category($c);
                                                array_push($cats, $cat);
                                            }

                                            foreach($cats as $catt) {
                                                if($catt->name != 'Portal' && $catt->name != 'Portal Destaque') {
                                                    $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                    $category_name = $catt->name;
                                                }
                                            }                         
                                ?>
                                                <div class="card border-0">

                                                    <div class="card-img l-news__medium__card-img">

                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body mt-n4 pt-0 px-0">

                                                        <div class="d-flex justify-content-center">
                                                            <p class="l-news__medium__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                <span class="u-font-weight-medium u-color-folk-white mr-2">//</span>
                                                                <?php echo $category_name; ?>
                                                        </div>

                                                        <h6 class="l-news__medium__card-title u-line-height-100 u-font-weight-extrabold mb-0">
                                                            <?php the_title() ?>
                                                        </h6>

                                                        <p class="l-news__medium__card-info u-line-height-100">
                                                            <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?></span> <br>
                                                            <span class="u-font-weight-bold"
                                                            style="color: <?php echo $backgroundColor; ?>;">
                                                                <?php 
                                                                    echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                ?>
                                                            </span>
                                                        </p>

                                                        <div class="row">

                                                            <div class="col-md-5">
                                                                <a
                                                                class="l-news__medium__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php   
                                            if($status) :
                                                break;
                                            endif; 
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>

                            <div class="col-md-6 my-3 my-lg-0">
                                
                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal',
                                    );

                                    $blog_post_portal2 = new WP_Query( $args );
                                    $status = false;

                                    if( $blog_post_portal2->have_posts() ) : 
                                        while( $blog_post_portal2->have_posts() ): $blog_post_portal2->the_post();
                                            $blogPostPortalID2 = get_the_ID();

                                            if($blogPostPortalID1 != $blogPostPortalID2) :
                                                $status = true;

                                                foreach (get_the_category($post_id) as $c) {
                                                    $cat = get_category($c);
                                                    array_push($cats, $cat);
                                                }
    
                                                foreach($cats as $catt) {
                                                    if($catt->name != 'Portal' && $catt->name != 'Portal Destaque') {
                                                        $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                        $category_name = $catt->name;
                                                    }
                                                } 
                                ?>
                                                <div class="card h-100 border-0">

                                                    <div class="card-img">
                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body d-flex flex-column justify-content-between mt-n4 pt-0 px-0">

                                                        <div>

                                                            <div class="d-flex justify-content-center">
                                                                <p class="l-news__small__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span>

                                                                    <?php echo $category_name; ?>
                                                                </p>
                                                            </div>

                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                <?php the_title() ?>
                                                            </h6>

                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?></span> <br>
                                                                <span 
                                                                class="u-font-weight-bold"
                                                                style="color: <?php echo $backgroundColor; ?>;">
                                                                    <?php 
                                                                        echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                    ?>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-10">
                                                                <a
                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php           if($status) :
                                                    break;
                                                endif;
                                            endif;
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>
                            
                            <div class="col-md-6 my-3 my-lg-0">

                                <?php
                                    $args = array(
                                        'posts_per_page' => -1,
                                        'post_type'      => 'post',
                                        'category_name'  => 'portal',
                                    );

                                    $blog_post_portal2 = new WP_Query( $args );
                                    $status = false;
                                    
                                    if( $blog_post_portal2->have_posts() ) : 
                                        while( $blog_post_portal2->have_posts() ): $blog_post_portal2->the_post();
                                            $blogPostPortalID3 = get_the_ID();

                                            if($blogPostPortalID3 != $blogPostPortalID2 && $blogPostPortalID3 != $blogPostPortalID1) :
                                                $status = true;

                                                foreach (get_the_category($post_id) as $c) {
                                                    $cat = get_category($c);
                                                    array_push($cats, $cat);
                                                }
    
                                                foreach($cats as $catt) {
                                                    if($catt->name != 'Portal' && $catt->name != 'Portal Destaque') {
                                                        $backgroundColor = get_field( 'cor_de_fundo', $catt);
                                                        $category_name = $catt->name;
                                                    }
                                                }
                                ?>

                                                <div class="card h-100 border-0">

                                                    <div class="card-img">
                                                        <?php
                                                            $altTitle = get_the_title();
                                                            
                                                            the_post_thumbnail('post-thumbnail', 
                                                                array(
                                                                    'class' => 'img-fluid w-100 h-100',
                                                                    'alt'   => $altTitle,
                                                            ));
                                                        ?>
                                                    </div>

                                                    <div class="card-body d-flex flex-column justify-content-center mt-n4 pt-0 px-0">

                                                        <div>
                                                            
                                                            <div class="d-flex justify-content-center">
                                                                <p class="l-news__small__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white mb-2 py-2 px-5" style="background-color: <?php echo $backgroundColor; ?>;">
                                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> 
                                                                    <!-- Ensino -->

                                                                    <?php echo $category_name; ?>
                                                                </p>
                                                            </div>

                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                <?php the_title() ?>
                                                            </h6>

                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                <span class="u-font-weight-semibold">por <?php echo get_the_author_meta('user_firstname', $author_id) . ' ' . get_the_author_meta( 'user_lastname', $author_id); ?></span> <br>
                                                                <span 
                                                                class="u-font-weight-bold"
                                                                style="color: <?php echo $backgroundColor; ?>;">
                                                                    <?php 
                                                                        echo 'em ' . get_the_date( 'd/m/Y', $blog_post_portal_hightlight->ID );
                                                                    ?>
                                                                </span>
                                                            </p>
                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-10">
                                                                <a
                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-2 px-5"
                                                                style="background-color: <?php echo $backgroundColor; ?>;"
                                                                href="<?php the_permalink() ?>">
                                                                    Ler mais
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                <?php           if($status) :
                                                    break;
                                                endif;
                                            endif;
                                        endwhile; 
                                    endif;

                                    wp_reset_query();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>