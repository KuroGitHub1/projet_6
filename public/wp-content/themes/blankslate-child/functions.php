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

function admin_load_assets(){
    wp_enqueue_script("module_image", trailingslashit( get_stylesheet_directory_uri() )."assets/js/module_image.js", array(), "1.0");
}

add_action( 'admin_enqueue_scripts', 'admin_load_assets', 10 );

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
                $image_url=get_post_meta($post->ID, "form_image_{$i}", true);
                $product_name=get_post_meta($post->ID, "product_name_{$i}", true);
                $bloc_image=<<<EOD
                <div class="bloc_image">
                    <div class="nom_img">
                        <input type="text" placeholder="titre de l'image $i" name="product_name_$i" value="$product_name"/>
                    </div>
                    <div class="zone_img">
                        <input id="form_image_$i" type="hidden" name="form_image_$i" value="$image_url"/>
                        <input class="img_upload" img-id="$i" type="button" value="ajouter une image"/>
                        <img class="form_img" id="form_img_$i" src="$image_url">  
                    </div>
                </div>
                EOD;
                echo($bloc_image);
            }
       echo('</div>');
    }

    // Fonction pour enregistrer les champs d'image et de textes
function enregistrer_champs_image($post_id) {

    $title = get_the_title($post_id);

    if ($title === 'Commander') {

        for ($i = 1; $i <= 4; $i++) {

            // Enregistrement des nouvelles métadonnées des champs images (urls)
            $image_field_name = "form_image_{$i}";
            $form_image_url = sanitize_text_field($_POST[$image_field_name]);
            update_post_meta($post_id, $image_field_name, $form_image_url);

            // Enregistrement des nouvelles métadonnées des champs de texte (noms des produits)
            $image_title_field_name = "product_name_{$i}";
            $form_image_title = sanitize_text_field($_POST[$image_title_field_name]);
            update_post_meta($post_id, $image_title_field_name, $form_image_title);

        }
    }
}

add_action('save_post', 'enregistrer_champs_image');

add_filter( 'wpcf7_form_elements', 'do_shortcode' );
add_filter('wpcf7_autop_or_not', '__return_false');


function afficher_nom_produit($args){
    $id_product=$args["id"];
    $product_name=get_post_meta(get_the_ID(),"product_name_{$id_product}", true);
    return $product_name;
}

add_shortcode("nom_du_produit","afficher_nom_produit");

function afficher_img_produit($args){
    $id_product=$args["id"];
    $form_image=get_post_meta(get_the_ID(),"form_image_{$id_product}", true);
    return $form_image;
}

add_shortcode("img_du_produit","afficher_img_produit");