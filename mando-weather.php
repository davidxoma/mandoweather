<?php
/**
 * Plugin Name:       Mando Weather
 * Plugin URI:        #
 * Description:       Plugin provides worldwide weather information. You can place any country/region/city info into your website by just shortcode
 * Version:           1.0.0
 * Author:            David Xoma
 * Author URI:        https://facebook.com/davidxomasa
**/

//Register style
function get_mando_style(){
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ).'style/style.css' );
}
//register scripts
function get_mando_script(){
    wp_enqueue_script( 'script', plugin_dir_url( __FILE__ ).'script/script.js' );
}
function ismando_page($cpage){
    $page = $_GET["mandotab"];
    if ( $page == $cpage){
        return true;
    }else{
        return false;
    }
}
function ismando_active_page($cpage){
    $page = $_GET["mandotab"];
    if ( $page == $cpage){
        echo ' mando-active';
    }
}
//add options
add_option( 'mando-api-key', 'NULL', '', 'yes' );
//Display weather
function button_shortcode( $atts, $content = null ) {
    //set default attributes and values
    $values = shortcode_atts( array(
        'region'   	=> NULL,
        'city'	=> NULL,
        'country' => NULL
    ), $atts );
    //Gettingmain information from user submited shortcode to display propper information
    $country = $values['country'];
    $region = $values['region'];
    $city = $values['city'];
    

}
add_shortcode( 'button', 'button_shortcode' );
/**
 * Register menu item forplugin
 */
function register_mando_menu_item() {
    add_menu_page(
        __( 'Mando Weather Settings', 'textdomain' ),
        'Mando Weather ',
        'manage_options',
        'mando_settings',
        'mando_weather_settings',
        '',
        plugins_url( 'images/icon.png' ),
        6
    );
}
function mando_weather_settings(){

    include('mando-settings.php');

}
add_action( 'admin_menu', 'register_mando_menu_item' );