<?php

function montheme_init() {
    register_taxonomy('nationalite', 'recipe', [
        'labels' => [
            'name' => 'Nationalité',
            'singular_name' => 'Nationalité',
            'plural_name' => 'Nationalitiés',
            'search_item' => 'Rechercher une nationalité',
            'all_items' => 'Toutes les nationalités',
            'edit_item' => 'Éditer la nationalité',
            'update_item' => 'Mettre à jour la nationalité',
            'add_new_item' => 'Ajouter une nouvelle nationalité',
            'new_item_name' => 'Ajouter une nouvelle nationalité',
            'menu_name' => 'Nationalité',
            'name_field_description' => 'Nom de la nationalité du plat'
        ],
        'show_in_rest' => true,
        'hierarchical' => true,
        'public' => true,
    ]);

    register_post_type('recipe', [
        'label' => 'Recettes',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-food',
        'supports' => ['title', 'thumbnail', 'comments'],
    ]);

    wp_insert_term('Mexicain', 'nationalite');
    wp_insert_term('Asiatique', 'nationalite');
    wp_insert_term('Chinois', 'nationalite');
    wp_insert_term('Créole', 'nationalite');
    wp_insert_term('Français', 'nationalite');
    wp_insert_term('Indien', 'nationalite');
    wp_insert_term('Italien', 'nationalite');
    wp_insert_term('Marocain', 'nationalite');
    wp_insert_term('Mexicain', 'nationalite');
    wp_insert_term('Sénégalais', 'nationalite');
};


function wphetic_theme_support () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
};

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() ); /* enqueues style.css */
};

function site_router(){
    $root =  str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
    $url = str_replace($root, '', $_SERVER['REQUEST_URI']);
    $url = explode('/', $url);
    if (count($url) == 2 && $url[0] == 'login'){
        require 'tpl-login.php';
        die();
    } else if (count($url) == 2 && $url[0] == 'register'){
        require 'tpl-register.php';
        die();
    } else if (count($url) == 2 && $url[0] == 'logout'){
        wp_logout();
        header('location:'.$root);
        die();
    }
};

add_filter('show_admin_bar', '__return_false');

add_action('init', 'montheme_init');
add_action("after_setup_theme", "wphetic_theme_support");
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
add_action('send_headers', 'site_router');

require_once('metaboxes/recipes.php');

RecipesMetaBox::register();