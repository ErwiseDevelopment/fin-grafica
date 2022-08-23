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
<section>


	<div class="container">

		<div class="row">

			<div class="col-12">

					<div class="row">

						<div class="col-lg-4 my-3 my-lg-0">

							<div class="card border-0">

								<div class="l-best-sellers__card-img card-img d-flex justify-content-center align-items-center">

									<!-- swiper -->

										<div class="swiper-wrapper" style="transform: translate3d(-336px, 0px, 0px); transition-duration: 0ms;">
											<div class="swiper-slide swiper-slide-duplicate swiper-slide-prev swiper-slide-duplicate-next" data-swiper-slide-index="1" style="width: 336px;">
												<img class="img-fluid" src="http://sal.grafica.erwisedev-hml.com.br/wp-content/uploads/2022/04/Embalagem-Xis-2B-165x165-cm-Duplex-300g-Automático-com-cola-1.png" alt="Embalagem Xis">
											</div>

											<!-- loop -->
											<div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 336px;">
												<img class="img-fluid" src="http://sal.grafica.erwisedev-hml.com.br/wp-content/uploads/2022/04/Embalagem-Xis-2A-165x165-cm-Duplex-300g-Automático-com-cola.png" alt="Embalagem Xis">
											</div>
											<!-- end loop -->
											<!-- end swiper -->
										</div>

										<div class="card-body pb-0">

											<p class="l-best-sellers__card-title u-font-weight-bold u-color-folk-theme">
												Embalagem Xis
											</p>

											<span class="l-best-sellers__card-description d-block">

												<p>
													Impressão Off Set Alta Qualidade <br>
													Cores: 4×0 <br>
													Papel Duplex 300g <br>
													Formato: 165×165 cm
												</p>
											</span>
										</div>

								<div class="card-footer border-0 u-bg-folk-none px-0">

									<div class="row">

										<div class="col-lg-8">
											<a class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-primary py-3 px-5" href="http://sal.grafica.erwisedev-hml.com.br/solicitar-orcamento/?id=520">
												+ Detalhes
											</a>
										</div>
									</div>
								</div>
								</div>
						</div>
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
