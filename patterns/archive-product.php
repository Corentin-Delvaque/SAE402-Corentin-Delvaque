<?php
/**
 * Title: archive-product
 * Slug: /archive-product
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","backgroundColor":"custom-transparent","layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group has-custom-transparent-background-color has-background"><!-- wp:woocommerce/breadcrumbs /-->

<!-- wp:query-title {"type":"archive","showPrefix":false,"align":"wide"} /-->

<!-- wp:term-description {"align":"wide"} /-->

<!-- wp:woocommerce/store-notices /-->

<!-- wp:group {"className":"alignwide","style":{"border":{"width":"2px","color":"#b99658","radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}},"backgroundColor":"custom-transparent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide has-border-color has-custom-transparent-background-color has-background" style="border-color:#b99658;border-width:2px;border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px"><!-- wp:woocommerce/product-results-count {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}},"textColor":"custom-white"} /-->

<!-- wp:woocommerce/catalog-sorting {"textColor":"custom-white","style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":[],"isProductCollectionBlock":true,"perPage":10,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Les produits dépendront de la page consultée."},"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:template-part {"slug":"produit"} /-->

<!-- wp:query-pagination {"paginationArrow":"chevron","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-or"}}}},"textColor":"custom-or","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:woocommerce/product-collection-no-results {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-or"}}}},"backgroundColor":"custom-transparent","textColor":"custom-or"} -->
<!-- wp:group {"backgroundColor":"custom-transparent","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group has-custom-transparent-background-color has-background"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><?php /* Translators: 1. is the start of a 'strong' HTML element, 2. is the end of a 'strong' HTML element */ 
echo sprintf( esc_html__( '%1$sAucun résultat%2$s', '' ), '<strong>', '</strong>' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><?php /* Translators: 1. is the start of a 'a' HTML element, 2. is the end of a 'a' HTML element, 3. is the start of a 'a' HTML element, 4. is the end of a 'a' HTML element */ 
echo sprintf( esc_html__( 'Vous pouvez essayer %1$sd’effacer les filtres%2$s ou consulter %3$sl’accueil de notre boutique%4$s', '' ), '<a class="wc-link-clear-any-filters" href="' . esc_url( '#' ) . '">', '</a>', '<a class="wc-link-stores-home" href="' . esc_url( '#' ) . '">', '</a>' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-collection-no-results --></div>
<!-- /wp:woocommerce/product-collection --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->