<?php
/**
 * Title: Brand Story & Studio Philosophy
 * Slug: thread-and-form/story
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<section id="about" class="tf-section tf-story-section">
    <div class="tf-shell">
        <div class="tf-story-grid">
            <!-- Left Editorial Text Content -->
            <div class="tf-story-content tf-reveal">
                <span class="tf-pill-badge">
                    <span class="tf-badge-dot"></span>
                    <?php esc_html_e( 'Our Studio Philosophy', 'thread-and-form' ); ?>
                </span>

                <h2 class="tf-story-title">
                    <?php esc_html_e( 'A wardrobe.', 'thread-and-form' ); ?><br>
                    <em><?php esc_html_e( 'Not a trend.', 'thread-and-form' ); ?></em>
                </h2>

                <blockquote class="tf-story-quote">
                    <?php esc_html_e( '“We believe the most sustainable garment is the one you wear for a decade without tiring of its proportion.”', 'thread-and-form' ); ?>
                </blockquote>

                <div class="tf-story-paragraphs">
                    <p>
                        <?php esc_html_e( 'Founded on the principles of architectural restraint, Thread & Form creates a smaller, more deliberate wardrobe. We reject rapid release cycles in favor of slow refinement—building garments that hold their shape from morning studio sessions to quiet evening dinners.', 'thread-and-form' ); ?>
                    </p>
                    <p>
                        <?php esc_html_e( 'Every seam is finished clean. Every button is carved from natural corozo nuts. Every textile is selected for how beautifully it softens with laundry and time.', 'thread-and-form' ); ?>
                    </p>
                </div>

                <!-- Three Pillar Stats -->
                <div class="tf-story-stats">
                    <div class="tf-stat-item">
                        <h4>100%</h4>
                        <p><?php esc_html_e( 'Organic European Fibers', 'thread-and-form' ); ?></p>
                    </div>
                    <div class="tf-stat-item">
                        <h4>0%</h4>
                        <p><?php esc_html_e( 'Synthetic Plastic Waste', 'thread-and-form' ); ?></p>
                    </div>
                    <div class="tf-stat-item">
                        <h4>10-Yr</h4>
                        <p><?php esc_html_e( 'Seam & Wear Guarantee', 'thread-and-form' ); ?></p>
                    </div>
                </div>
            </div>

            <!-- Right Story Visual Card with Seal -->
            <div class="tf-story-visual-wrap tf-reveal tf-delay-1">
                <div class="tf-story-visual-card">
                    <img 
                        src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campaign.png' ) ); ?>" 
                        alt="<?php esc_attr_e( 'Craftsmanship and quiet tailoring in the Thread and Form atelier', 'thread-and-form' ); ?>"
                        loading="lazy"
                        width="1024"
                        height="1024"
                    >
                </div>

                <div class="tf-story-seal">
                    <span class="tf-seal-title"><?php esc_html_e( 'Studio Atelier', 'thread-and-form' ); ?></span>
                    <span class="tf-seal-text"><?php esc_html_e( 'Independent Craft / Est. 2024', 'thread-and-form' ); ?></span>
                </div>
            </div>
        </div>
    </div>
</section>
