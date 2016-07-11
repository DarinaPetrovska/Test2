<?php

add_action( 'admin_enqueue_scripts', 'chrome_fix' );
// This theme uses post thumbnails
add_theme_support('post-thumbnails');
add_post_type_support( 'post', 'excerpt' );
function chrome_fix() {

    if ( strpos( $_SERVER[ 'HTTP_USER_AGENT' ], 'Chrome' ) !== false ) {
        wp_add_inline_style( 'wp-admin', '#adminmenu { transform: translateZ(0) }' );
    }
}

/** Hide admin bar on site **/
add_filter('show_admin_bar', '__return_false');
      function load_style_script(){
        wp_enqueue_style('bootstrap_my', get_template_directory_uri() . '/public/css/bootstrap.min.css');
            wp_enqueue_style('bootstrap_mytheme', get_template_directory_uri() . '/public/css/bootstrap-theme.min.css"');
            wp_enqueue_style('fancybox_my', get_template_directory_uri() . '/public/css/jquery.fancybox.css');
            wp_enqueue_style('screen_my', get_template_directory_uri() . '/public/css/screen.css');
            wp_enqueue_style('style_my', get_template_directory_uri() . '/public/css/style.css');
            wp_enqueue_style('style_dev', get_template_directory_uri() . '/style.css');    
  
            wp_enqueue_script('jquery_my', get_template_directory_uri() . '/public/js/jquery.js','','',false );
            wp_enqueue_script('jquery_myfancy', get_template_directory_uri() . '/public/js/jquery.fancybox.pack.js','','',false );  
            wp_enqueue_script('modernizr_js', get_template_directory_uri() . '/public/js/modernizr.custom.js','','',false );       
            wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/public/js/bootstrap.min.js','','',false );
            wp_enqueue_script('typed_js', get_template_directory_uri() . '/public/js/typed.js','','',false );       
            wp_enqueue_script('wow_js', get_template_directory_uri() . '/public/js/wow.min.js','','',false ); 
            wp_enqueue_script('common_my', get_template_directory_uri() . '/public/js/common.js','','',false );     
}	
add_action('wp_enqueue_scripts', 'load_style_script'); 
/*-
Widget
-*/
register_sidebar(array('name' => 'menu', 'id' => 'menu', 'before_widget' => '', 'after_widget'  => ''));

register_sidebar(array('name' => 'Contact text1 footer', 'id' => 'contact_f1', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Contact text2 footer', 'id' => 'contact_f2', 'before_widget' => '', 'after_widget'  => ''));
register_sidebar(array('name' => 'Contact text3 footer', 'id' => 'contact_f3', 'before_widget' => '', 'after_widget'  => ''));

add_filter( 'wpcf7_form_class_attr', 'your_custom_form_class_attr' );
/** Turn on menus  **/
function register_my_menu() {
  register_nav_menu('top-menu',__( 'Top Menu' ));
}
add_action( 'init', 'register_my_menu' );
function register_my_menu2() {
  register_nav_menu('top-menu2',__( 'Top Menu (inner pages)' ));
}
add_action( 'init', 'register_my_menu2' );
/** Get menu items **/
function carat_get_menu_items($menu_name1){
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name1 ] ) ) {
        $menu = wp_get_nav_menu_object( $locations[ $menu_name1 ] );
        return wp_get_nav_menu_items($menu->term_id);
		wp_reset_query();}
}
function your_custom_form_class_attr( $class ) {
	$class .= ' foo bar';
	return $class;
}
wp_localize_script( 'twentyfifteen-script', 'ajax_posts', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'noposts' => __('No older posts found', 'twentyfifteen'),
));

add_action( 'init', 'build_taxonomies', 0 );
function build_taxonomies() {
register_taxonomy(
    'projects',
    'post',
    array(
        'hierarchical' => true,
        'label' => 'Projects',
        'query_var' => true,
        'rewrite' => true
    )
);
}

?>