<?php
/**
 * Title: Quiet Luxury Editorial Hero
 * Slug: thread-and-form/hero
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="tf-hero">
    <div class="tf-shell">
        <div class="tf-hero-grid">
            <!-- Left Editorial Narrative Column -->
            <div class="tf-hero-content">
                <!-- Understated Season Tag -->
                <div class="tf-hero-season-tag">
                    <span><?php esc_html_e( 'VOL. 01 / WINTER CAPSULE', 'thread-and-form' ); ?></span>
                    <span class="tf-tag-sep">—</span>
                    <span><?php esc_html_e( 'PORTO ATELIER', 'thread-and-form' ); ?></span>
                </div>

                <!-- Editorial Headline: High-Contrast Serif Typography -->
                <h1 class="tf-hero-headline">
                    <span class="tf-headline-line"><?php esc_html_e( 'A study in', 'thread-and-form' ); ?></span>
                    <span class="tf-headline-line tf-headline-serif"><em><?php esc_html_e( 'deliberate form.', 'thread-and-form' ); ?></em></span>
                </h1>

                <!-- Body Narrative: Poetic Restraint -->
                <p class="tf-hero-lead">
                    <?php esc_html_e( 'Architectural silhouettes engineered from certified 320 GSM organic cotton twill and raw European flax linen. Cut with generous volume and crafted with quiet restraint to outlast seasonal trends.', 'thread-and-form' ); ?>
                </p>

                <!-- Restrained Luxury Actions -->
                <div class="tf-hero-cta-group">
                    <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>" class="tf-btn-editorial">
                        <span><?php esc_html_e( 'Explore Collection', 'thread-and-form' ); ?></span>
                        <span class="tf-btn-arrow" aria-hidden="true">↗</span>
                    </a>

                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="tf-link-editorial">
                        <span><?php esc_html_e( 'The Studio Manifesto', 'thread-and-form' ); ?></span>
                    </a>
                </div>

                <!-- Atelier Provenance Index: Clean Museum-Grade Exhibition Specs -->
                <div class="tf-spec-grid">
                    <div class="tf-spec-item">
                        <span class="tf-spec-label"><?php esc_html_e( 'MATERIAL', 'thread-and-form' ); ?></span>
                        <span class="tf-spec-value"><?php esc_html_e( '320 GSM GOTS Twill', 'thread-and-form' ); ?></span>
                    </div>
                    <div class="tf-spec-item">
                        <span class="tf-spec-label"><?php esc_html_e( 'PROVENANCE', 'thread-and-form' ); ?></span>
                        <span class="tf-spec-value"><?php esc_html_e( 'Guimarães, Portugal', 'thread-and-form' ); ?></span>
                    </div>
                    <div class="tf-spec-item">
                        <span class="tf-spec-label"><?php esc_html_e( 'STANDARD', 'thread-and-form' ); ?></span>
                        <span class="tf-spec-value"><?php esc_html_e( 'Lifetime Atelier Care', 'thread-and-form' ); ?></span>
                    </div>
                </div>
            </div>

            <!-- Right Visual Column: Pristine Architectural Gallery Framing -->
            <div class="tf-hero-visual">
                <div class="tf-gallery-frame">
                    <div class="tf-gallery-media">
                        <img 
                            src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campaign.png' ) ); ?>" 
                            alt="<?php esc_attr_e( 'Thread & Form Autumn Winter Campaign — The Everyday Uniform', 'thread-and-form' ); ?>"
                            width="819"
                            height="1024"
                            fetchpriority="high"
                            class="tf-gallery-img"
                        >
                    </div>

                    <!-- Editorial Garment Breakdown: High-Fashion Catalogue Caption -->
                    <div class="tf-look-index">
                        <div class="tf-look-index-header">
                            <span class="tf-look-index-num"><?php esc_html_e( 'LOOK 01', 'thread-and-form' ); ?></span>
                            <span class="tf-look-index-dot">•</span>
                            <span class="tf-look-index-name"><?php esc_html_e( 'The Everyday Uniform', 'thread-and-form' ); ?></span>
                        </div>

                        <div class="tf-look-items-list">
                            <!-- Piece 1 -->
                            <div class="tf-look-item-row">
                                <div class="tf-look-item-info">
                                    <span class="tf-look-item-title"><?php esc_html_e( 'The Everyday Overshirt', 'thread-and-form' ); ?></span>
                                    <span class="tf-look-item-meta"><?php esc_html_e( 'Deep Navy • 320 GSM Twill • $185.00', 'thread-and-form' ); ?></span>
                                </div>
                                <button type="button" class="tf-look-action-btn tf-quick-view-trigger" data-product="overshirt">
                                    <?php esc_html_e( 'Quick View', 'thread-and-form' ); ?>
                                </button>
                            </div>

                            <!-- Piece 2 -->
                            <div class="tf-look-item-row">
                                <div class="tf-look-item-info">
                                    <span class="tf-look-item-title"><?php esc_html_e( 'The Studio Trouser', 'thread-and-form' ); ?></span>
                                    <span class="tf-look-item-meta"><?php esc_html_e( 'Pale Blue • Normandy Linen • $165.00', 'thread-and-form' ); ?></span>
                                </div>
                                <button type="button" class="tf-look-action-btn tf-quick-view-trigger" data-product="trouser">
                                    <?php esc_html_e( 'Quick View', 'thread-and-form' ); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
