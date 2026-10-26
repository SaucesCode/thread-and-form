<?php
/**
 * Title: Latest Journal Stories
 * Slug: thread-and-form/journal
 * Categories: thread-and-form
 * Inserter: yes
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

$journal_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
) );
?>

<section id="journal" class="tf-section">
    <div class="tf-shell">
        <div class="tf-section-header tf-reveal">
            <div class="tf-section-title-wrap">
                <h2><?php esc_html_e( 'Studio Journal', 'thread-and-form' ); ?></h2>
                <p class="tf-section-subtitle"><?php esc_html_e( 'Notes on textile origin, personal uniform building, and slow living.', 'thread-and-form' ); ?></p>
            </div>

            <a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>" class="tf-btn tf-btn-secondary">
                <span><?php esc_html_e( 'All Journal Notes', 'thread-and-form' ); ?></span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>

        <div class="tf-journal-grid">
            <?php if ( $journal_query->have_posts() ) : $delay_index = 0; ?>
                <?php while ( $journal_query->have_posts() ) : $journal_query->the_post(); 
                    $delay_class = $delay_index > 0 ? ' tf-delay-' . $delay_index : '';
                    $delay_index++;
                    $excerpt = get_the_excerpt();
                    if ( empty( $excerpt ) ) {
                        $excerpt = wp_trim_words( get_the_content(), 18 );
                    }
                    $cats = get_the_category();
                    $cat_name = ! empty( $cats ) ? $cats[0]->name : __( 'Studio Note', 'thread-and-form' );
                ?>
                    <article class="tf-journal-card tf-reveal<?php echo esc_attr( $delay_class ); ?>">
                        <div class="tf-journal-media">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campaign.png' ) ); ?>" 
                                     alt="<?php the_title_attribute(); ?>" 
                                     loading="lazy">
                            <?php endif; ?>
                        </div>

                        <div class="tf-journal-body">
                            <div class="tf-journal-meta">
                                <span class="tf-journal-tag"><?php echo esc_html( $cat_name ); ?></span>
                                <span>•</span>
                                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></time>
                            </div>

                            <h3 class="tf-journal-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <div class="tf-journal-excerpt">
                                <p><?php echo esc_html( wp_strip_all_tags( $excerpt ) ); ?></p>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="tf-journal-link">
                                <span><?php esc_html_e( 'Read Note', 'thread-and-form' ); ?></span>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <!-- Fallback Curated Articles -->
                <article class="tf-journal-card tf-reveal">
                    <div class="tf-journal-media">
                        <img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/campaign.png' ) ); ?>" alt="Everyday layering" loading="lazy">
                    </div>
                    <div class="tf-journal-body">
                        <div class="tf-journal-meta">
                            <span class="tf-journal-tag"><?php esc_html_e( 'Textiles', 'thread-and-form' ); ?></span>
                            <span>•</span>
                            <span><?php esc_html_e( 'October 2026', 'thread-and-form' ); ?></span>
                        </div>
                        <h3 class="tf-journal-title">
                            <a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>"><?php esc_html_e( 'The Art of the Everyday Layer', 'thread-and-form' ); ?></a>
                        </h3>
                        <div class="tf-journal-excerpt">
                            <p><?php esc_html_e( 'Why building a capsule wardrobe around 3 core proportions transforms how effortlessly you get dressed each morning.', 'thread-and-form' ); ?></p>
                        </div>
                        <a href="<?php echo esc_url( home_url( '/journal/' ) ); ?>" class="tf-journal-link">
                            <span><?php esc_html_e( 'Read Note', 'thread-and-form' ); ?></span>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </a>
                    </div>
                </article>
            <?php endif; ?>
        </div>
    </div>
</section>
