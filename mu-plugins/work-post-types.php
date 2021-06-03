<?php

// För att skapa en egen post-type 
function work_post_types() { 

// Skapar arbeten
    register_post_type('work', array(
        'has_archive' => true,
        'label' => __('Custom Post Type'), 
        'show_in_rest' => true,
        'supports' => array('title', 'custom_fields', 'page-attributes'),
        'public' => true, 
        'show_ui' => true,
        'labels' => array(
            'name' => 'Spara arbeten', // Namn på flik i wp
            'add_new_item' => 'Spara ett arbete', // Rubrik för undersida i wp
            'edit_item' => 'Ändra sparat arbete', // Rubrik vid ändring av data
            'all_items' => 'Alla sparade arbeten', // Hover
            'singular_name' => 'Arbete'
        ), 
        'menu_icon' => 'dashicons-calendar'
    )); 


// Inköpslistan
    register_post_type('buy', array(
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'public' => true, 
        'show_ui' => true,
        'labels' => array(
            'name' => 'Inköpslistan', // Namn på flik i wp
            'add_new_item' => 'Lägg till inköp', // Rubrik för undersida i wp
            'edit_item' => 'Ändra på inköp', // Rubrik vid ändring av data
            'all_items' => 'Allt som ska köpas', // Hover
            'singular_name' => 'Inköpslistan'
        ), 
        'menu_icon' => 'dashicons-cart'
    )); 


}


add_action('init', 'work_post_types'); 



?>