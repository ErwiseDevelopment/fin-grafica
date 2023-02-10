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

	
		<div class="col-12">

				<div class="row justify-content-left">

					<div class="col-lg-3 my-3">
						<a 
						class="l-blogs__read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bgi-folk-orange py-3 px-8" 
						href="<?php echo get_home_url(null, 'categoria-produto/')?>">
							Fazer outro orçamento
						</a>
					</div>
					<?php 
                    
                    ?>
					<div class="col-lg-3 my-3">
						<label for="product-select">Selecione o produto:</label>
						<select id="product-select" name="product">
							<?php
							// Obtenha todos os produtos disponíveis
							$args = array(
								'post_type' => 'produtos',
								'posts_per_page' => -1,
								'order' => 'ASC',
							);
							$products = new WP_Query( $args );
							if( $products->have_posts() ) :
								while( $products->have_posts() ) : $products->the_post();
								$categoria = get_the_terms(get_the_ID(), 'produto-categoria');
							?>
							<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
							
							<?php
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</select>
						</div>
				</div>
		</div>
		<div class="container">
		<div class="row">

			<div class="col-12">

				<div class="row">

					<div class="col-lg-4">

						<div class="swiper-container js-swiper-product-images" style="height:unset">

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
										$product_title = get_the_title();
										// $images = get_field( 'imagem_produto', get_the_ID() );
										// if( $images ) :
										// echo "<span class='js-show-product-link' data-value='" . get_the_permalink() . "'></span>";
							?>
							            
										<div 
										class="swiper-wrapper js-show-product-link"
										data-value="<?php the_permalink(); ?>">

											<?php
												if( have_rows( 'imagem_produto' ) ) :
													while( have_rows( 'imagem_produto' ) ) : the_row();
														if( get_sub_field( 'imagens_produto_todos' ) ) :
											?>
															<div class="swiper-slide flex-column">
																<img
																class="img-fluid w-100"
																src="<?php echo get_sub_field( 'imagens_produto_todos' ) ?>"
																alt="<?php the_title() ?>">
															</div>
												<?php
															endif;
														endwhile;	
													endif;
												?>
										</div>
							<?php
									endwhile;
								endif;

								wp_reset_query();
							?>
						</div>


						<div class="row">

							<div class="col-1">
								<div 
								class="swiper-button-prev swiper-button-prev-partners d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-prev-product-images"
								style="left:1rem!important"></div>
							</div>

							<div class="col-10">
								<h4 class="u-font-weight-bold text-uppercase text-center u-color-folk-theme mb-0 js-title">
									<?php echo $product_title; ?>
								</h4>
							</div>
							<div class="col-1">
								<div 
								class="swiper-button-next swiper-button-next-partners d-none d-lg-flex after::u-color-folk-white u-bg-folk-theme js-swiper-button-next-product-images"
								style="right:1rem!important"></div>
							</div>
						</div>
						<!-- end swiper [contact-form-7 id="688" title="Solicitacao orcamento"]-->
					</div>

					<div class="col-lg-8 mt-4 mt-lg-0 px-lg-5">
						<?php echo do_shortcode( '[contact-form-7 id="647" title="Solicitação"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end content -->]

<script>
	setTimeout(function() {
		if( document.querySelector( '.js-show-product-title' ) ) {
			const title = document.querySelector( '.js-title' )
			const field = document.querySelector( '.js-show-product-title' ) 

			field.value = title.innerText
		}

		if( document.querySelector( '.js-get-product-link' ) ) {
			const showLink = document.querySelector( '.js-show-product-link' )
			const getLink = document.querySelector( '.js-get-product-link' )

			getLink.value = showLink.dataset.value
		}
	}, 1000)

	let url_string = window.location.href;
	let url = new URL(url_string);
	let data = url.searchParams.get("meta");

	let selectMaterial = document.querySelector( 'select[name=material]' ).getElementsByTagName( 'option' )
	
	for(let select of selectMaterial) {
		if(select.innerText == data) {
			document.querySelector( 'select[name=material]' ).value = select.innerText
		}
	}
	
jQuery(document).ready(function($) {
  $('#product-select').change(function() {
    var productId = $(this).val();
    var material = $('#material-select').val();
    window.location.href = '<?php echo get_home_url(null, 'orcamento/')?>?id=' + productId + '&material=' + <?php get_the_terms(get_the_ID(), 'produto-categoria'); ?>;
  });

  $('#material-select').change(function() {
    var material = $(this).val();
    var productId = $('#product-select').val();
    window.location.href = '<?php echo get_home_url(null, 'orcamento/')?>?id=' + productId + '&material=' + <?php get_the_terms(get_the_ID(), 'produto-categoria'); ?>;
  });
});

</script>

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
