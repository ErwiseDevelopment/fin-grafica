<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<section class="my-5 py-5">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<h1 class="l-error__title u-line-height-100 u-font-weight-bold text-center text-uppercase mb-5">
					Erro <br>
					<span class="l-error__number">404</span>
				</h1>

				<p class="l-error__text u-font-weight-bold text-center">
					Página não encontrada! :(
				</p>

				<div class="row justify-content-center">

					<div class="col-md-4 mt-5">
						<a
						class="w-100 border rounded d-block u-font-weight-bold text-center text-decoration-none u-color-folk-black hover:u-color-folk-white hover:u-bg-folk-golden py-2"
						href="<?php echo get_home_url( null, '/' ) ?>">
							Ir para a página inicial
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div><!-- .page-content -->
</section><!-- .error-404 -->

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
