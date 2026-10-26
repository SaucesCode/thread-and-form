<?php
/**
 * Title: Shipping and Returns Page
 * Slug: thread-and-form/shipping-returns-page
 * Categories: thread-and-form
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<div class="tf-shell tf-section">
    <div class="tf-page-header tf-reveal">
        <span class="tf-pill-badge">
            <span class="tf-badge-dot"></span>
            <?php esc_html_e( 'Studio Logistics', 'thread-and-form' ); ?>
        </span>
        <h1 class="tf-page-title"><?php esc_html_e( 'From Our Studio to Your Wardrobe.', 'thread-and-form' ); ?></h1>
        <p class="tf-page-lead">
            <?php esc_html_e( 'Every order is hand-inspected, wrapped in unbleached acid-free tissue paper, and dispatched with zero single-use plastics.', 'thread-and-form' ); ?>
        </p>
    </div>

    <div class="tf-values-grid tf-reveal" style="margin-bottom:4rem;">
        <div class="tf-value-card">
            <h3><?php esc_html_e( 'Carbon-Neutral Delivery', 'thread-and-form' ); ?></h3>
            <p><?php esc_html_e( 'Complimentary global shipping on all orders over $150. Dispatched within 24 business hours from our Porto fulfillment hub.', 'thread-and-form' ); ?></p>
        </div>
        <div class="tf-value-card">
            <h3><?php esc_html_e( '100% Plastic-Free', 'thread-and-form' ); ?></h3>
            <p><?php esc_html_e( 'Shipped in certified biodegradable kraft envelopes sealed with natural water-activated gummed paper tape.', 'thread-and-form' ); ?></p>
        </div>
        <div class="tf-value-card">
            <h3><?php esc_html_e( '30-Day Atelier Trial', 'thread-and-form' ); ?></h3>
            <p><?php esc_html_e( 'Take 30 days to live with the garment. If the fit or hand-feel is not ideal, exchange or return with pre-paid shipping.', 'thread-and-form' ); ?></p>
        </div>
        <div class="tf-value-card">
            <h3><?php esc_html_e( 'Lifetime Care Guarantee', 'thread-and-form' ); ?></h3>
            <p><?php esc_html_e( 'Complimentary seam reinforcement and spare corozo button service for all items crafted by our studio.', 'thread-and-form' ); ?></p>
        </div>
    </div>

    <div class="tf-content-body tf-reveal">
        <h2><?php esc_html_e( 'Policy Details & Transit Times', 'thread-and-form' ); ?></h2>

        <div class="tf-accordion-group">
            <div class="tf-accordion-item is-open">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'What are the expected delivery windows?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'European shipments arrive within 2–4 business days via DHL Express. North America and Asia-Pacific deliveries arrive within 4–6 business days with full real-time tracking.', 'thread-and-form' ); ?>
                </div>
            </div>

            <div class="tf-accordion-item">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'How do I initiate a return or exchange?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'Visit our concierge portal or email concierge@threadandform.studio with your order number. A pre-paid return shipping label and customs declaration will be instantly generated for you.', 'thread-and-form' ); ?>
                </div>
            </div>

            <div class="tf-accordion-item">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'Are customs duties and import taxes included?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'Yes. All prices displayed on our website include all local import duties, VAT, and tariffs. You will never be asked to pay unexpected fee balances upon doorstep delivery.', 'thread-and-form' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>