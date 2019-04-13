<?php
/*
*
* Plugin Name: My Book
* Plugin URI: https://jsadang.wordpress.com/
* Description: THis is a comprehensive plugin that manage books.
* Author: Jack Henry Sadang
* Author URI: https://jsadang.wordpress.com/
* Version: 1.0.0
*
*
*/

if(!defined('ABSPATH')) 
  exit;
if(!defined('MY_BOOK_PLUGIN_DIR_PATH'))
  define( 'MY_BOOK_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
if(!defined('MY_BOOK_PLUGIN_URL'))
  define( 'MY_BOOK_PLUGIN_URL', plugins_url() . "/my-books" );


function my_book_include_assets(){
  // Styles
  wp_enqueue_style( 'bootstrap', MY_BOOK_PLUGIN_URL."/assets/css/bootstrap.min.css", '' );
  wp_enqueue_style( 'datatable', MY_BOOK_PLUGIN_URL."/assets/css/jquery.dataTables.min.css", '' );
  wp_enqueue_style( 'notifybar', MY_BOOK_PLUGIN_URL."/assets/css/jquery.notifyBar.min.css", '' );
  wp_enqueue_style( 'style', MY_BOOK_PLUGIN_URL."/assets/css/style.css", '' );
  // Scripts
  // wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap.min.js', MY_BOOK_PLUGIN_URL."/assets/js/bootstrap.min.js", '', true );
  wp_enqueue_script( 'validation.min.js', MY_BOOK_PLUGIN_URL."/assets/js/validation.min.js", '', true );
  wp_enqueue_script( 'jquery.dataTables.min.js', MY_BOOK_PLUGIN_URL."/assets/js/jquery.dataTables.min.js", '', true );
  wp_enqueue_script( 'jQuery.notifyBar.js', MY_BOOK_PLUGIN_URL."/assets/js/jQuery.notifyBar.js", '', true );
  wp_enqueue_script( 'script.js', MY_BOOK_PLUGIN_URL."/assets/js/script.js", '', true );
  wp_localize_script( 'script.js', 'mybookajaxurl', admin_url('admin-ajax.php') );
}
add_action( 'init', 'my_book_include_assets' );