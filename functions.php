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


add_filter( 'block_editor_settings_all', function( $settings ) {
    $settings['__experimentalFeatures']['useRootPaddingAwareAlignments'] = true;
    return $settings;
});

/**
 * Retourne l'URL d'un asset du jeu p5.js.
 *
 * @param string $path Chemin relatif dans assets/jeu-video.
 * @return string
 */
function zeldaskywardsword_game_asset_url( $path ) {
    return trailingslashit( get_theme_file_uri( 'assets/jeu-video' ) ) . ltrim( $path, '/' );
}

/**
 * Enregistre et charge les assets du jeu p5.js.
 *
 * Le jeu est limité à la page d'accueil / page blog / page ressources pour éviter de charger
 * le canvas et le code MyCRED partout sur le site.
 *
 * @return void
 */
function zeldaskywardsword_enqueue_game_assets() {
    if ( ! is_front_page() && ! is_home() && ! is_page( 'ressources' ) ) {
        return;
    }

    $theme_version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style(
        'zeldaskywardsword-game-style',
        zeldaskywardsword_game_asset_url( 'style.css' ),
        array(),
        $theme_version
    );

    wp_enqueue_script(
        'p5js',
        'https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/p5.min.js',
        array(),
        '1.9.0',
        true
    );

    wp_enqueue_script(
        'p5js-sound',
        'https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.9.0/addons/p5.sound.min.js',
        array( 'p5js' ),
        '1.9.0',
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-config',
        zeldaskywardsword_game_asset_url( 'script-config.js' ),
        array( 'p5js', 'p5js-sound' ),
        $theme_version,
        true
    );

    wp_localize_script(
        'zeldaskywardsword-game-config',
        'zeldaskywardswordGame',
        array(
            'assetBaseUrl' => trailingslashit( get_theme_file_uri( 'assets/jeu-video' ) ),
            'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
            'nonce'        => wp_create_nonce( 'give_rubies_nonce' ),
            'action'       => 'give_rubies',
        )
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-bg',
        zeldaskywardsword_game_asset_url( 'script-bg.js' ),
        array( 'zeldaskywardsword-game-config' ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-element',
        zeldaskywardsword_game_asset_url( 'script-element.js' ),
        array( 'zeldaskywardsword-game-config' ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-interaction',
        zeldaskywardsword_game_asset_url( 'script-interaction.js' ),
        array( 'zeldaskywardsword-game-config' ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-overlay',
        zeldaskywardsword_game_asset_url( 'script-overlay.js' ),
        array(
            'zeldaskywardsword-game-config',
            'zeldaskywardsword-game-element',
            'zeldaskywardsword-game-interaction',
        ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-sound',
        zeldaskywardsword_game_asset_url( 'script-sound.js' ),
        array( 'zeldaskywardsword-game-config', 'p5js-sound' ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game-perso',
        zeldaskywardsword_game_asset_url( 'script-perso.js' ),
        array(
            'zeldaskywardsword-game-config',
            'zeldaskywardsword-game-element',
            'zeldaskywardsword-game-sound',
        ),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'zeldaskywardsword-game',
        zeldaskywardsword_game_asset_url( 'script.js' ),
        array(
            'p5js',
            'p5js-sound',
            'zeldaskywardsword-game-config',
            'zeldaskywardsword-game-bg',
            'zeldaskywardsword-game-element',
            'zeldaskywardsword-game-interaction',
            'zeldaskywardsword-game-overlay',
            'zeldaskywardsword-game-sound',
            'zeldaskywardsword-game-perso',
        ),
        $theme_version,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'zeldaskywardsword_enqueue_game_assets' );

/**
 * Attribue les points MyCRED correspondant au score du joueur.
 *
 * @return void
 */
function zeldaskywardsword_give_rubies_callback() {
    if ( ! is_user_logged_in() ) {
        wp_send_json_error(
            array( 'message' => 'Utilisateur non connecté.' ),
            401
        );
    }

    if (
        ! isset( $_POST['nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'give_rubies_nonce' )
    ) {
        wp_send_json_error(
            array( 'message' => 'Erreur de sécurité.' ),
            403
        );
    }

    $user_id = get_current_user_id();
    $score   = isset( $_POST['score'] ) ? absint( wp_unslash( $_POST['score'] ) ) : 0;

    if ( $score <= 0 ) {
        wp_send_json_error(
            array( 'message' => 'Score invalide.' ),
            400
        );
    }

    if ( ! function_exists( 'mycred_add' ) ) {
        wp_send_json_error(
            array( 'message' => 'MyCRED n\'est pas actif.' ),
            500
        );
    }

    mycred_add(
        'game_reward',
        $user_id,
        $score,
        'Gain via jeu p5js'
    );

    wp_send_json_success(
        array(
            'message' => sprintf( '%d point%s ajout%s.', $score, $score > 1 ? 's' : '', $score > 1 ? 'és' : 'é' ),
            'score'   => $score,
        )
    );
}

add_action( 'wp_ajax_give_rubies', 'zeldaskywardsword_give_rubies_callback' );
add_action( 'wp_ajax_nopriv_give_rubies', 'zeldaskywardsword_give_rubies_callback' );
