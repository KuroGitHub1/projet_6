<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ),'1.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
//ajout compteur
function compteur_quantite_shortcode() {
    ob_start();
    session_start(); // Démarrez une session (si ce n'est pas déjà fait)
    if (!isset($_SESSION['quantity'])) {
        $_SESSION['quantity'] = 0;
    }

    if (isset($_POST['increment'])) {
        $_SESSION['quantity']++;
    } elseif (isset($_POST['decrement']) && $_SESSION['quantity'] > 0) {
        $_SESSION['quantity']--;
    }
    ?>

    <form method="post" action="">
        <p><?php echo $_SESSION['quantity']; ?></p>
        <input type="submit" name="increment" value="+">
        <input type="submit" name="decrement" value="-">
    </form>

    <?php
    return ob_get_clean();
}
add_shortcode('compteur_quantite', 'compteur_quantite_shortcode');
// ajout support du logo
add_action('after_setup_theme','logo_support');
if ( !function_exists('logo_support')){
    function logo_support(){
        add_theme_support('custom-logo', array(
            
            'width' => 'thumbnail',
        ));
    }
}
