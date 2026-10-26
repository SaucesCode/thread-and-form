<?php
/** Explicit sample-page setup. Never runs on theme activation. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
function tf_setup_screen() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    ?>
    <div class="wrap"><h1>Thread &amp; Form — sample website setup</h1>
    <p>Create Home, Collection, About, Journal, Contact, Size Guide, and Shipping &amp; Returns. Existing pages with matching slugs are preserved. Home will become the front page. No products, orders or other themes are changed.</p>
    <p>All business details are fictional. Review page content before publishing a real store.</p>
    <?php if ( isset( $_GET['tf_created'] ) ) : ?><div class="notice notice-success"><p>Sample pages are ready. Open Pages to edit them.</p></div><?php endif; ?>
    <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
    <input type="hidden" name="action" value="tf_create_pages" />
    <?php wp_nonce_field( 'tf_create_pages' ); submit_button( 'Create sample pages' ); ?>
    </form></div>
    <?php
}
add_action( 'admin_menu', function () {
    add_theme_page( 'Thread & Form Setup', 'Thread & Form Setup', 'manage_options', 'tf-setup', 'tf_setup_screen' );
} );
add_action( 'admin_post_tf_create_pages', function () {
    if ( ! current_user_can( 'manage_options' ) ) { wp_die( 'Permission denied.', '', array( 'response' => 403 ) ); }
    check_admin_referer( 'tf_create_pages' );
    $pages = array( 'home' => array( 'Home', '' ), 'collection' => array( 'Collection', 'collection' ), 'about' => array( 'Our story', 'about-page' ), 'journal' => array( 'Journal', 'journal' ), 'contact' => array( 'Contact', 'contact-page' ), 'size-guide' => array( 'Size guide', 'size-guide-page' ), 'shipping-returns' => array( 'Shipping & returns', 'shipping-returns-page' ) );
    foreach ( $pages as $slug => $data ) {
        $existing = get_page_by_path( $slug, OBJECT, 'page' );
        $id = $existing ? $existing->ID : 0;
        if ( ! $id ) {
            $content = '';
            if ( $data[1] ) { ob_start(); include get_theme_file_path( 'patterns/' . $data[1] . '.php' ); $content = ob_get_clean(); }
            $id = wp_insert_post( array( 'post_type' => 'page', 'post_status' => 'publish', 'post_title' => $data[0], 'post_name' => $slug, 'post_content' => $content ), true );
            if ( is_wp_error( $id ) ) { wp_die( esc_html( $id->get_error_message() ) ); }
        }
        if ( 'home' === $slug ) { update_option( 'show_on_front', 'page' ); update_option( 'page_on_front', $id ); }
    }
    flush_rewrite_rules();
    wp_safe_redirect( admin_url( 'themes.php?page=tf-setup&tf_created=1' ) ); exit;
} );
// Patterns are expanded after the normal content shortcode pass in block templates.
add_filter( 'render_block_core/shortcode', function ( $content ) {
    return shortcode_exists( 'products' ) && false !== strpos( $content, '[products ' ) ? do_shortcode( $content ) : $content;
} );
