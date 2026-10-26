/**
 * Thread & Form — Fluid Motion & High-End Flagship Interactions
 * Choreographs the morphing mobile drawer, slide-out bag drawer, hotspot pins,
 * currency switcher, quick view modal, and spring scroll reveals.
 */

(function () {
    'use strict';

    // 1. SCROLL REVEAL OBSERVER
    function initScrollReveals() {
        const revealElements = document.querySelectorAll('.tf-reveal, .tf-reveal-fade, .tf-reveal-scale');
        
        if (!('IntersectionObserver' in window)) {
            revealElements.forEach(el => el.classList.add('is-revealed'));
            return;
        }

        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-revealed');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -15px 0px',
            threshold: 0.05
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }

    // 2. STICKY HEADER & SCROLL BEHAVIOR
    function initStickyHeader() {
        const header = document.querySelector('.tf-header-wrapper');
        const headerPart = document.querySelector('header.wp-block-template-part');
        const backToTop = document.querySelector('.tf-back-to-top');

        function handleScroll() {
            const currentScrollY = window.scrollY;
            const isScrolled = currentScrollY > 30;

            if (header) {
                header.classList.toggle('is-scrolled', isScrolled);
            }
            if (headerPart) {
                headerPart.classList.toggle('is-scrolled', isScrolled);
            }
            if (document.body) {
                document.body.classList.toggle('has-scrolled', isScrolled);
            }

            if (backToTop) {
                if (currentScrollY > 440) {
                    backToTop.classList.add('is-visible');
                } else {
                    backToTop.classList.remove('is-visible');
                }
            }
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();

        if (backToTop) {
            backToTop.addEventListener('click', (e) => {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    }

    // 3. MORPHING HAMBURGER & FULL-SCREEN MOBILE DRAWER
    function initMobileDrawer() {
        const burgerBtn = document.querySelector('.tf-burger-btn');
        const drawer = document.querySelector('.tf-mobile-drawer');
        const closeBtn = document.querySelector('.tf-mobile-drawer-close');

        if (!burgerBtn || !drawer) return;

        function openDrawer() {
            burgerBtn.classList.add('is-active');
            burgerBtn.setAttribute('aria-expanded', 'true');
            drawer.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeDrawer() {
            burgerBtn.classList.remove('is-active');
            burgerBtn.setAttribute('aria-expanded', 'false');
            drawer.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        burgerBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (drawer.classList.contains('is-open')) {
                closeDrawer();
            } else {
                openDrawer();
            }
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeDrawer);
        }

        // Close on escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
                closeDrawer();
            }
        });

        // Close drawer when a nav link is clicked
        drawer.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', closeDrawer);
        });
    }

    // 4. SLIDE-OUT SHOPPING BAG / CART DRAWER
    function initBagDrawer() {
        const drawerOverlay = document.querySelector('.tf-bag-drawer-overlay');
        const bagTriggers = document.querySelectorAll('.tf-bag-drawer-trigger');
        const closeBtn = document.querySelector('.tf-bag-close-btn');

        if (!drawerOverlay) return;

        function openBag() {
            drawerOverlay.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeBag() {
            drawerOverlay.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        bagTriggers.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                openBag();
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeBag);
        }

        drawerOverlay.addEventListener('click', function (e) {
            if (e.target === drawerOverlay) closeBag();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && drawerOverlay.classList.contains('is-open')) {
                closeBag();
            }
        });

        // Quantity Stepper & Price Calculation
        const qtyMinus = drawerOverlay.querySelector('.tf-qty-minus');
        const qtyPlus = drawerOverlay.querySelector('.tf-qty-plus');
        const qtyVal = drawerOverlay.querySelector('.tf-qty-val');
        const subtotalEl = drawerOverlay.querySelector('.tf-bag-subtotal-val');
        const totalEl = drawerOverlay.querySelector('.tf-bag-total-val');
        const headerCountEl = document.querySelector('.tf-bag-count');
        const drawerCountEl = drawerOverlay.querySelector('.tf-bag-count-val');
        const itemPriceEl = drawerOverlay.querySelector('.tf-bag-item-price');
        const itemRow = drawerOverlay.querySelector('.tf-bag-item');
        const removeBtn = drawerOverlay.querySelector('.tf-bag-item-remove');
        const trackerText = drawerOverlay.querySelector('.tf-tracker-text');
        const trackerFill = drawerOverlay.querySelector('.tf-tracker-fill');

        const unitPrice = 185;

        function updateCart(qty) {
            if (qtyVal) qtyVal.textContent = qty;
            if (headerCountEl) {
                headerCountEl.textContent = qty;
                headerCountEl.classList.remove('bump');
                void headerCountEl.offsetWidth;
                headerCountEl.classList.add('bump');
            }
            if (drawerCountEl) drawerCountEl.textContent = qty;

            const total = qty * unitPrice;
            const formatted = '$' + total.toFixed(2);

            if (itemPriceEl) itemPriceEl.textContent = formatted;
            if (subtotalEl) subtotalEl.textContent = formatted;
            if (totalEl) totalEl.textContent = formatted;

            // Free shipping threshold = $150
            if (total >= 150) {
                if (trackerText) trackerText.textContent = 'You have unlocked Complimentary Express Shipping!';
                if (trackerFill) trackerFill.style.width = '100%';
            } else if (total > 0) {
                const diff = (150 - total).toFixed(2);
                if (trackerText) trackerText.textContent = `Add $${diff} more for Complimentary Express Shipping!`;
                if (trackerFill) trackerFill.style.width = `${Math.min(100, (total / 150) * 100)}%`;
            } else {
                if (trackerText) trackerText.textContent = 'Your bag is empty.';
                if (trackerFill) trackerFill.style.width = '0%';
            }
        }

        if (qtyPlus) {
            qtyPlus.addEventListener('click', function () {
                let current = parseInt(qtyVal?.textContent || '1', 10);
                updateCart(current + 1);
            });
        }

        if (qtyMinus) {
            qtyMinus.addEventListener('click', function () {
                let current = parseInt(qtyVal?.textContent || '1', 10);
                if (current > 1) {
                    updateCart(current - 1);
                }
            });
        }

        if (removeBtn && itemRow) {
            removeBtn.addEventListener('click', function () {
                itemRow.style.opacity = '0';
                itemRow.style.transform = 'translateX(20px)';
                setTimeout(() => {
                    itemRow.style.display = 'none';
                    updateCart(0);
                    showToast('Item removed from wardrobe bag');
                }, 300);
            });
        }

        // Checkout Button Click
        const checkoutBtn = drawerOverlay.querySelector('.tf-btn-checkout');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function () {
                this.classList.add('is-loading');
                showToast('Proceeding to secure checkout...');
                setTimeout(() => {
                    this.classList.remove('is-loading');
                }, 1000);
            });
        }

        window._openBagDrawer = openBag;
    }

    // 5. PRODUCT COLLECTION FILTERS
    function initCollectionFilters() {
        const filterBtns = document.querySelectorAll('.tf-filter-pill');
        const products = document.querySelectorAll('.tf-product-card');

        if (!filterBtns.length || !products.length) return;

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const targetCategory = this.getAttribute('data-filter');

                filterBtns.forEach(b => b.classList.remove('is-active'));
                this.classList.add('is-active');

                products.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (targetCategory === 'all' || cardCategory === targetCategory) {
                        card.style.display = 'flex';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0) scale(1)';
                        }, 20);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(12px) scale(0.96)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 240);
                    }
                });
            });
        });
    }

    // 8. TOAST NOTIFICATION SYSTEM
    function showToast(message) {
        let toast = document.querySelector('.tf-toast');
        if (!toast) {
            toast = document.createElement('div');
            toast.className = 'tf-toast';
            document.body.appendChild(toast);
        }

        toast.textContent = message;
        toast.classList.add('is-active');

        clearTimeout(toast._timeout);
        toast._timeout = setTimeout(() => {
            toast.classList.remove('is-active');
        }, 3000);
    }

    // 9. QUICK VIEW MODAL & ADD TO BAG INTEGRATION
    function initQuickView() {
        const modal = document.querySelector('.tf-modal-overlay');
        if (!modal) return;

        const modalClose = modal.querySelector('.tf-modal-close');
        const modalImg = modal.querySelector('.tf-modal-img');
        const modalTitle = modal.querySelector('.tf-modal-title');
        const modalPrice = modal.querySelector('.tf-modal-price');
        const modalDesc = modal.querySelector('.tf-modal-desc');
        const modalCategory = modal.querySelector('.tf-modal-tag');
        const addToBagBtn = modal.querySelector('.tf-modal-add-btn');
        const sizePills = modal.querySelectorAll('.tf-size-pill');

        function openModal(data) {
            if (modalImg) modalImg.src = data.img || '';
            if (modalTitle) modalTitle.textContent = data.title || '';
            if (modalPrice) modalPrice.textContent = data.price || '';
            if (modalDesc) modalDesc.textContent = data.desc || '';
            if (modalCategory) modalCategory.textContent = data.category || 'Atelier Essential';

            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.remove('is-open');
            document.body.style.overflow = '';
        }

        document.addEventListener('click', function (e) {
            const trigger = e.target.closest('.tf-quick-view-trigger');
            if (trigger) {
                e.preventDefault();

                // Check if triggered from a card
                const card = trigger.closest('.tf-product-card');
                if (card) {
                    const data = {
                        title: card.querySelector('.tf-product-title')?.textContent.trim() || '',
                        price: card.querySelector('.tf-product-price')?.textContent.trim() || '',
                        desc: card.getAttribute('data-desc') || '',
                        category: card.getAttribute('data-category-label') || 'Everyday Rotation',
                        img: card.querySelector('img')?.getAttribute('src') || ''
                    };
                    openModal(data);
                    return;
                }

                // Check if triggered from hero look item row
                const lookRow = trigger.closest('.tf-look-item-row');
                if (lookRow) {
                    const title = lookRow.querySelector('.tf-look-item-title')?.textContent.trim() || '';
                    const prodKey = trigger.getAttribute('data-product');
                    const imgUrl = prodKey === 'trouser' ? 
                        document.querySelector('.tf-product-card[data-category="trousers"] img')?.getAttribute('src') :
                        document.querySelector('.tf-product-card[data-category="overshirt"] img')?.getAttribute('src');
                    const price = prodKey === 'trouser' ? '$165.00' : '$185.00';
                    const category = prodKey === 'trouser' ? 'Normandy Flax Linen' : '320 GSM Organic Twill';

                    openModal({
                        title: title,
                        price: price,
                        category: category,
                        desc: 'Tailored from certified organic fibers in our Porto atelier. Engineered with generous proportions for effortless daily rotation.',
                        img: imgUrl || ''
                    });
                    return;
                }
            }
        });

        if (modalClose) modalClose.addEventListener('click', closeModal);
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal.classList.contains('is-open')) {
                closeModal();
            }
        });

        sizePills.forEach(pill => {
            pill.addEventListener('click', function () {
                sizePills.forEach(p => p.classList.remove('is-selected'));
                this.classList.add('is-selected');
            });
        });

        if (addToBagBtn) {
            addToBagBtn.addEventListener('click', function () {
                const originalText = this.querySelector('.tf-btn-text')?.textContent;
                if (this.querySelector('.tf-btn-text')) {
                    this.querySelector('.tf-btn-text').textContent = 'Added to Bag ✓';
                }

                showToast('Item successfully added to your wardrobe bag.');

                setTimeout(() => {
                    if (this.querySelector('.tf-btn-text') && originalText) {
                        this.querySelector('.tf-btn-text').textContent = originalText;
                    }
                    closeModal();

                    // Open the slide-out bag drawer automatically
                    if (window._openBagDrawer) {
                        setTimeout(() => window._openBagDrawer(), 250);
                    }
                }, 750);
            });
        }
    }

    // 10. WISHLIST TOGGLE INTERACTION
    function initWishlistButtons() {
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.tf-wishlist-toggle, .tf-header-wishlist-trigger');
            if (!btn) return;

            e.preventDefault();

            if (btn.classList.contains('tf-header-wishlist-trigger')) {
                showToast('Wishlist: 1 item saved');
                return;
            }

            const isLiked = btn.classList.toggle('is-liked');
            const svg = btn.querySelector('svg');
            
            if (svg) {
                svg.style.transform = 'scale(1.35)';
                setTimeout(() => {
                    svg.style.transform = 'scale(1)';
                }, 220);
            }

            showToast(isLiked ? 'Saved to your studio wishlist' : 'Removed from wishlist');
        });
    }

    // 11. NEWSLETTER FORM
    function initNewsletter() {
        const form = document.querySelector('.tf-newsletter-form');
        if (!form) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const input = this.querySelector('input[type="email"]');
            const submitBtn = this.querySelector('button[type="submit"]');

            if (!input || !input.value.trim()) return;

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Enrolling...';
            }

            setTimeout(() => {
                form.innerHTML = `
                    <div class="tf-newsletter-success">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"/></svg>
                        <h4>Welcome to the Atelier</h4>
                        <p>Thank you for subscribing. We've sent a private welcome note to <strong>${input.value}</strong>.</p>
                    </div>
                `;
                showToast('Welcome to the Thread & Form Atelier.');
            }, 750);
        });
    }

    // 12. ACCORDION DETAILS (Size guide, Care, Shipping)
    function initAccordions() {
        const accordionTriggers = document.querySelectorAll('.tf-accordion-trigger');
        accordionTriggers.forEach(trigger => {
            trigger.addEventListener('click', function () {
                const item = this.closest('.tf-accordion-item');
                if (!item) return;

                const isOpen = item.classList.contains('is-open');
                const parent = item.closest('.tf-accordion-group');
                if (parent) {
                    parent.querySelectorAll('.tf-accordion-item').forEach(i => i.classList.remove('is-open'));
                }

                if (!isOpen) {
                    item.classList.add('is-open');
                }
            });
        });
    }

    // 13. COLOR SWATCHES
    function initColorSwatches() {
        document.addEventListener('click', function (e) {
            const swatch = e.target.closest('.tf-swatch');
            if (!swatch) return;

            const card = swatch.closest('.tf-product-card');
            if (!card) return;

            card.querySelectorAll('.tf-swatch').forEach(s => s.classList.remove('is-active'));
            swatch.classList.add('is-active');
            const colorName = swatch.getAttribute('data-color');
            if (colorName) showToast(`Selected shade: ${colorName}`);
        });
    }

    // INITIALIZE ALL ON DOM READY OR IMMEDIATE IF ALREADY LOADED
    function init() {
        initScrollReveals();
        initStickyHeader();
        initMobileDrawer();
        initBagDrawer();
        initCollectionFilters();
        initWishlistButtons();
        initQuickView();
        initNewsletter();
        initAccordions();
        initColorSwatches();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
