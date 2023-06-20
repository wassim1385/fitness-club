<?php

// Link to the queries file
require get_template_directory() . '/inc/queries.php';

//Create the menus
function medfitness_menu() {
    register_nav_menus( array(
        'main-menu' => 'Main menu'
    ) );
}

//HOOK
add_action( 'init', 'medfitness_menu');

// Adds stylesheets & JS files
function medfitness_scripts() {
    //Normalize css
    wp_enqueue_style( 'normalize', get_template_directory_uri() . './css/normalize.css', array(), '8.0.1');
    //Google fonts
    wp_enqueue_style( 'googlefonts', get_template_directory_uri() . './fonts/stylesheet.css', array(), '1.0.0');
    //Slicknav css
    wp_enqueue_style( 'slicknavcss', get_template_directory_uri() . './css/slicknav.min.css', array(), '1.0.10');
    if(basename(get_page_template()) == 'gallery.php') :
    //LightBox css
    wp_enqueue_style( 'lightboxcss', get_template_directory_uri() . './css/lightbox.min.css', array(), '2.11.3');
    endif;
    //Main style
    wp_enqueue_style( 'main style', get_stylesheet_uri(), array('normalize', 'googlefonts'), '1.0.0');
    //Load JS files
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'slicknavjs', get_template_directory_uri() . './js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true );
    if(basename(get_page_template()) == 'gallery.php') :
    wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . './js/lightbox.min.js', array('jquery'), '2.11.3', true );
    endif;
    wp_enqueue_script( 'scripts', get_template_directory_uri() . './js/scripts.js', array('jquery'), '1.0.0', true );
}
//HOOK
add_action( 'wp_enqueue_scripts', 'medfitness_scripts'); //This hook 'wp_enqueue_scripts' needs wp_head() function in header.php file to work

// Enable feature images and other stuff
function medfitness_setup() {
    //Register new image size
    add_image_size( 'square', 350, 350, true );
    add_image_size( 'portrait', 350, 724, true );
    add_image_size( 'box', 400, 375, true );
    add_image_size( 'mediumSize', 700, 400, true );
    add_image_size( 'post', 966, 644, true );
    //Add feature image
    add_theme_support('post-thumbnails');
    // SEO titles
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'medfitness_setup' ); //When the theme is activated and ready!

// Creates a widget zone
function medfitness_widgets() {
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-primary">',
        'after_title' => '</h3>'
    ) );

}
add_action( 'widgets_init', 'medfitness_widgets' );
add_action( 'after_setup_theme', 'medfitness_widgets' );

/** Display the hero image on background in the front page **/
function medfitness_hero_image() {
    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);
    $image = $image_id['url'];

    // Create a false stylesheet
    wp_register_style( 'custom', false);
    wp_enqueue_style('custom');
    $featured_image_css = "
        body.home .site-header{
            background-image: linear-gradient( rgba(0, 0, 0, .6), rgba(0, 0, 0, .6) ), url($image);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
    ";
    wp_add_inline_style( 'custom', $featured_image_css );
}
add_action( 'init', 'medfitness_hero_image');