<?php
/**
 * Title: VIP Atelier Newsletter Invitation
 * Slug: thread-and-form/newsletter
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section class="tf-section">
    <div class="tf-shell">
        <div class="tf-newsletter-wrap tf-reveal">
            <div class="tf-newsletter-grid">
                <div class="tf-newsletter-info">
                    <span class="tf-pill-badge">
                        <span class="tf-badge-dot"></span>
                        <?php esc_html_e( 'Private Atelier Access', 'thread-and-form' ); ?>
                    </span>
                    <h3><?php esc_html_e( 'Join the Atelier Circle', 'thread-and-form' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'Subscribers receive early allocation on limited-edition capsule drops, invitations to private showroom events, and occasional essays from our studio cutters.', 'thread-and-form' ); ?>
                    </p>
                </div>

                <div class="tf-newsletter-action">
                    <form class="tf-newsletter-form" action="#" method="post">
                        <div class="tf-input-group">
                            <input type="email" placeholder="<?php esc_attr_e( 'Enter your email address...', 'thread-and-form' ); ?>" required aria-label="<?php esc_attr_e( 'Email address', 'thread-and-form' ); ?>">
                            <button type="submit" class="tf-btn tf-btn-primary" style="padding:0.75rem 1.75rem;">
                                <span><?php esc_html_e( 'Join Atelier', 'thread-and-form' ); ?></span>
                            </button>
                        </div>
                        <p class="tf-newsletter-disclaimer">
                            <?php esc_html_e( 'We dispatch once monthly. Zero synthetic spam. Unsubscribe at any time.', 'thread-and-form' ); ?>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
