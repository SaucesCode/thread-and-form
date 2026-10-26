<?php
/**
 * Title: Featured Collection
 * Slug: thread-and-form/collection
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section id="collection" class="tf-section">
    <div class="tf-shell">
        <!-- Section Header with Title and Category Filters -->
        <div class="tf-section-header tf-reveal">
            <div class="tf-section-title-wrap">
                <h2><?php esc_html_e( 'The Core Rotation', 'thread-and-form' ); ?></h2>
                <p class="tf-section-subtitle"><?php esc_html_e( 'Meticulously balanced pieces engineered for everyday utility and tactile comfort.', 'thread-and-form' ); ?></p>
            </div>

            <!-- Interactive Category Filter Pills -->
            <div class="tf-filter-nav" role="tablist" aria-label="<?php esc_attr_e( 'Filter Collection', 'thread-and-form' ); ?>">
                <button type="button" class="tf-filter-pill is-active" data-filter="all"><?php esc_html_e( 'All Pieces', 'thread-and-form' ); ?></button>
                <button type="button" class="tf-filter-pill" data-filter="overshirt"><?php esc_html_e( 'Overshirts', 'thread-and-form' ); ?></button>
                <button type="button" class="tf-filter-pill" data-filter="tee"><?php esc_html_e( 'Tees', 'thread-and-form' ); ?></button>
                <button type="button" class="tf-filter-pill" data-filter="trousers"><?php esc_html_e( 'Trousers', 'thread-and-form' ); ?></button>
            </div>
        </div>

        <?php if ( class_exists( 'WooCommerce' ) && function_exists( 'is_woocommerce' ) ) : ?>
            <!-- WooCommerce Native Integration -->
            <div class="tf-woocommerce-wrapper">
                <!-- wp:shortcode -->[products limit="6" columns="3" orderby="date" order="ASC"]<!-- /wp:shortcode -->
            </div>
        <?php else : ?>
            <!-- Curated Flagship Product Grid -->
            <div class="tf-collection-grid">
                
                <!-- Product 1: The Everyday Overshirt -->
                <article class="tf-product-card tf-reveal" 
                         data-category="overshirt" 
                         data-category-label="Layering & Outerwear"
                         data-desc="<?php esc_attr_e( 'Tailored from heavyweight 320gsm GOTS organic cotton twill. Features concealed horn buttons, twin utility chest pockets, and a generous boxy cut designed for effortless trans-seasonal layering.', 'thread-and-form' ); ?>">
                    <div class="tf-product-media">
                        <div class="tf-product-badge-group">
                            <span class="tf-product-badge"><?php esc_html_e( 'Capsule 01', 'thread-and-form' ); ?></span>
                            <span class="tf-product-badge" style="background:#fef3c7;color:#92400e;"><?php esc_html_e( 'Organic Twill', 'thread-and-form' ); ?></span>
                        </div>

                        <button type="button" class="tf-wishlist-toggle" aria-label="<?php esc_attr_e( 'Add to Wishlist', 'thread-and-form' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>

                        <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/overshirt.png' ) ); ?>" 
                             alt="<?php esc_attr_e( 'The Everyday Overshirt in Deep Navy', 'thread-and-form' ); ?>" 
                             loading="lazy" 
                             width="1024" 
                             height="1280">

                        <div class="tf-quick-actions-bar">
                            <button type="button" class="tf-quick-view-trigger">
                                <?php esc_html_e( 'Quick View', 'thread-and-form' ); ?>
                            </button>
                        </div>
                    </div>

                    <div class="tf-product-details">
                        <div class="tf-product-meta-row">
                            <span class="tf-product-cat"><?php esc_html_e( 'Overshirts', 'thread-and-form' ); ?></span>
                            <div class="tf-product-swatches" title="<?php esc_attr_e( 'Available colors', 'thread-and-form' ); ?>">
                                <span class="tf-swatch is-active" data-color="Deep Navy" style="background-color: #152b43;"></span>
                                <span class="tf-swatch" data-color="Raw Ecru" style="background-color: #f4f1ea;"></span>
                                <span class="tf-swatch" data-color="Washed Slate" style="background-color: #526578;"></span>
                            </div>
                        </div>

                        <h3 class="tf-product-title">
                            <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'The Everyday Overshirt', 'thread-and-form' ); ?></a>
                        </h3>

                        <div class="tf-product-price-row">
                            <span class="tf-product-price"><?php esc_html_e( '$185.00', 'thread-and-form' ); ?></span>
                            <span class="tf-card-view-link">
                                <?php esc_html_e( 'Details', 'thread-and-form' ); ?>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- Product 2: The Essential Tee -->
                <article class="tf-product-card tf-reveal tf-delay-1" 
                         data-category="tee" 
                         data-category-label="First Layers"
                         data-desc="<?php esc_attr_e( 'Milled from 220gsm long-staple organic cotton with a dry, substantial hand feel. Reinforced ribbed collar engineered to resist stretching, finished with blind-stitched cuffs and hem.', 'thread-and-form' ); ?>">
                    <div class="tf-product-media">
                        <div class="tf-product-badge-group">
                            <span class="tf-product-badge"><?php esc_html_e( 'Best Seller', 'thread-and-form' ); ?></span>
                            <span class="tf-product-badge" style="background:#e0f2fe;color:#0369a1;"><?php esc_html_e( '220 GSM', 'thread-and-form' ); ?></span>
                        </div>

                        <button type="button" class="tf-wishlist-toggle" aria-label="<?php esc_attr_e( 'Add to Wishlist', 'thread-and-form' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>

                        <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/tee.png' ) ); ?>" 
                             alt="<?php esc_attr_e( 'The Essential Tee in Chalk White', 'thread-and-form' ); ?>" 
                             loading="lazy" 
                             width="1024" 
                             height="1280">

                        <div class="tf-quick-actions-bar">
                            <button type="button" class="tf-quick-view-trigger">
                                <?php esc_html_e( 'Quick View', 'thread-and-form' ); ?>
                            </button>
                        </div>
                    </div>

                    <div class="tf-product-details">
                        <div class="tf-product-meta-row">
                            <span class="tf-product-cat"><?php esc_html_e( 'Tees', 'thread-and-form' ); ?></span>
                            <div class="tf-product-swatches" title="<?php esc_attr_e( 'Available colors', 'thread-and-form' ); ?>">
                                <span class="tf-swatch is-active" data-color="Chalk White" style="background-color: #ffffff;"></span>
                                <span class="tf-swatch" data-color="Heather Ash" style="background-color: #d1d5db;"></span>
                                <span class="tf-swatch" data-color="Ink Black" style="background-color: #11141a;"></span>
                            </div>
                        </div>

                        <h3 class="tf-product-title">
                            <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'The Essential Tee', 'thread-and-form' ); ?></a>
                        </h3>

                        <div class="tf-product-price-row">
                            <span class="tf-product-price"><?php esc_html_e( '$75.00', 'thread-and-form' ); ?></span>
                            <span class="tf-card-view-link">
                                <?php esc_html_e( 'Details', 'thread-and-form' ); ?>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </article>

                <!-- Product 3: The Studio Trouser -->
                <article class="tf-product-card tf-reveal tf-delay-2" 
                         data-category="trousers" 
                         data-category-label="Tailoring & Trousers"
                         data-desc="<?php esc_attr_e( 'High-waisted, wide-leg trouser cut from a crisp 55% linen and 45% organic cotton blend. Features double inverted pleats, slanted side pockets, and an internal adjustable tab for customized fit.', 'thread-and-form' ); ?>">
                    <div class="tf-product-media">
                        <div class="tf-product-badge-group">
                            <span class="tf-product-badge"><?php esc_html_e( 'Signature Fit', 'thread-and-form' ); ?></span>
                            <span class="tf-product-badge" style="background:#ecfdf5;color:#047857;"><?php esc_html_e( 'Linen-Cotton', 'thread-and-form' ); ?></span>
                        </div>

                        <button type="button" class="tf-wishlist-toggle" aria-label="<?php esc_attr_e( 'Add to Wishlist', 'thread-and-form' ); ?>">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </button>

                        <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/trousers.png' ) ); ?>" 
                             alt="<?php esc_attr_e( 'The Studio Trouser in Mist Blue', 'thread-and-form' ); ?>" 
                             loading="lazy" 
                             width="1024" 
                             height="1280">

                        <div class="tf-quick-actions-bar">
                            <button type="button" class="tf-quick-view-trigger">
                                <?php esc_html_e( 'Quick View', 'thread-and-form' ); ?>
                            </button>
                        </div>
                    </div>

                    <div class="tf-product-details">
                        <div class="tf-product-meta-row">
                            <span class="tf-product-cat"><?php esc_html_e( 'Trousers', 'thread-and-form' ); ?></span>
                            <div class="tf-product-swatches" title="<?php esc_attr_e( 'Available colors', 'thread-and-form' ); ?>">
                                <span class="tf-swatch is-active" data-color="Mist Blue" style="background-color: #9eb8cb;"></span>
                                <span class="tf-swatch" data-color="Warm Sand" style="background-color: #d5cbba;"></span>
                                <span class="tf-swatch" data-color="Obsidian" style="background-color: #11141a;"></span>
                            </div>
                        </div>

                        <h3 class="tf-product-title">
                            <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'The Studio Trouser', 'thread-and-form' ); ?></a>
                        </h3>

                        <div class="tf-product-price-row">
                            <span class="tf-product-price"><?php esc_html_e( '$165.00', 'thread-and-form' ); ?></span>
                            <span class="tf-card-view-link">
                                <?php esc_html_e( 'Details', 'thread-and-form' ); ?>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </span>
                        </div>
                    </div>
                </article>

            </div>
        <?php endif; ?>
    </div>
</section>
