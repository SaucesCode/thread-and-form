<?php
/**
 * Title: Brand Header & Mobile Drawer
 * Slug: thread-and-form/header
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<!-- Announcement Bar with Worldwide Shipping Meter -->
<div class="tf-announcement">
    <div class="tf-shell tf-announcement-inner">
        <p class="tf-announcement-msg">
            <span class="tf-tag-mini"><?php esc_html_e( 'AUTUMN / WINTER 26', 'thread-and-form' ); ?></span>
            <span class="tf-announcement-text">
                <span class="tf-announcement-full"><?php esc_html_e( 'Complimentary worldwide delivery on orders over $150 — Ethically crafted in Porto.', 'thread-and-form' ); ?></span>
                <span class="tf-announcement-short"><?php esc_html_e( 'Complimentary delivery over $150', 'thread-and-form' ); ?></span>
            </span>
        </p>
        <div class="tf-announcement-aux">
            <span class="tf-shipping-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                <?php esc_html_e( 'Carbon-Neutral Dispatch', 'thread-and-form' ); ?>
            </span>
        </div>
    </div>
</div>

<!-- Main Sticky Header Wrapper -->
<div class="tf-header-wrapper">
    <header class="tf-shell tf-header">
        <!-- Brand Logo with Architectural Monogram -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tf-brand-link" aria-label="<?php esc_attr_e( 'Thread and Form Homepage', 'thread-and-form' ); ?>">
            <span class="tf-brand-name"><?php bloginfo( 'name' ); ?></span>
            <span class="tf-brand-sub"><?php esc_html_e( 'Studio', 'thread-and-form' ); ?></span>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="tf-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'thread-and-form' ); ?>">
            <ul class="tf-nav-links">
                <li class="tf-nav-item"><a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>"><?php esc_html_e( 'Collection', 'thread-and-form' ); ?></a></li>
                <li class="tf-nav-item"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Our Story', 'thread-and-form' ); ?></a></li>
                <li class="tf-nav-item"><a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>"><?php esc_html_e( 'Journal', 'thread-and-form' ); ?></a></li>
                <li class="tf-nav-item"><a href="<?php echo esc_url( home_url( '/size-guide/' ) ); ?>"><?php esc_html_e( 'Size Guide', 'thread-and-form' ); ?></a></li>
                <li class="tf-nav-item"><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'thread-and-form' ); ?></a></li>
            </ul>
        </nav>

        <!-- Header Actions: Search, Wishlist, Bag, Mobile Hamburger -->
        <div class="tf-header-actions">

            <!-- Search Quick Button -->
            <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>" class="tf-icon-btn tf-header-search-btn" aria-label="<?php esc_attr_e( 'Search Collection', 'thread-and-form' ); ?>">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </a>

            <!-- Wishlist Button -->
            <button type="button" class="tf-icon-btn tf-header-wishlist-trigger" aria-label="<?php esc_attr_e( 'View Wishlist', 'thread-and-form' ); ?>">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </button>

            <!-- Bag Slide-out Drawer Trigger -->
            <button type="button" class="tf-icon-btn tf-bag-drawer-trigger" aria-label="<?php esc_attr_e( 'Open Shopping Bag', 'thread-and-form' ); ?>">
                <svg width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <span class="tf-bag-count">1</span>
            </button>

            <!-- Morphing Hamburger Button for Mobile / Tablet -->
            <button type="button" class="tf-burger-btn" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'thread-and-form' ); ?>" aria-expanded="false">
                <span class="tf-burger-line tf-line-1"></span>
                <span class="tf-burger-line tf-line-2"></span>
            </button>
        </div>
    </header>
</div>

<!-- Full-Screen Mobile Glass Drawer -->
<div class="tf-mobile-drawer" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile Navigation Menu', 'thread-and-form' ); ?>">
    <div class="tf-mobile-drawer-inner">
        <div class="tf-mobile-drawer-header">
            <span class="tf-brand-name"><?php bloginfo( 'name' ); ?></span>
            <button type="button" class="tf-mobile-drawer-close" aria-label="<?php esc_attr_e( 'Close menu', 'thread-and-form' ); ?>">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>

        <nav class="tf-mobile-nav">
            <ul class="tf-mobile-nav-list">
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/collection/' ) ); ?>">
                        <span class="tf-mobile-nav-num">01</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'The Collection', 'thread-and-form' ); ?></span>
                    </a>
                </li>
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
                        <span class="tf-mobile-nav-num">02</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'Studio Philosophy', 'thread-and-form' ); ?></span>
                    </a>
                </li>
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>">
                        <span class="tf-mobile-nav-num">03</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'Studio Journal', 'thread-and-form' ); ?></span>
                    </a>
                </li>
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/size-guide/' ) ); ?>">
                        <span class="tf-mobile-nav-num">04</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'Size & Fit Guide', 'thread-and-form' ); ?></span>
                    </a>
                </li>
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/shipping-returns/' ) ); ?>">
                        <span class="tf-mobile-nav-num">05</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'Logistics & Returns', 'thread-and-form' ); ?></span>
                    </a>
                </li>
                <li class="tf-mobile-nav-item">
                    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
                        <span class="tf-mobile-nav-num">06</span>
                        <span class="tf-mobile-nav-title"><?php esc_html_e( 'Concierge & Fitting', 'thread-and-form' ); ?></span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="tf-mobile-drawer-footer">
            <div class="tf-mobile-studio-info">
                <span class="tf-mobile-footer-label"><?php esc_html_e( 'Porto Atelier & Showroom', 'thread-and-form' ); ?></span>
                <p>48 Calle de la Paz, Studio 4B<br>concierge@threadandform.studio</p>
            </div>
        </div>
    </div>
</div>
