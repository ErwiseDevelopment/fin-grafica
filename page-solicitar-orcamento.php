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
<section>

	<div class="container">
				
		<div class="row">

			<div class="col-12">

				<div class="row">

					<div class="col-6">

						<?php
							if( isset($_GET['id']))
								$product_id = $_GET['id'];

							$args = array(
								'posts_per_page' => 1,
								'post_type'      => 'produtos',
								'post__in'       => array( $product_id )
							);

							$products = new WP_Query( $args );

							echo '<pre>';
							var_dump($products);
							echo '</pre>';
						?>
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
