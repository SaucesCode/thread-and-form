<?php
/**
 * Title: Brand Footer, Slide-Out Bag Drawer & Modal
 * Slug: thread-and-form/footer
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<footer class="tf-footer">
    <div class="tf-shell">
        <div class="tf-footer-grid">
            <!-- Brand Column -->
            <div class="tf-footer-brand">
                <h2><?php bloginfo( 'name' ); ?></h2>
                <p>
                    <?php esc_html_e( 'An independent clothing label engineered around architectural cuts, certified organic European textiles, and trans-seasonal longevity.', 'thread-and-form' ); ?>
                </p>
                <div class="tf-footer-socials">
                    <a href="#" class="tf-social-icon" aria-label="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    </a>
                    <a href="#" class="tf-social-icon" aria-label="Pinterest">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C6.48 2 2 6.48 2 12c0 4.24 2.65 7.86 6.39 9.29-.09-.78-.17-1.98.04-2.83.19-.77 1.25-5.3 1.25-5.3s-.32-.64-.32-1.58c0-1.48.86-2.59 1.93-2.59.91 0 1.35.68 1.35 1.5 0 .91-.58 2.28-.88 3.55-.25 1.06.53 1.93 1.57 1.93 1.89 0 3.35-1.99 3.35-4.86 0-2.54-1.83-4.32-4.44-4.32-3.03 0-4.8 2.27-4.8 4.61 0 .91.35 1.89.79 2.42.09.11.1.2.07.31-.08.33-.26 1.06-.3 1.2-.05.2-.16.25-.37.15-1.39-.64-2.26-2.66-2.26-4.28 0-3.49 2.54-6.7 7.33-6.7 3.85 0 6.84 2.74 6.84 6.41 0 3.82-2.41 6.9-5.75 6.9-1.12 0-2.18-.58-2.54-1.27l-.69 2.63c-.25.96-.93 2.16-1.39 2.9A10.03 10.03 0 0 0 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2z"/></svg>
                    </a>
                    <a href="#" class="tf-social-icon" aria-label="LinkedIn">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                    </a>
                </div>
            </div>

            <!-- Navigation Column -->
            <div class="tf-footer-col">
                <h3><?php esc_html_e( 'Wardrobe', 'thread-and-form' ); ?></h3>
                <ul class="tf-footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'All Pieces', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'Overshirts', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'Essential Tees', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'Relaxed Trousers', 'thread-and-form' ); ?></a></li>
                </ul>
            </div>

            <!-- Studio Column -->
            <div class="tf-footer-col">
                <h3><?php esc_html_e( 'Studio', 'thread-and-form' ); ?></h3>
                <ul class="tf-footer-links">
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Our Story', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>"><?php esc_html_e( 'Studio Journal', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/size-guide/' ) ); ?>"><?php esc_html_e( 'Size Guide', 'thread-and-form' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/shipping-returns/' ) ); ?>"><?php esc_html_e( 'Shipping & Returns', 'thread-and-form' ); ?></a></li>
                </ul>
            </div>

            <!-- Concierge Column -->
            <div class="tf-footer-col">
                <h3><?php esc_html_e( 'Concierge', 'thread-and-form' ); ?></h3>
                <div class="tf-footer-hours">
                    <p><strong><?php esc_html_e( 'Showroom & Studio:', 'thread-and-form' ); ?></strong><br>48 Calle de la Paz, Studio 4B, Porto</p>
                    <p><strong><?php esc_html_e( 'Hours:', 'thread-and-form' ); ?></strong><br>Tuesday — Saturday, 10am – 6pm</p>
                    <p><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color:#d1d5db;text-decoration:underline;"><?php esc_html_e( 'Book an Atelier Fitting →', 'thread-and-form' ); ?></a></p>
                </div>
            </div>
        </div>

        <div class="tf-footer-bottom">
            <p><?php printf( esc_html__( '© %d Thread & Form Studio. All rights reserved. Designed for mindful living.', 'thread-and-form' ), esc_html( date( 'Y' ) ) ); ?></p>
            <div class="tf-footer-badges">
                <span><?php esc_html_e( '100% Carbon Neutral Shipping', 'thread-and-form' ); ?></span>
                <span>•</span>
                <span><?php esc_html_e( 'Zero Plastic', 'thread-and-form' ); ?></span>
                <span>•</span>
                <span><?php esc_html_e( 'GOTS Certified Organic', 'thread-and-form' ); ?></span>
            </div>
        </div>
    </div>
</footer>

<!-- Slide-Out Shopping Bag / Cart Drawer -->
<div class="tf-bag-drawer-overlay" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Shopping Bag', 'thread-and-form' ); ?>">
    <div class="tf-bag-drawer">
        <!-- Drawer Header -->
        <div class="tf-bag-header">
            <div class="tf-bag-header-title">
                <h3><?php esc_html_e( 'Your Wardrobe Bag', 'thread-and-form' ); ?></h3>
                <span class="tf-bag-header-count">(<span class="tf-bag-count-val">1</span>)</span>
            </div>
            <button type="button" class="tf-bag-close-btn" aria-label="<?php esc_attr_e( 'Close bag', 'thread-and-form' ); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <!-- Free Shipping Progress Tracker -->
        <div class="tf-free-shipping-tracker">
            <div class="tf-tracker-label">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                <span class="tf-tracker-text"><?php esc_html_e( 'You have unlocked Complimentary Express Shipping!', 'thread-and-form' ); ?></span>
            </div>
            <div class="tf-tracker-bar">
                <div class="tf-tracker-fill" style="width: 100%;"></div>
            </div>
        </div>

        <!-- Bag Item List -->
        <div class="tf-bag-items">
            <div class="tf-bag-item" data-price="185">
                <div class="tf-bag-item-img">
                    <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/overshirt.png' ) ); ?>" alt="Everyday Overshirt">
                </div>
                <div class="tf-bag-item-details">
                    <div class="tf-bag-item-header">
                        <h4><?php esc_html_e( 'The Everyday Overshirt', 'thread-and-form' ); ?></h4>
                        <button type="button" class="tf-bag-item-remove" aria-label="<?php esc_attr_e( 'Remove item', 'thread-and-form' ); ?>">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                        </button>
                    </div>
                    <span class="tf-bag-item-variant"><?php esc_html_e( 'Deep Navy / Size M', 'thread-and-form' ); ?></span>
                    
                    <div class="tf-bag-item-footer">
                        <div class="tf-qty-stepper">
                            <button type="button" class="tf-qty-btn tf-qty-minus">−</button>
                            <span class="tf-qty-val">1</span>
                            <button type="button" class="tf-qty-btn tf-qty-plus">+</button>
                        </div>
                        <span class="tf-bag-item-price">$185.00</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bag Summary & Checkout -->
        <div class="tf-bag-footer">
            <div class="tf-bag-summary-row">
                <span><?php esc_html_e( 'Subtotal', 'thread-and-form' ); ?></span>
                <span class="tf-bag-subtotal-val">$185.00</span>
            </div>
            <div class="tf-bag-summary-row">
                <span><?php esc_html_e( 'Carbon-Neutral Shipping', 'thread-and-form' ); ?></span>
                <span style="color:#16a34a;font-weight:600;"><?php esc_html_e( 'Free ($0.00)', 'thread-and-form' ); ?></span>
            </div>

            <div class="tf-bag-summary-total">
                <span><?php esc_html_e( 'Estimated Total', 'thread-and-form' ); ?></span>
                <span class="tf-bag-total-val">$185.00</span>
            </div>

            <button type="button" class="tf-btn tf-btn-primary tf-btn-checkout group" style="width:100%;margin-top:1.25rem;">
                <span class="tf-btn-text"><?php esc_html_e( 'Proceed to Checkout', 'thread-and-form' ); ?></span>
                <span class="tf-btn-icon-wrap" aria-hidden="true">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </span>
            </button>

            <p class="tf-bag-guarantee">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                <span><?php esc_html_e( '30-day trial period • Complimentary return labels included', 'thread-and-form' ); ?></span>
            </p>
        </div>
    </div>
</div>

<!-- Quick View Modal Structure -->
<div class="tf-modal-overlay" role="dialog" aria-modal="true" aria-labelledby="tfModalTitle">
    <div class="tf-modal-box">
        <button type="button" class="tf-modal-close" aria-label="<?php esc_attr_e( 'Close dialog', 'thread-and-form' ); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>

        <div class="tf-modal-media">
            <img class="tf-modal-img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 750'%3E%3Crect width='600' height='750' fill='%23f2eee7'/%3E%3C/svg%3E" alt="<?php esc_attr_e( 'Garment preview', 'thread-and-form' ); ?>">
        </div>

        <div class="tf-modal-info">
            <span class="tf-modal-tag"></span>
            <h3 id="tfModalTitle" class="tf-modal-title"></h3>
            <div class="tf-modal-price"></div>
            <p class="tf-modal-desc"></p>

            <div class="tf-size-selector">
                <h5><?php esc_html_e( 'Select Size', 'thread-and-form' ); ?></h5>
                <div class="tf-size-pills">
                    <button type="button" class="tf-size-pill">XS</button>
                    <button type="button" class="tf-size-pill is-selected">S</button>
                    <button type="button" class="tf-size-pill">M</button>
                    <button type="button" class="tf-size-pill">L</button>
                    <button type="button" class="tf-size-pill">XL</button>
                </div>
            </div>

            <button type="button" class="tf-btn tf-btn-primary tf-modal-add-btn tf-btn-nested group">
                <span class="tf-btn-text"><?php esc_html_e( 'Add to Bag', 'thread-and-form' ); ?></span>
                <span class="tf-btn-icon-wrap" aria-hidden="true">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                </span>
            </button>
        </div>
    </div>
</div>

<!-- Floating Back to Top Button -->
<button type="button" class="tf-back-to-top" aria-label="<?php esc_attr_e( 'Scroll to top', 'thread-and-form' ); ?>">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
</button>
