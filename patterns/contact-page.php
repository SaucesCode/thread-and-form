<?php
/**
 * Title: Contact & Concierge Page
 * Slug: thread-and-form/contact-page
 * Categories: thread-and-form
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<div class="tf-shell tf-section">
    <div class="tf-page-header tf-reveal">
        <span class="tf-pill-badge">
            <span class="tf-badge-dot"></span>
            <?php esc_html_e( 'Atelier Concierge', 'thread-and-form' ); ?>
        </span>
        <h1 class="tf-page-title"><?php esc_html_e( 'Let’s Speak About Your Wardrobe.', 'thread-and-form' ); ?></h1>
        <p class="tf-page-lead">
            <?php esc_html_e( 'Questions regarding fit, fabric weights, private showroom visits, or garment care? Our studio team is at your disposal.', 'thread-and-form' ); ?>
        </p>
    </div>

    <div class="tf-newsletter-wrap tf-reveal" style="background:#ffffff;margin-bottom:4rem;">
        <div class="tf-newsletter-grid">
            <!-- Studio Information -->
            <div class="tf-newsletter-info">
                <h3><?php esc_html_e( 'Studio & Fittings', 'thread-and-form' ); ?></h3>
                <p>
                    <?php esc_html_e( 'We welcome private appointments to experience textile weights and test drape in person at our studio.', 'thread-and-form' ); ?>
                </p>

                <div style="margin-top:2rem;display:flex;flex-direction:column;gap:1.25rem;">
                    <div>
                        <strong style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.06em;color:var(--tf-accent);"><?php esc_html_e( 'Location', 'thread-and-form' ); ?></strong>
                        <p style="margin:4px 0 0;font-size:0.95rem;color:var(--tf-ink);">48 Calle de la Paz, Studio 4B<br>Manila / Porto</p>
                    </div>

                    <div>
                        <strong style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.06em;color:var(--tf-accent);"><?php esc_html_e( 'Direct Enquiries', 'thread-and-form' ); ?></strong>
                        <p style="margin:4px 0 0;font-size:0.95rem;color:var(--tf-ink);">concierge@threadandform.studio<br>+351 22 409 1842</p>
                    </div>

                    <div>
                        <strong style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.06em;color:var(--tf-accent);"><?php esc_html_e( 'Showroom Hours', 'thread-and-form' ); ?></strong>
                        <p style="margin:4px 0 0;font-size:0.95rem;color:var(--tf-ink);">Tuesday – Saturday, 10:00 AM – 6:00 PM</p>
                    </div>
                </div>
            </div>

            <!-- Interactive Inquiry Form -->
            <div class="tf-newsletter-action">
                <form class="tf-newsletter-form" action="#" method="post" onsubmit="event.preventDefault(); this.innerHTML='<div class=\'tf-newsletter-success\'><h4>Message Received</h4><p>Thank you for reaching out. A studio member will reply within 24 hours.</p></div>';">
                    <div style="display:flex;flex-direction:column;gap:1rem;">
                        <input type="text" placeholder="<?php esc_attr_e( 'Your Name', 'thread-and-form' ); ?>" required style="width:100%;padding:0.9rem 1.25rem;border:1px solid var(--tf-line);border-radius:var(--tf-radius-md);font:inherit;background:var(--tf-bg);">
                        <input type="email" placeholder="<?php esc_attr_e( 'Your Email Address', 'thread-and-form' ); ?>" required style="width:100%;padding:0.9rem 1.25rem;border:1px solid var(--tf-line);border-radius:var(--tf-radius-md);font:inherit;background:var(--tf-bg);">
                        <select style="width:100%;padding:0.9rem 1.25rem;border:1px solid var(--tf-line);border-radius:var(--tf-radius-md);font:inherit;background:var(--tf-bg);color:var(--tf-ink);">
                            <option value="fit"><?php esc_html_e( 'Sizing & Fit Advice', 'thread-and-form' ); ?></option>
                            <option value="appointment"><?php esc_html_e( 'Book Studio Appointment', 'thread-and-form' ); ?></option>
                            <option value="order"><?php esc_html_e( 'Order & Dispatch Query', 'thread-and-form' ); ?></option>
                            <option value="repair"><?php esc_html_e( 'Atelier Repair Request', 'thread-and-form' ); ?></option>
                        </select>
                        <textarea placeholder="<?php esc_attr_e( 'How may we assist you?', 'thread-and-form' ); ?>" rows="4" required style="width:100%;padding:0.9rem 1.25rem;border:1px solid var(--tf-line);border-radius:var(--tf-radius-md);font:inherit;background:var(--tf-bg);"></textarea>
                        
                        <button type="submit" class="tf-btn tf-btn-primary" style="width:100%;margin-top:0.5rem;">
                            <span><?php esc_html_e( 'Send Studio Enquiry', 'thread-and-form' ); ?></span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Frequent Inquiries Accordion -->
    <div class="tf-content-body tf-reveal">
        <h2 style="text-align:center;margin-bottom:0.5rem;"><?php esc_html_e( 'Frequently Asked Inquiries', 'thread-and-form' ); ?></h2>
        <p style="text-align:center;color:var(--tf-muted);margin-bottom:2rem;"><?php esc_html_e( 'Common questions regarding our clothing, fittings, and services.', 'thread-and-form' ); ?></p>

        <div class="tf-accordion-group">
            <div class="tf-accordion-item is-open">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'How do your relaxed unisex cuts fit?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'Our garments feature deliberate ease through the shoulders and torso. If you prefer our intended architectural silhouette, choose your regular standard size. If you desire a closer, traditional fit, we suggest sizing down one grade.', 'thread-and-form' ); ?>
                </div>
            </div>

            <div class="tf-accordion-item">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'Where are your garments manufactured?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'Every item is cut, assembled, and finished in a family-operated atelier located just outside Porto, Portugal. Our artisans receive fair living wages and work under verified ethical labor conditions.', 'thread-and-form' ); ?>
                </div>
            </div>

            <div class="tf-accordion-item">
                <button type="button" class="tf-accordion-trigger">
                    <span><?php esc_html_e( 'How does your lifetime repair guarantee work?', 'thread-and-form' ); ?></span>
                    <svg class="tf-accordion-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </button>
                <div class="tf-accordion-content">
                    <?php esc_html_e( 'If a seam separates, a button tears free, or wear develops from years of continuous service, send the piece to our studio. We will reinforce and recondition the garment free of labor charge.', 'thread-and-form' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>