<?php
/**
 * Thread & Form — Modern Luxury SEO Architecture
 *
 * Provides:
 * - Dynamic, editorial document titles and meta descriptions
 * - Contextual canonical URLs and smart robots directives
 * - Rich Open Graph (Facebook, Pinterest, LinkedIn) and Twitter Cards
 * - Comprehensive Schema.org JSON-LD Structured Data:
 *     - WebSite with SearchAction
 *     - ClothingStore & Brand Knowledge Graph (Porto atelier details)
 *     - BreadcrumbList navigation hierarchy
 *     - BlogPosting / Article schema for journal entries
 * - Core Web Vitals LCP Hero Image Preload
 * - Native compatibility guard: automatically yields if third-party SEO plugins are active
 *
 * @package ThreadAndForm
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Detect if a dedicated third-party SEO plugin is handling metadata.
 * If true, our theme yields meta tag generation to prevent duplicate tags.
 *
 * @return bool
 */
function tf_seo_has_third_party_plugin() {
    return defined( 'WPSEO_VERSION' )                   // Yoast SEO
        || class_exists( 'RankMath' )                   // Rank Math
        || defined( 'AIOSEO_VERSION' )                  // All in One SEO
        || defined( 'SEOPRESS_VERSION' )                // SEOPress
        || defined( 'THE_SEO_FRAMEWORK_VERSION' );       // The SEO Framework
}

/**
 * Filter the document title separator to an elegant luxury em-dash.
 *
 * @param string $sep Default separator.
 * @return string
 */
function tf_seo_document_title_separator( $sep ) {
    return '—';
}
add_filter( 'document_title_separator', 'tf_seo_document_title_separator' );

/**
 * Refine the document title parts for clean, editorial presentation.
 *
 * @param array $title_parts Array of title parts (title, page, tagline, site).
 * @return array
 */
function tf_seo_document_title_parts( $title_parts ) {
    if ( is_front_page() ) {
        $title_parts['title']   = 'Thread & Form';
        $title_parts['tagline'] = 'Architectural Tailoring & Fine Woolens';
        unset( $title_parts['site'] );
    } elseif ( is_home() ) {
        $title_parts['title'] = __( 'Journal', 'thread-and-form' );
        $title_parts['site']  = 'Thread & Form';
    } else {
        $title_parts['site'] = 'Thread & Form';
    }

    // Decode any raw HTML entities like &amp; in title components
    foreach ( $title_parts as $key => $val ) {
        if ( is_string( $val ) ) {
            $title_parts[ $key ] = html_entity_decode( $val, ENT_QUOTES, 'UTF-8' );
        }
    }

    return $title_parts;
}
add_filter( 'document_title_parts', 'tf_seo_document_title_parts' );

/**
 * Compute the canonical URL for the current queried object.
 *
 * @return string
 */
function tf_seo_get_canonical_url() {
    global $wp;

    if ( is_front_page() ) {
        return home_url( '/' );
    }

    if ( is_home() ) {
        $posts_page_id = get_option( 'page_for_posts' );
        return $posts_page_id ? get_permalink( $posts_page_id ) : home_url( '/journal/' );
    }

    if ( is_singular() ) {
        $canonical = get_permalink();
        $page = get_query_var( 'page' );
        if ( $page > 1 ) {
            $canonical = trailingslashit( $canonical ) . user_trailingslashit( $page, 'single_paged' );
        }
        return $canonical;
    }

    if ( is_category() || is_tag() || is_tax() ) {
        $term = get_queried_object();
        $link = get_term_link( $term );
        return is_wp_error( $link ) ? home_url( '/' ) : $link;
    }

    if ( is_post_type_archive() ) {
        $post_type = get_query_var( 'post_type' );
        if ( is_array( $post_type ) ) {
            $post_type = reset( $post_type );
        }
        $link = get_post_type_archive_link( $post_type );
        return $link ?: home_url( '/' );
    }

    if ( is_author() ) {
        $author_id = get_queried_object_id();
        return get_author_posts_url( $author_id );
    }

    if ( is_search() ) {
        return get_search_link();
    }

    return home_url( add_query_arg( array(), $wp->request ? '/' . $wp->request . '/' : '/' ) );
}

/**
 * Get an editorial, SEO-optimized description tailored to the current context.
 *
 * @return string
 */
function tf_seo_get_description() {
    if ( is_front_page() ) {
        return __( 'Thread & Form crafts structured silhouettes, unhurried tailoring, and purposeful garments. Cut from regenerative Portuguese wool and Italian linen in Porto.', 'thread-and-form' );
    }

    if ( is_singular() ) {
        $post = get_queried_object();
        if ( ! empty( $post->post_excerpt ) ) {
            return wp_strip_all_tags( $post->post_excerpt );
        }

        // Curated fallbacks for core store pages if custom excerpt is unset
        $slug_fallbacks = array(
            'collection'       => __( 'Explore the Thread & Form permanent collection. Minimalist outerwear, structured trousers, and elevated shirting crafted for longevity.', 'thread-and-form' ),
            'about'            => __( 'The philosophy of Thread & Form: deliberate fabrication, local European milling, and architectural silhouettes built to outlast seasons.', 'thread-and-form' ),
            'journal'          => __( 'Notes on material origin, uniform dressing, and garment longevity from the Thread & Form studio.', 'thread-and-form' ),
            'contact'          => __( 'Get in touch with the Thread & Form atelier in Porto. Client care, custom sizing inquiries, and studio appointments.', 'thread-and-form' ),
            'size-guide'       => __( 'Comprehensive sizing and garment measurement guide for Thread & Form silhouettes and tailored proportions.', 'thread-and-form' ),
            'shipping-returns' => __( 'Global complimentary shipping, carbon-neutral delivery, and our 30-day effortless return and exchange policy.', 'thread-and-form' ),
        );

        if ( isset( $post->post_name ) && isset( $slug_fallbacks[ $post->post_name ] ) ) {
            return $slug_fallbacks[ $post->post_name ];
        }

        if ( ! empty( $post->post_content ) ) {
            $clean_text = strip_shortcodes( $post->post_content );
            // Strip Gutenberg block HTML comments and tags
            $clean_text = preg_replace( '/<!--(.|\s)*?-->/', '', $clean_text );
            $clean_text = wp_strip_all_tags( $clean_text );
            $clean_text = preg_replace( '/\s+/', ' ', trim( $clean_text ) );

            if ( mb_strlen( $clean_text ) > 155 ) {
                $sub = mb_substr( $clean_text, 0, 155 );
                $last_space = mb_strrpos( $sub, ' ' );
                if ( false !== $last_space ) {
                    $sub = mb_substr( $sub, 0, $last_space );
                }
                return $sub . '…';
            } elseif ( ! empty( $clean_text ) ) {
                return $clean_text;
            }
        }
    }

    if ( is_category() || is_tag() || is_tax() ) {
        $desc = term_description();
        if ( ! empty( $desc ) ) {
            return wp_strip_all_tags( $desc );
        }
        $term = get_queried_object();
        return sprintf( __( 'Explore %s articles and garments by Thread & Form.', 'thread-and-form' ), $term->name );
    }

    if ( is_search() ) {
        return sprintf( __( 'Search results for "%s" at Thread & Form.', 'thread-and-form' ), get_search_query() );
    }

    return __( 'Thread & Form — A considered wardrobe of architectural tailoring and fine natural textiles.', 'thread-and-form' );
}

/**
 * Retrieve primary visual image metadata for Open Graph and Twitter Card shares.
 *
 * @return array
 */
function tf_seo_get_image_data() {
    $default_image = get_theme_file_uri( 'assets/images/campaign-original-wide.png' );
    $data = array(
        'url'    => $default_image,
        'width'  => 1536,
        'height' => 1024,
        'alt'    => __( 'Thread & Form Autumn Winter Collection Atelier Lookbook', 'thread-and-form' ),
    );

    if ( is_singular() && has_post_thumbnail() ) {
        $thumb_id  = get_post_thumbnail_id();
        $thumb_src = wp_get_attachment_image_src( $thumb_id, 'large' );
        if ( ! empty( $thumb_src[0] ) ) {
            $data['url']    = $thumb_src[0];
            $data['width']  = $thumb_src[1];
            $data['height'] = $thumb_src[2];
            $alt            = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
            if ( ! empty( $alt ) ) {
                $data['alt'] = $alt;
            } else {
                $data['alt'] = get_the_title();
            }
        }
    }

    return $data;
}

/**
 * Preload Hero LCP image on the Front Page for lightning-fast Core Web Vitals.
 */
function tf_seo_preload_lcp() {
    if ( is_front_page() ) {
        $hero_src = get_theme_file_uri( 'assets/images/campaign.png' );
        echo '<link rel="preload" as="image" href="' . esc_url( $hero_src ) . '" fetchpriority="high" />' . "\n";
    }
}
add_action( 'wp_head', 'tf_seo_preload_lcp', 2 );

/**
 * Output comprehensive meta tags: description, robots, Open Graph, and Twitter Cards.
 */
function tf_seo_output_meta_tags() {
    if ( tf_seo_has_third_party_plugin() ) {
        return;
    }

    $canonical   = tf_seo_get_canonical_url();
    $description = tf_seo_get_description();
    $image_data  = tf_seo_get_image_data();
    $site_name   = 'Thread & Form';
    $og_type     = is_single() ? 'article' : 'website';
    $locale      = get_locale();

    // Contextual Page Title for Social Sharing
    if ( is_front_page() ) {
        $social_title = 'Thread & Form — Architectural Tailoring & Fine Woolens';
    } elseif ( is_singular() ) {
        $social_title = get_the_title() . ' — ' . $site_name;
    } elseif ( is_home() ) {
        $social_title = __( 'Journal', 'thread-and-form' ) . ' — ' . $site_name;
    } elseif ( is_category() || is_tag() || is_tax() ) {
        $social_title = single_term_title( '', false ) . ' — ' . $site_name;
    } elseif ( is_search() ) {
        $social_title = sprintf( __( 'Search: %s', 'thread-and-form' ), get_search_query() ) . ' — ' . $site_name;
    } else {
        $social_title = wp_get_document_title();
    }
    $social_title = html_entity_decode( $social_title, ENT_QUOTES, 'UTF-8' );

    // Meta Robots Directives
    if ( is_search() || is_404() ) {
        $robots = 'noindex, follow';
    } else {
        $robots = 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    }
    ?>
<!-- Thread & Form SEO Engine -->
<meta name="description" content="<?php echo esc_attr( $description ); ?>" />
<meta name="robots" content="<?php echo esc_attr( $robots ); ?>" />
<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>" />

<!-- Open Graph / Facebook / WhatsApp / LinkedIn -->
<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>" />
<meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>" />
<meta property="og:title" content="<?php echo esc_attr( $social_title ); ?>" />
<meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />
<meta property="og:url" content="<?php echo esc_url( $canonical ); ?>" />
<meta property="og:locale" content="<?php echo esc_attr( $locale ); ?>" />
<meta property="og:image" content="<?php echo esc_url( $image_data['url'] ); ?>" />
<meta property="og:image:secure_url" content="<?php echo esc_url( $image_data['url'] ); ?>" />
<meta property="og:image:width" content="<?php echo esc_attr( $image_data['width'] ); ?>" />
<meta property="og:image:height" content="<?php echo esc_attr( $image_data['height'] ); ?>" />
<meta property="og:image:alt" content="<?php echo esc_attr( $image_data['alt'] ); ?>" />

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php echo esc_attr( $social_title ); ?>" />
<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>" />
<meta name="twitter:image" content="<?php echo esc_url( $image_data['url'] ); ?>" />
<meta name="twitter:image:alt" content="<?php echo esc_attr( $image_data['alt'] ); ?>" />
<?php if ( is_single() ) : ?>
<meta property="article:published_time" content="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" />
<meta property="article:modified_time" content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>" />
<?php endif; ?>
<!-- End Thread & Form SEO Engine -->
<?php
}
add_action( 'wp_head', 'tf_seo_output_meta_tags', 1 );

/**
 * Output Schema.org JSON-LD Structured Data Graph.
 *
 * Includes:
 * 1. ClothingStore & Brand Knowledge Graph (Organization)
 * 2. WebSite Graph with Sitelinks SearchAction
 * 3. BreadcrumbList Graph (for inner pages & journal posts)
 * 4. BlogPosting Graph (for journal articles)
 */
function tf_seo_output_structured_data() {
    if ( tf_seo_has_third_party_plugin() ) {
        return;
    }

    $site_url      = home_url( '/' );
    $canonical_url = tf_seo_get_canonical_url();
    $org_id        = $site_url . '#organization';
    $site_id       = $site_url . '#website';
    $image_data    = tf_seo_get_image_data();

    $graph = array();

    // 1. Organization & Brand: Luxury Clothing Atelier Graph
    $organization = array(
        '@type'              => array( 'ClothingStore', 'Brand' ),
        '@id'                => $org_id,
        'name'               => 'Thread & Form',
        'legalName'          => 'Thread & Form Atelier Lda',
        'url'                => $site_url,
        'logo'               => array(
            '@type'   => 'ImageObject',
            '@id'     => $site_url . '#logo',
            'url'     => $image_data['url'],
            'caption' => 'Thread & Form',
        ),
        'image'              => $image_data['url'],
        'description'        => 'Thread & Form is a luxury design atelier based in Porto, creating architectural tailoring, considered uniforms, and garments from fine Portuguese and Italian textiles.',
        'priceRange'         => '$$$',
        'currenciesAccepted' => 'EUR, USD, GBP',
        'paymentAccepted'    => 'Credit Card, Apple Pay, Google Pay, Klarna',
        'address'            => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Rua de Miguel Bombarda 284',
            'addressLocality' => 'Porto',
            'postalCode'      => '4050-377',
            'addressCountry'  => 'PT',
        ),
        'contactPoint'       => array(
            '@type'             => 'ContactPoint',
            'contactType'       => 'concierge',
            'email'             => 'concierge@threadandform.com',
            'availableLanguage' => array( 'English', 'Portuguese', 'French' ),
        ),
    );
    $graph[] = $organization;

    // 2. WebSite Graph with SearchAction
    $website = array(
        '@type'           => 'WebSite',
        '@id'             => $site_id,
        'url'             => $site_url,
        'name'            => 'Thread & Form',
        'description'     => 'A considered wardrobe. Made for the everyday.',
        'publisher'       => array( '@id' => $org_id ),
        'inLanguage'      => get_locale(),
        'potentialAction' => array(
            '@type'       => 'SearchAction',
            'target'      => array(
                '@type'       => 'EntryPoint',
                'urlTemplate' => $site_url . '?s={search_term_string}',
            ),
            'query-input' => 'required name=search_term_string',
        ),
    );
    $graph[] = $website;

    // 3. BreadcrumbList Graph (for all pages except front page)
    if ( ! is_front_page() ) {
        $breadcrumbs = array(
            '@type'           => 'BreadcrumbList',
            '@id'             => $canonical_url . '#breadcrumb',
            'itemListElement' => array(
                array(
                    '@type'    => 'ListItem',
                    'position' => 1,
                    'name'     => __( 'Home', 'thread-and-form' ),
                    'item'     => $site_url,
                ),
            ),
        );

        $position = 2;

        if ( is_singular( 'post' ) ) {
            // Include Journal parent breadcrumb
            $journal_page = get_page_by_path( 'journal' );
            $journal_url  = $journal_page ? get_permalink( $journal_page->ID ) : home_url( '/journal/' );
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position++,
                'name'     => __( 'Journal', 'thread-and-form' ),
                'item'     => $journal_url,
            );
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => get_the_title(),
                'item'     => $canonical_url,
            );
        } elseif ( is_page() ) {
            $post = get_queried_object();
            if ( $post && $post->post_parent ) {
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                foreach ( $ancestors as $ancestor_id ) {
                    $breadcrumbs['itemListElement'][] = array(
                        '@type'    => 'ListItem',
                        'position' => $position++,
                        'name'     => get_the_title( $ancestor_id ),
                        'item'     => get_permalink( $ancestor_id ),
                    );
                }
            }
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => get_the_title(),
                'item'     => $canonical_url,
            );
        } elseif ( is_category() || is_tag() || is_tax() ) {
            $term = get_queried_object();
            $breadcrumbs['itemListElement'][] = array(
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => $term->name,
                'item'     => $canonical_url,
            );
        }

        $graph[] = $breadcrumbs;
    }

    // 4. BlogPosting / Article Graph for Single Journal Entries
    if ( is_singular( 'post' ) ) {
        $post    = get_queried_object();
        $article = array(
            '@type'            => 'BlogPosting',
            '@id'              => $canonical_url . '#article',
            'isPartOf'         => array( '@id' => $site_id ),
            'headline'         => get_the_title(),
            'description'      => tf_seo_get_description(),
            'datePublished'    => get_the_date( 'c' ),
            'dateModified'     => get_the_modified_date( 'c' ),
            'mainEntityOfPage' => $canonical_url,
            'inLanguage'       => get_locale(),
            'author'           => array(
                '@type' => 'Person',
                'name'  => 'Thread & Form Studio',
            ),
            'publisher'        => array( '@id' => $org_id ),
            'image'            => array(
                '@type'  => 'ImageObject',
                'url'    => $image_data['url'],
                'width'  => $image_data['width'],
                'height' => $image_data['height'],
            ),
        );
        $graph[] = $article;
    }

    $structured_data = array(
        '@context' => 'https://schema.org',
        '@graph'   => $graph,
    );

    $json = wp_json_encode( $structured_data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
    if ( $json ) {
        echo "\n" . '<script type="application/ld+json" class="tf-schema-graph">' . "\n";
        echo $json . "\n";
        echo '</script>' . "\n";
    }
}
add_action( 'wp_head', 'tf_seo_output_structured_data', 10 );
