<?php
/**
 *  zeldaskywardsword - Fichier de fonctions principales
 * Ce fichier contient toutes les fonctions personnalisées du thème,
 * notamment l'enregistrement des styles et scripts.
 *
 * @package zeldaskywardsword
 * @since 1.0.0
 */

// Empêche l'accès direct au fichier
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/**
 * Enregistre et charge la feuille de style principale du thème.
 *
 * Utilise wp_enqueue_style() pour charger style.css avec :
 * - Un identifiant unique 'zeldaskywardsword-style'
 * - Le chemin vers style.css via get_stylesheet_uri()
 * - Aucune dépendance
 * - La version du thème pour le cache-busting
 *
 * @since 1.0.0
 * @return void
 */

function zeldaskywardsword_style() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'zeldaskywardsword-style',                // Identifiant unique du style
        get_stylesheet_uri(),                     // URL vers style.css
        array(),                                  // Pas de dépendances
        $theme_version                            // <--- BUST DU CACHE ULTRA PUISSANT
    );
}
add_action( 'wp_enqueue_scripts', 'zeldaskywardsword_style' );


/**
 * Charge les styles dans l'éditeur Gutenberg.
 *
 * Utilise add_editor_style() qui est la méthode recommandée pour les thèmes FSE.
 * Cette fonction enveloppe automatiquement les styles pour l'éditeur.
 *
 * @since 1.0.0
 * @return void
 */
function zeldaskywardsword_enqueue_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'after_setup_theme', 'zeldaskywardsword_enqueue_editor_styles' );


/**
 * Enregistre et charge le script JavaScript principal du thème.
 *
 * Utilise wp_enqueue_script() pour charger assets/js/app.js avec :
 * - Un identifiant unique 'apple-scripts'
 * - Le chemin vers le fichier via get_template_directory_uri()
 * - Aucune dépendance
 * - La version du thème pour le cache-busting
 * - Chargement dans le footer pour optimiser les performances
 *
 * @since 1.0.0
 * @return void
 */
function zeldaskywardsword_scripts() {
    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'zeldaskywardsword-scripts',                        // Identifiant unique du script
        get_template_directory_uri() . '/assets/js/app.js', // Chemin vers le fichier JS
        array(),                                            // Pas de dépendances
        $theme_version,                                     // <--- BUST DU CACHE ULTRA PUISSANT
        true                                                // Charger dans le footer
    );
}
add_action( 'wp_enqueue_scripts', 'zeldaskywardsword_scripts' );

add_filter( 'block_editor_settings_all', function( $settings ) {
    $settings['__experimentalFeatures']['useRootPaddingAwareAlignments'] = true;
    return $settings;
});


// Enregistre et charge les scripts pour le jeu p5.js


function load_my_game() {

    wp_enqueue_script(
        'p5js',
        'https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/p5.min.js',
        [],
        null,
        true
    );

    wp_enqueue_script(
        'my-game',
        get_template_directory_uri() . '/assets/SideScroller/sketch-SideScroller.js',
        ['p5js'],
        null,
        true
    );

    wp_localize_script('my-game', 'mycred_vars', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('give_rubies_nonce')
    ]);
}

add_action('wp_enqueue_scripts', 'load_my_game');

add_action('wp_ajax_give_rubies', 'give_rubies_callback');

add_action('wp_ajax_nopriv_give_rubies', 'give_rubies_callback');

function give_rubies_callback() {

    if (!is_user_logged_in()) {
        wp_die('Utilisateur non connecté');
    }

    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'give_rubies_nonce')) {
        wp_die('Erreur sécurité');
    }

    $user_id = get_current_user_id();

    $score = isset($_POST['score']) ? intval($_POST['score']) : 0;

    $score = min($score, 100);

    if ($score <= 0) {
        wp_die('Score invalide');
    }

    if (function_exists('mycred_add')) {

        mycred_add(
            'game_reward',
            $user_id,
            $score,
            'Gain via jeu p5js'
        );

        echo "OK : $score rubis ajoutés";

    } else {
        echo "Erreur : myCred non actif";
    }

    wp_die();
}

