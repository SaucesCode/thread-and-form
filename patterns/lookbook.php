<?php
/**
 * Title: Capsule Lookbook Banner
 * Slug: thread-and-form/lookbook
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="tf-section">
    <div class="tf-shell">
        <div class="tf-lookbook-banner tf-reveal">
            <img class="tf-lookbook-bg" 
                 src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campaign.png' ) ); ?>" 
                 alt="<?php esc_attr_e( 'Autumn Winter Lookbook Editorial', 'thread-and-form' ); ?>"
                 loading="lazy">

            <div class="tf-lookbook-content">
                <span class="tf-lookbook-tag"><?php esc_html_e( 'Atelier Visual Essay / Vol. 01', 'thread-and-form' ); ?></span>
                <h2 class="tf-lookbook-title"><?php esc_html_e( 'The Art of the Oversized Silhouette', 'thread-and-form' ); ?></h2>
                <p class="tf-lookbook-desc">
                    <?php esc_html_e( 'How relaxed tailoring and tactile natural fibers combine to create an effortless daily uniform. Built for quiet mornings and long evenings alike.', 'thread-and-form' ); ?>
                </p>

                <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>" class="tf-btn tf-btn-light">
                    <span><?php esc_html_e( 'View the Visual Essay', 'thread-and-form' ); ?></span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
