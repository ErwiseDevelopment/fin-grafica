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

<!-- banner -->
<section>

	<div class="container-fluid">

		<div class="row">
		

			<div class="col-12 px-0">

				<?php
					$alt_title = get_the_title();

					the_post_thumbnail( 'post-thumbnail',
						array(
							'class' => 'img-fluid w-100',
							'alt'   => $alt_title
					));
				?>
			</div>
		</div>
	</div>
</section>
<!-- end banner -->

<!-- products -->
<section class="py-5">

	<div class="container">

		<div class="row">

			<div class="col-lg-3 px-0">
				
				<h4 class="u-title u-font-weight-bold text-center text-lg-left text-uppercase all:u-color-folk-theme mb-0">
					Categorias
				</h4>
			
				<?php
					$product_categories = get_categories(
						array(
							'taxonomy' => 'produto-categoria'
						));

					foreach( $product_categories as $product_category ) :
				?>
						<div class="col-12 my-1">

							<div class="row">

								<div class="col-11">
									<a 
									class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white p-2"
									style="word-break: break-word"
									href="<?php echo get_home_url( null, 'portfolio?cat=' . $product_category->slug); ?>">
										<!-- // Folhetos -->
										<?php echo $product_category->name; ?>
									</a>
								</div>
							</div>
							
							<div class="row justify-content-end">

								<?php
									$terms = get_terms(
										array(
											'taxonomy'   => 'produto-categoria',
											'hide_empty' => true,
											'parent'     => $product_category->term_id
										)
									);

									foreach( $terms as $term ) :
								?>
										<div class="col-11">
											<a 
											class="l-product-categories__item d-block u-font-weight-semibold text-center text-decoration-none u-color-folk-white p-2"
											style="word-break: break-word"
											href="<?php echo get_home_url( null, 'portfolio?cat=' . $term->slug); ?>">
												<!-- // Folhetos -->
												<?php echo $term->name; ?>
											</a>
										</div>
								<?php 
									endforeach; 
								?>	
							</div>
						</div>
                <?php 
					endforeach; 
				?>
			</div>

			<div class="col-lg-9">

				<div class="row">

					<?php

						if( isset($_GET['cat']))
						$product_id = $_GET['cat'];
						$args = array(
							'posts_per_page' => -1,
							'post_type'      => 'produtos',
							'order'          => 'DESC',
							'tax_query'      => array(
								array(
									'taxonomy' => 'produto-categoria',
									'field'    => 'slug',
									'terms'    => $product_id
								)
							)
						);

						if (!isset($product_id)) {
							unset($args['tax_query']);
						}

						$products = new WP_Query( $args );

						if( $products->have_posts() ) :
							while( $products->have_posts() ) : $products->the_post();
								$images = get_field( 'imagem_produto', get_the_ID() );
					?>
								<div class="col-lg-5 my-3">

									<div class="card border-0">

										<?php if( $images ) : ?>
											<div class="l-best-sellers__card-img card-img d-flex flex-column justify-content-center align-items-center">

												<div class="card-img">
													<img
													class="l-best-sellers__product-image img-fluid"
													src="<?php echo $images[0]['imagens_produto_todos']; ?>"
													alt="<?php the_title() ?>">
												</div>										
											</div>
										<?php endif; ?>

										<div class="card-body pb-0">

											<p class="l-best-sellers__card-title u-font-weight-bold u-color-folk-theme">
												<!-- Embalagem Xis -->
												<?php the_title() ?>
											</p>

											<span class="l-best-sellers__card-description d-block">
												<?php echo get_field( 'descricao_produto' ) ?>
											</span>
										</div>

										<div class="card-footer border-0 u-bg-folk-none px-0">

                                                <div class="row">

                                                    <div class="col-lg-8">
                                                        <?php 
                                                            $cat = array(); 
                                                            $categoria = get_the_terms(get_the_ID(), 'produto-categoria');
                                                        ?>
                                                        <a 
                                                        class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-3 px-3" 
                                                        href="<?php echo get_home_url( null, 'solicitar-orcamento/?id=' . get_the_ID()  . '&meta=' .  $categoria[0]->name  );  ?>">
                                                           <?php echo get_field('botao_produtos', 'option') ?>
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
									</div>
								</div>
					<?php
							endwhile;
						endif;
						
						wp_reset_query();
					?>
					<!-- end loop -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end products -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
