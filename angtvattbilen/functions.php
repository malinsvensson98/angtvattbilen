<?php

// För huvudmeny, add_actions är en wp-funktion 
// Det första ordet är vad vi ska göra 
// Det andra ordet är vad som ska göras 
add_action ('init', 'register_my_menu'); 

function register_my_menu() { 
    register_nav_menu('main-nav', __("Huvudmeny")); 
}

// Stöd för thumbnails 
add_theme_support( 'post-thumbnails' );


// För att godkänna inlägg 
add_action( 'admin_init','reset_guest_caps' ,9 );
function reset_guest_caps(){
    global $current_user, $wpcf_access;
    if(isset($_GET['formid']) && $_GET['formid']==12345&&$current_user->ID==0)
    {
        $wpcf_access->settings=array();
    }
}

// Visa rubrik ovanför adressfält 
function work_feautures() { 
    add_theme_support('title-tag'); 
}

add_action('after_setup_theme', 'work_feautures'); 


// För att välja antal rader i tabellen per sida
add_action('pre_get_posts', 'work_adjust_queries'); 

function work_adjust_queries($query) { 
if(!is_admin() AND is_post_type_archive('work')) { 
    $query->set('posts_per_page', '10'); 
}}

// Samlade filer
function work_files() { 

    // Font-awesome 
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'); 

    // För att ladda in CSS-fil 
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    // JS  
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );

    wp_localize_script('script', 'workData', array( 
    'root_url' => get_site_url(), 
    'nonce' => wp_create_nonce('wp_rest'), 
)); 
}

add_action('wp_enqueue_scripts', 'work_files'); 


// Skapa egna fält till rest API
add_action('rest_api_init', 'register_custom_fields');

function register_custom_fields() { 

    register_rest_field('work', 'kundnamn', array(
        'get_callback' => function() { 
            return $kundnamn=get_post_meta(get_the_ID(), 'kundnamn', true); 
        }    )); 

    register_rest_field('work', 'adress', array(
        'get_callback' => function() { 
            return $adress=get_post_meta(get_the_ID(), 'adress', true); 
        }
    )); 
    register_rest_field('work', 'datum', array(
        'get_callback' => function() { 
            return $adress=get_post_meta(get_the_ID(), 'datum', true); 
        }
    )); 

    register_rest_field('work', 'typ_av_arbete', array(
        'get_callback' => function() { 
            return $adress=get_post_meta(get_the_ID(), 'typ_av_arbete', true); 
        }
    )); 
    register_rest_field('work', 'produkter', array(
        'get_callback' => function() { 
            return $adress=get_post_meta(get_the_ID(), 'produkter', true); 
        }
    )); 
    register_rest_field('work', 'beskrivning', array(
        'get_callback' => function() { 
            return $adress=get_post_meta(get_the_ID(), 'beskrivning', true); 
        }
    )); 
    register_rest_field('work', 'inlagd_av', array(
        'get_callback' => function() { 
            return the_author(); 
        }
    )); 
}

