<?php
/**
 * Title: 404 Archival Notice
 * Slug: thread-and-form/404
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="tf-section" style="min-height:55vh;display:flex;align-items:center;">
    <div class="tf-shell tf-reveal" style="text-align:center;max-width:640px;margin-inline:auto;">
        <span class="tf-pill-badge" style="margin-inline:auto;">
            <span class="tf-badge-dot"></span>
            <?php esc_html_e( '404 — Archival Notice', 'thread-and-form' ); ?>
        </span>
        <h1 class="tf-page-title" style="margin-top:1.5rem;font-size:clamp(2.5rem, 5vw, 4rem);font-family:var(--tf-font-serif);font-weight:500;">
            <?php esc_html_e( 'A Little Off Course.', 'thread-and-form' ); ?>
        </h1>
        <p class="tf-page-lead" style="margin-bottom:2.5rem;color:var(--tf-muted);line-height:1.7;">
            <?php esc_html_e( 'The garment, story, or reference you are looking for has been moved or retired from our active rotation.', 'thread-and-form' ); ?>
        </p>
        <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tf-btn tf-btn-primary">
                <span><?php esc_html_e( 'Return to Homepage', 'thread-and-form' ); ?></span>
                <span class="tf-btn-arrow" aria-hidden="true">→</span>
            </a>
            <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>" class="tf-btn tf-btn-secondary">
                <span><?php esc_html_e( 'View Collection', 'thread-and-form' ); ?></span>
            </a>
        </div>
    </div>
</section>
