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

<!-- content -->
<section class="py-5">

	<div class="container">
				
		<div class="row">

			<div class="col-12">

				<div class="row">

					<div class="col-lg-4">

						<?php
							if( isset($_GET['id']))
								$product_id = $_GET['id'];

							$args = array(
								'posts_per_page' => 1,
								'post_type'      => 'produtos',
								'post__in'       => array( $product_id )
							);

							$products = new WP_Query( $args );

							if( $products->have_posts() ) :
								while( $products->have_posts() ) : $products->the_post();
									$images = get_field( 'imagem_produto', get_the_ID() );
									if( $images ) :
						?>
										<img
										class="img-fluid"
										src="<?php echo $images[0]['imagens_produto_todos']; ?>"
										alt="<?php the_title() ?>">

										<h3 class="u-title u-font-weight-bold text-uppercase all:u-color-folk-theme mb-0">
											<span class="u-title--highlight u-font-weight-black"><?php the_title() ?></span>
										</h3>
						<?php
									endif;
								endwhile;
							endif;

							wp_reset_query();
						?>
					</div>

					<div class="col-lg-8 mt-4 mt-lg-0">
						<?php echo do_shortcode( '[contact-form-7 id="647" title="Solicitação"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end content -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
