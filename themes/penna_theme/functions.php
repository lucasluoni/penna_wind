<?php
/****************************************************************************
1.Theme setup
****************************************************************************/

function andrepenna_theme_setup() {
	
	// 1.1.Make theme available for translation.*/
	// load_theme_textdomain( 'mikka', get_stylesheet_directory() . '/languages' );
	
	
	// 1.2.post formats
	add_theme_support( 'post_formats' );
	
	// 1.3.Enable support for Post Thumbnails on posts and pages
	add_theme_support( 
		'post-thumbnails', 
		array( 
				'post', 
				'page',
				'rotas'
	));

	// add_theme_support( 'post-thumbnails', array( 'rotas' ) );  // Pages only
	
	// 1.4.add_image_size( 'rosane_franco-featured-image', 2000, 1200, true );
	// add_image_size( 'andrepenna-thumbnail-avatar', 100, 100, true );

	
	// 1.5.Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// 1.6.title tags
	add_theme_support( 'title-tag' );
	
	// 1.7.This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'mikka' ),
		'social' => __( 'Social Links Menu', 'mikka' ),
		
	) );
	
	// 1.8.Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// 1.9.Enable support for Post Formats.
	// See: https://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	
	// 1.10.Default to a static front page and assign the front and posts pages.
	$starter_content = array(
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
				),


	// 1.11.Assign a menu to the "social" location.
	'social' => array(
		'name' => __( 'Social Links Menu', 'twentyseventeen' ),
		'items' => array(
			'link_facebook',
			'link_twitter',
			'link_instagram',
			'link_vimeo',
			'link_linkedin'
		),
	),
	
	);	
		

}

add_action( 'after_setup_theme', 'andrepenna_theme_setup' );

require get_template_directory() . '/bootstrap-navwalker-master/bootstrap-navwalker.php';


/****************************************************************************
2.Filtra o comprimento to the_exercpt para 13 palavras (aprox. 2 linhas)
****************************************************************************/

/**
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 9 );


/****************************************************************************
3. Adiciona as open graph tags no Header
****************************************************************************/

function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');
 
//Lets add Open Graph Meta Info
 
function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
        return;
        echo '<meta property="fb:admins" content="Andre Penna Kitesurf Trips"/>';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="Andre Penna Kitesurf Trips"/>';
				echo '<meta property="og:image" content="' . get_the_post_thumbnail() . '"/>';
				// echo '<meta property="og:image" content="' . $default_image . '"/>';
//     if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
//         $default_image = get_template_directory_uri() . '/images/marca-a-isca.png'; //replace this with a default image on your server or an image in your media library
//         echo '<meta property="og:image" content="' . $default_image . '"/>';
//     }
//     else{
//         $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
//         echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
//     }
//     echo "
// ";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

/****************************************************************************
4.Registra: Popper; Bootstrap CSS; JQuery; Font-Awesome; JSocials; 
Estilos do site (style.css); Image-Grid (CSS); Google Fonts; Bootstrap JS
****************************************************************************/

// function wpt_register_popper() {
// 	wp_register_script('popper.min.js', get_template_directory_uri() . '/scripts/popper.min.js', 'jquery', 'false', true);
// 	wp_enqueue_script('popper.min.js');
// }
// add_action('wp_enqueue_scripts', 'wpt_register_popper');

function wp_register_bootstrap_js() {
    wp_register_script('bootstrap.bundle.min', get_template_directory_uri() . '/bootstrap-5.0.0-beta3-dist/js/bootstrap.bundle.min.js', 'jquery', 'false', true);
    wp_enqueue_script('bootstrap.bundle.min');
}
add_action( 'wp_enqueue_scripts', 'wp_register_bootstrap_js' );

//include jquery to load more in loop-blog.php (blog/novidades) 
function register_jquery() {
	wp_register_script('jquery-3.6.0.min.js', get_template_directory_uri() . '/scripts/jquery-3.6.0.min.js', 'jquery', 'false', true);
	wp_enqueue_script('jquery-3.6.0.min.js');
}
add_action('wp_enqueue_scripts', 'register_jquery');

function wp_register_bootstrap_css() {
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/bootstrap-5.0.0-beta3-dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap.min');
}
add_action( 'wp_enqueue_scripts', 'wp_register_bootstrap_css' );

function wp_register_bootstrap_icons() {
    wp_register_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css');
    wp_enqueue_style('bootstrap-icons');
}
add_action( 'wp_enqueue_scripts', 'wp_register_bootstrap_icons' );

function register_css() {
    wp_register_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'register_css');	

function wp_register_scripts() {
    wp_register_script('scripts', get_template_directory_uri() . '/scripts/scripts.js', 'jquery', 'false', true);
    wp_enqueue_script('scripts');
}
add_action( 'wp_enqueue_scripts', 'wp_register_scripts' );


/****************************************************************************
5.Botão Load More Posts de Eventos na Home (loop-front-page.php)
****************************************************************************/
//USe wp_ajax & wp_ajax_nopriv to enable ajax action "load_posts_by_ajax"
//With this defined, we can request on the javascript side the action "load_posts_by_ajax"

add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'rotas', 
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'order' => 'DESC',
        'paged' => $paged,
    );
    $my_posts = new WP_Query( $args );
    if ( $my_posts->have_posts() ) :
        ?>
        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-5 mx-auto">
					<div id=post-<?php the_ID(); ?> <?php post_class('card'); ?>>
						<?php echo get_the_post_thumbnail('post-thumbnail'); ?>
						<div class="card-header d-flex flex-row justify-content-center">
							<h3 class="mb-0"><?php the_title(); ?></h3>
						</div>
						<div class="card-body p-4 bg-white">
							<span class="d-flex flex-column">
								<?php the_excerpt(); ?>
								<a 
								class="btn btn-solido w-50 mx-auto" 
								href="<?php echo home_url(); ?>/about">
								saiba mais
							</a>
						</span>	
						</div>
					</div>            
				</div>           
                
        <?php endwhile; 
        wp_reset_postdata(); 

    endif; 
    wp_die(); 

}
?>
