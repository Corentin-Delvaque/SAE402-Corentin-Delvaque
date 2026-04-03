<?php
/**
 * Title: header
 * Slug: /header
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"header","align":"full","className":"wc-blocks-pattern-header-essential wc-blocks-header-pattern","style":{"spacing":{"padding":{"right":"var:preset|spacing|70","left":"var:preset|spacing|70","top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|30","margin":{"top":"0","bottom":"0"}}},"backgroundColor":"custom-black","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<header
    class="wp-block-group alignfull wc-blocks-pattern-header-essential wc-blocks-header-pattern has-custom-black-background-color has-background"
    style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--70)">
    <!-- wp:pattern {"slug":"/model-3-d"} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"backgroundColor":"custom-transparent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div class="wp-block-group has-custom-transparent-background-color has-background">
        <!-- wp:navigation {"textColor":"custom-or","icon":"menu","hasIcon":false,"overlayBackgroundColor":"custom-turquoise","overlayTextColor":"custom-or","metadata":{"ignoredHookedBlocks":["woocommerce/customer-account","woocommerce/mini-cart"]},"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"layout":{"selfStretch":"fit","flexSize":null}},"fontSize":"navigation","fontFamily":"hylia-serif-beta","layout":{"type":"flex","flexWrap":"wrap","orientation":"horizontal"}} /-->

        <!-- wp:woocommerce/mini-cart {"priceColor":{"color":"#020203","name":"Ink","slug":"custom-black","class":"has-custom-black-price-color"},"iconColor":{"color":"#b99658","name":"Or","slug":"custom-or","class":"has-custom-or-product-count-color"},"productCountColor":{"color":"#b99658","name":"Gold","slug":"custom-or","class":"has-custom-or-product-count-color"},"productCountVisibility":"always","fontFamily":"inter","fontSize":"navigation"} /-->

        <!-- wp:group {"className":"mycred-my-balance-wrapper-container","style":{"spacing":{"padding":{"top":"0","bottom":"0","right":"0","left":"0rem"},"margin":{"top":"0","bottom":"0"},"blockGap":"1000em"}},"backgroundColor":"custom-transparent","layout":{"type":"constrained"}} -->
        <div class="wp-block-group mycred-my-balance-wrapper-container has-custom-transparent-background-color has-background"
            style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0rem">
            <!-- wp:html -->
            <div class="mycred-vide">ㅤ</div>
            <!-- /wp:html -->

            <!-- wp:shortcode -->
            [mycred_my_balance]
            <!-- /wp:shortcode -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</header>
<!-- /wp:group -->
