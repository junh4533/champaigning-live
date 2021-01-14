<?php

function load_stylesheets()
{
    // Bootstrap CSS 
    wp_register_style('bootstrap4', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap4');
    // Compiled CSS
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

function load_scripts()
{
    // Bootstrap js + Popper.js
    wp_register_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js', false, true);
    // Font Awesome 6
    wp_register_script('font-awesome6', 'https://kit.fontawesome.com/7737a0af7b.js', false, true); 
    // Custom js
    wp_register_script('custom-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, 'all'); 
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-bundle');
    wp_enqueue_script('font-awesome6');
    wp_enqueue_script('custom-js');
}

add_theme_support( 'post-thumbnails' );
add_action('wp_enqueue_scripts', 'load_stylesheets');
add_action('wp_enqueue_scripts', 'load_scripts');