<?php
/**
 * Title: archive-product
 * Slug: /archive-product
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"backgroundColor":"custom-transparent","layout":{"type":"constrained"}} -->
<main class="wp-block-group has-custom-transparent-background-color has-background" style="padding-right:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/breadcrumbs /-->

<!-- wp:query-title {"type":"archive","showPrefix":false,"align":"wide"} /-->

<!-- wp:term-description {"align":"wide"} /-->

<!-- wp:woocommerce/store-notices /-->

<!-- wp:group {"className":"alignwide","style":{"border":{"width":"2px","color":"#b99658","radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}},"backgroundColor":"custom-transparent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide has-border-color has-custom-transparent-background-color has-background" style="border-color:#b99658;border-width:2px;border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px"><!-- wp:woocommerce/product-results-count {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}},"textColor":"custom-white"} /-->

<!-- wp:woocommerce/catalog-sorting {"textColor":"custom-white","style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}}} /-->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":[],"isProductCollectionBlock":true,"perPage":9,"pages":0,"offset":0,"postType":"product","orderBy":"random","author":"","search":"","exclude":[],"sticky":"","inherit":false,"featured":false,"woocommerceOnSale":false,"woocommerceHandPickedProducts":[],"filterable":false,"relatedBy":{"categories":true,"tags":true}},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Les produits dépendront de la page consultée."},"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:woocommerce/product-template {"backgroundColor":"custom-transparent"} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"}},"border":{"width":"2px"}},"backgroundColor":"custom-turquoise","borderColor":"custom-or","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-custom-or-border-color has-custom-turquoise-background-color has-background" style="border-width:2px;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:woocommerce/product-image {"showSaleBadge":false,"imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"height":"","style":{"dimensions":{"aspectRatio":"3/4"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"},"margin":{"top":"0","bottom":"0"}}}} -->
<!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"grid","columnCount":1,"minimumColumnWidth":null}} -->
<div class="wp-block-group" style="min-height:100%;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)"><!-- wp:woocommerce/product-sale-badge {"isDescendentOfQueryLoop":true,"align":"right","backgroundColor":"custom-or","textColor":"custom-black","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-black"}}},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

<!-- wp:group {"style":{"layout":{"selfStretch":"fill","flexSize":null},"dimensions":{"minHeight":"90%"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"backgroundColor":"custom-transparent","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"bottom"}} -->
<div class="wp-block-group has-custom-transparent-background-color has-background" style="min-height:90%;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-title {"textAlign":"center","isLink":true,"className":"product-name","style":{"typography":{"lineHeight":"1.4","fontSize":"45px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}},"textColor":"custom-white","fontFamily":"hylia-serif-beta","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-image -->

<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"right":"0","left":"0","top":"0","bottom":"var:preset|spacing|30"}},"color":{"gradient":"linear-gradient(0deg,rgba(0,0,0,0.3) 0%,rgba(255,255,255,0) 100%)"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background:linear-gradient(0deg,rgba(0,0,0,0.3) 0%,rgba(255,255,255,0) 100%);padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","backgroundColor":"custom-transparent","textColor":"custom-white","fontFamily":"hylia-serif-beta","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"var:preset|spacing|20"}},"typography":{"fontSize":"32px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-white"}}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-template -->

<!-- wp:separator {"className":"is-style-dots","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"backgroundColor":"custom-or"} -->
<hr class="wp-block-separator has-text-color has-custom-or-color has-alpha-channel-opacity has-custom-or-background-color has-background is-style-dots" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)"/>
<!-- /wp:separator -->

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