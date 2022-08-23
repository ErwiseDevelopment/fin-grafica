<?php

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'featured_image_src', // Name of new field (You can call this anything)
        array(
            'get_callback'    => 'get_image_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_image_src( $object, $field_name, $request ) {
  $feat_img_array = wp_get_attachment_image_src(
    $object['featured_media'], // Image attachment ID
    'full',  // Size.  Ex. "thumbnail", "large", "full", etc..
    true // Whether the image should be treated as an icon.
  );
  return $feat_img_array[0];
}

add_filter('rest_prepare_post', 'my_filter_post', 10, 3);

function my_filter_post($data, $post, $context) {
    $data->data['post_date'] = get_the_date( 'd/m/Y', $post->ID );

    // Does this have categories?
    if (!empty($data->data['categories'])) {

      // Loop through them all
        $cats = array();

        foreach($data->data['categories'] as $category_id) {
         // Get the actual Category Object
            $category = get_category($category_id);
            array_push($cats, $category->name);

            //var_dump($cats);

            if (sizeOf($cats) > 0) {
                $post_categories = implode(', ', $cats);
            } 

            //if ($category->parent == 0) {
                // "top level" category
                //$data->data['parent_category'] = $category->name;
            //} else {
                // some child level category
                $data->data['child_category'] = $cats;
        }
    }

    return $data;
}

// function information_init() {
//     $args = array(
//         'public' => true,
//         'label'  => 'Informações Geraisss',
//         'show_in_rest'       => true, 
//         'menu_icon'           => 'dashicons-editor-ul',
//         'taxonomies'          => array( 'category' ),
//         'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
//     );
//     register_post_type('information', $args );
// }
// add_action( 'init', 'information_init' );

// function our_init() {
//     $args = array(
//         'public' => true,
//         'label'  => 'Nossas Paróquias',
//         'show_in_rest'       => true, 
//         'menu_icon'           => 'dashicons-admin-home',
//         'taxonomies'          => array( 'category' ),
//         'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
//     );
//     register_post_type('our', $args );
// }
// add_action( 'init', 'our_init' );

// function meio_init() {
//     $args = array(
//         'public' => true,
//         'label'  => 'Meio',
//         'show_in_rest'       => true, 
//         'menu_icon'           => 'dashicons-text-page',
//         'taxonomies'          => array( 'category' ),
//         'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
//     );
//     register_post_type('meio', $args );
// }
// add_action( 'init', 'meio_init' );

//new ACF PRO
function mantenedora_create_page() {

	if( function_exists('acf_add_options_page') ) {	
		acf_add_options_page( 
            array( 
                'page_title' => 'Informações Gerais', 
                'menu_title' => 'Informações Gerais', 
                'menu_slug'  => 'informacoes_gerais', 
                'capability' => 'edit_posts', 
                'position'   => '23,3', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-info' 
        ));

        // acf_add_options_page( 
        //     array( 
        //         'page_title' => 'Nossas Paróquias', 
        //         'menu_title' => 'Nossas Paróquias', 
        //         'menu_slug'  => 'nossas_paroquias', 
        //         'capability' => 'edit_posts', 
        //         'position'   => '23,4', 
        //         'redirect'   => false, 
        //         'icon_url'   => 'dashicons-admin-home',
        // ));

        // acf_add_options_page( 
        //     array( 
        //         'page_title' => 'Meio', 
        //         'menu_title' => 'Meio', 
        //         'menu_slug'  => 'meio', 
        //         'capability' => 'edit_posts', 
        //         'position'   => '23,5', 
        //         'redirect'   => false, 
        //         'icon_url'   => 'dashicons-text-page',
        // ));

        acf_add_options_page( 
            array( 
                'page_title' => 'API', 
                'menu_title' => 'API', 
                'menu_slug'  => 'api', 
                'capability' => 'edit_posts', 
                'position'   => '23,7', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-rest-api',
        ));
        
        acf_add_options_page(
            array(
            'page_title' => 'Depoimentos',
            'menu_title' => 'Depoimentos',
            'menu_slug' => 'depoimento',
            'capability' => 'edit_posts',
            'position' => '23,4',
            'redirect' => false,
            'icon_url' => 'dashicons-admin-comments',
        ));

		//acf_add_options_page( array( 'page_title' => 'CTA Banners', 'menu_title' => 'CTA Banners', 'menu_slug' => 'cta_banners', 'capability' => 'edit_posts', 'position' => '23,4', 'redirect' => false, 'icon_url' => 'dashicons-visibility' ));
		//acf_add_options_page( array( 'page_title' => '404', 'menu_title' => '404', 'menu_slug' => '404', 'capability' => 'edit_posts', 'position' => '23,5', 'redirect' => false, 'icon_url' => 'dashicons-dismiss' ));
	}

}
add_action( 'init', 'mantenedora_create_page' );

//Função para criar post type:
function mantenedora_create_post_type() { 
    
    register_post_type( 'produtos', array(
        'labels'        => array( 'name' => 'Produtos', 'singular_name' => 'Produto', 'all_items' => 'Todos os produtos' ),
        'public'        => true,
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-cart',
        'menu-position' => 10,
        'supports'      => array( 'title', 'author' )
    ) );

    // register_post_type( 'agendas', array(
	// 	'labels' 		=> array( 'name' => 'Agendas', 'singular_name' => 'Agenda', 'all_items' => 'Todos Eventos' ),
	// 	'public' 		=> true,
	// 	'has_archive'	=> true,
	// 	'menu_icon'		=> 'dashicons-welcome-write-blog',
	// 	'supports' 		=> array( 'title', 'editor',  'revisions', 'author' ) 
	// ) );

	// register_post_type( 'podcast', array(
	// 	'labels' 		=> array( 'name' => 'Podcast', 'singular_name' => 'Podcast', 'all_items' => 'Todos Podcasts' ),
	// 	'public' 		=> true,
	// 	'has_archive'	=> true,
	// 	'menu_icon'		=> 'dashicons-format-audio',
	// 	'supports' 		=> array( 'title', 'editor',  'revisions', 'author' ) 
	// ) );

    // register_post_type( 'galeria', array(
	// 	'labels' 		=> array( 'name' => 'Galeria', 'singular_name' => 'Galeria', 'all_items' => 'Todas as Fotos' ),
	// 	'public' 		=> true,
	// 	'has_archive'	=> true,
	// 	'menu_icon'		=> 'dashicons-format-gallery',
	// 	'supports' 		=> array( 'title',  'revisions', 'author' ) 
	// ) );
}
add_action( 'init', 'mantenedora_create_post_type' );

function mantenedora_create_taxonomy() {
	register_taxonomy( 'galeriacategoria', 'galeria', array( 'labels' => array( 'name' => 'Categorias', 'singular_name' => 'Categoria' ), 'hierarchical' => true, 'show_admin_column' => true ) );
    register_taxonomy( 'agendacidade', 'agendas', array( 'labels' => array( 'name' => 'Cidades', 'singular_name' => 'Cidade' ), 'hierarchical' => true, 'show_admin_column' => true ) );
    register_taxonomy( 'produto-categoria', 'produtos', array( 'labels' => array( 'name' => 'Categoria', 'singular_name' => 'Categoria' ), 'hierarchical' => true, 'show_admin_column' => true ) );
}
add_action( 'init', 'mantenedora_create_taxonomy' );


function single_temas_scripts()
{
    //css
    wp_enqueue_style('single-temas-style', get_stylesheet_uri());
    wp_enqueue_style('single-temas-main-style', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/css/main.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');

    //js
    wp_enqueue_script('single-temas-swiper-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper.min.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-swiper-folk-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper-folk.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-main-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/main.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-menu-toggle', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/menu-toggler.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-select-change-month', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/select-change-month.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-loader', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/loader.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-click-show-cart', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/click-show-cart.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-show-btn-up', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/show-btn-up.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-modal-testimonials', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/modal-testimonials.js', array(), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'single_temas_scripts');


function limit_words($string, $word_limit) {  
    $words = explode(' ', $string, ($word_limit + 1));  
    if(count($words) > $word_limit) { array_pop($words); array_push($words, "..."); }  
    return implode(' ', $words);
}

//Função para organizar Calendário Salesiano
function mantenedora_cmp( $a, $b ) {
    $t1 = strtotime($a['data']);
    $t2 = strtotime($b['data']);
    return $t1 - $t2;
}

function get_long_month( $month ) {
    $long_month = array (
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    );

    foreach( $long_month as $key => $value ) {
        if( $key == $month ) {
            $monthCurrent = $value;
        }
    }

    return $monthCurrent;
}

//Logo pagina login

function logoadmin() {
    echo " <style>
    body.login #login h1 a {
    background: url('https://erwise.com.br/wp-content/uploads/2022/04/login-wp.jpg') no-repeat scroll center top transparent;
    height: 90px;
    width: 250px;
    }
    </style>
    ";
    }
    add_action("login_head", "logoadmin");
    
    // Customizar o Footer do WordPress
    function remove_footer_admin () {
        echo '© <a href="https://api.whatsapp.com/send?phone=%205511937008521&text=Olá!/">Suporte</a> - Desenvolvimento e Criação Erwise Dev ME';
    }
    add_filter('admin_footer_text', 'remove_footer_admin');
    
    
    // Retirar logo do Wordpress admin
     function wps_admin_bar (){
         global $wp_admin_bar;
         $wp_admin_bar -> remove_menu ('wp-logo');
         $wp_admin_bar -> remove_menu ('about');
         $wp_admin_bar -> remove_menu ('wporg');
         $wp_admin_bar -> remove_menu ('documentation');
         $wp_admin_bar -> remove_menu ('support-forums');
         $wp_admin_bar -> remove_menu ('feedback');
         $wp_admin_bar -> remove_menu ('view-site');
     }
    add_action ('wp_before_admin_bar_render', 'wps_admin_bar');
    
    // removendo campo comentarios admin wp
    
    add_action( 'admin_menu', 'my_remove_admin_menus' );
    function my_remove_admin_menus() {
        remove_menu_page( 'edit-comments.php' );
    }
    
    add_action('init', 'remove_comment_support', 100);
    
    function remove_comment_support() {
        remove_post_type_support( 'post', 'comments' );
        remove_post_type_support( 'page', 'comments' );
    }
    
    function mytheme_admin_bar_render() {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
    add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );