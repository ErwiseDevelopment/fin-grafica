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

			<div class="col-12">

				<div class="row">
					
					<!-- loop -->
					<?php
						if( isset($_GET['cat'])) {
							$product_category = $_GET['cat'];

							$args = array(
								'posts_per_page' => -1,
								'post_type'      => 'produtos',
								'order'          => 'DESC',
								'tax_query'      => array(
									array(
										'taxonomy' => 'produto-categoria',
										'field'    => 'slug',
										'terms'    => array( $product_category )
									)
								)
							);
						} else {
							$args = array(
								'posts_per_page' => -1,
								'post_type'      => 'produtos',
								'order'          => 'DESC'
							);
						}
					
						$products = new WP_Query( $args );

						if( $products->have_posts() ) :
							while( $products->have_posts() ) : $products->the_post();
								$images = get_field( 'imagem_produto', get_the_ID() );
					?>

<div class="col-12">

<div class="row justify-content-center">

	<div class="col-lg-3 my-3">
		<a 
		class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bgi-folk-orange py-3 px-8" 
		href="<?php echo get_home_url(null, 'categoria-produto/')?>">
			Solicitar outro orçamento
		</a>
	</div>
</div>
</div>
								<div class="col-lg-4 my-3">

									<div class="card border-0">

										<?php if( $images ) : ?>
											<div class="l-best-sellers__card-img card-img d-flex flex-column justify-content-center align-items-center">

												<div class="card-img">
													<img
													class="img-fluid"
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
													<a 
													class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-3 px-6" 
													href="<?php echo get_home_url( null, 'solicitar-orcamento/?id=' . get_the_ID() )  ?>">
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
