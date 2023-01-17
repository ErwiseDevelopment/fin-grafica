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

		<?php while (have_posts()) : the_post(); ?>

			<!-- banner -->
			<section>

				<div class="container-fluid">

					<div class="row">

						<div class="col-12 px-0">

							<?php
							$alt_title = get_the_title();

							the_post_thumbnail(
								'post-thumbnail',
								array(
									'class' => 'img-fluid w-100',
									'alt'   => $alt_title
								)
							);
							?>
						</div>
					</div>
				</div>
			</section>
			<!-- end banner -->

			<!-- content -->
			<section class="py-5">

				<div class="container">

					<div class="row">

						<div class="col-12">

							<div class="row">

								<div class="col-lg-4">

									<?php
									if (isset($_GET['id']))
										$product_id = $_GET['id'];

									$args = array(
										'posts_per_page' => 1,
										'post_type'      => 'produtos',
										'post__in'       => array($product_id)
									);

									$products = new WP_Query($args);

									if ($products->have_posts()) :
										while ($products->have_posts()) : $products->the_post();
											$images = get_field('imagem_produto', get_the_ID());
											if ($images) :
									?>
												<span class="js-show-product-link" data-value="<?php the_permalink() ?>">
												</span>
												<img class="img-fluid" src="<?php echo $images[0]['imagens_produto_todos']; ?>" alt="<?php the_title() ?>">

												<h3 class="u-font-weight-bold text-uppercase text-center u-color-folk-theme mb-0 js-title">
													<?php the_title() ?>
													</h5>
										<?php
											endif;
										endwhile;
									endif;

									wp_reset_query();
										?>
								</div>

								<div class="col-lg-8 mt-4 mt-lg-0">
									<?php echo do_shortcode('[contact-form-7 id="647" title="Solicitação"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- end content -->]

			<script>
				setTimeout(function() {
					if (document.querySelector('.js-show-product-title')) {
						const title = document.querySelector('.js-title')
						const field = document.querySelector('.js-show-product-title')

						field.value = title.innerText
					}
				}, 1000)
			</script>

			<script>
				setTimeout(function() {
					if (document.querySelector('.js-show-product-title')) {
						const title = document.querySelector('.js-title')
						const field = document.querySelector('.js-show-product-title')

						field.value = title.innerText
					}

					if (document.querySelector('.js-get-product-link')) {
						const showLink = document.querySelector('.js-show-product-link')
						const getLink = document.querySelector('.js-get-product-link')

						getLink.value = showLink.dataset.value
					}
				}, 1000)
			</script>

		<?php endwhile; ?>

	</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
