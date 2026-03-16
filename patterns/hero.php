<?php
/**
 * Title: Hero Section
 * Slug: zeldaskywardsword/hero
 * Categories: featured
 * Keywords: hero, banner, accueil
 * Description: Une section hero avec titre, sous-titre et bouton d'action.
 */
?>

<!-- wp:cover {"dimRatio":50,"minHeight":500,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:500px">
  <span
    aria-hidden="true"
    class="wp-block-cover__background has-background-dim"
  ></span>
  <div class="wp-block-cover__inner-container">
    <!-- wp:heading {"textAlign":"center","level":1} -->
    <h1 class="wp-block-heading has-text-align-center">
      Bienvenue sur notre site
    </h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">
      Découvrez nos services et notre expertise.
    </p>
    <!-- /wp:paragraph -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
    <div class="wp-block-buttons">
      <!-- wp:button -->
      <div class="wp-block-button">
        <a class="wp-block-button__link wp-element-button">En savoir plus</a>
      </div>
      <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
  </div>
</div>
<!-- /wp:cover -->