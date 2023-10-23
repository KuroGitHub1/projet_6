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
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ),'1.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
add_action( 'admin_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION
// ajout support du logo
add_action('after_setup_theme','logo_support');
if ( !function_exists('logo_support')){
    function logo_support(){
        add_theme_support('custom-logo', array(
            
        ));
    }
}

// lien admin 
add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );

function add_admin_link( $items, $args ) {

    if (is_user_logged_in() && $args->theme_location == 'main-menu') {

        $items = '<li><a href="'. get_admin_url() .'">Admin</a></li>' .$items;

    }
    
    return $items;

}

add_action("add_meta_boxes","image_formulaire",10,2);

    function image_formulaire($post_type, $post){
        $titre = $post->post_title;
        if ($titre =="Commander"){
            add_meta_box(
                "champ_image",
                "champ image",
                "afficher_meta_image",
            );
        }
    }

    function afficher_meta_image($post){
       echo('<div class="bloc_images">');
            for($i=1; $i<=4; $i++){
                $bloc_image=<<<EOD
                <div class="bloc_image">
                    <div class="nom_img">
                        <input type="text" placeholder="titre de l'image $i" name="form_image_title_$i"/>
                    </div>
                    <div class="zone_img">
                        <input type="hidden" name="form_image_$i"/>
                        <input class="img_upload" type="button" value="ajouter une image"/>
                        <img src="">  
                    </div>
                </div>
                EOD;
                echo($bloc_image);
            }
       echo('</div>');
    }