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


