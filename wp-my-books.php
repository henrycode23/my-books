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



//==================== Constants ====================
if(!defined('ABSPATH')) 
  exit;
if(!defined('MY_BOOK_PLUGIN_DIR_PATH'))
  define( 'MY_BOOK_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
if(!defined('MY_BOOK_PLUGIN_URL'))
  define( 'MY_BOOK_PLUGIN_URL', plugins_url() . "/my-books" );



//==================== Assets ====================
function my_book_include_assets(){
  // Styles
  wp_enqueue_style( 'bootstrap', MY_BOOK_PLUGIN_URL."/assets/css/bootstrap.min.css", '' );
  wp_enqueue_style( 'datatable', MY_BOOK_PLUGIN_URL."/assets/css/jquery.dataTables.min.css", '' );
  wp_enqueue_style( 'notifybar', MY_BOOK_PLUGIN_URL."/assets/css/jquery.notifyBar.min.css", '' );
  wp_enqueue_style( 'style', MY_BOOK_PLUGIN_URL."/assets/css/style.css", '' );
  // Scripts
  // wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap.min.js', MY_BOOK_PLUGIN_URL."/assets/js/bootstrap.min.js", '', true );
  wp_enqueue_script( 'validation.min.js', MY_BOOK_PLUGIN_URL."/assets/js/jquery.validate.min.js", '', true );
  wp_enqueue_script( 'jquery.dataTables.min.js', MY_BOOK_PLUGIN_URL."/assets/js/jquery.dataTables.min.js", '', true );
  wp_enqueue_script( 'jQuery.notifyBar.js', MY_BOOK_PLUGIN_URL."/assets/js/jQuery.notifyBar.js", '', true );
  wp_enqueue_script( 'script.js', MY_BOOK_PLUGIN_URL."/assets/js/script.js", '', true );
  wp_localize_script( 'script.js', 'mybookajaxurl', admin_url('admin-ajax.php') );
}
add_action( 'init', 'my_book_include_assets' );



//==================== Menu and Submenu ====================
function my_book_plugin_menus(){
  add_menu_page( 'My Book', 'My Book', 'manage_options', 'book-list', 'my_book_list', 'dashicons-book-alt', 30 );
  add_submenu_page( 'book-list', 'Book List', 'Book List', 'manage_options', 'book-list', 'my_book_list' );
  add_submenu_page( 'book-list', 'Add New', 'Add New', 'manage_options', 'add-new', 'my_book_add' );
  add_submenu_page( 'book-list', '', '', 'manage_options', 'book-edit', 'my_book_edit' );
}
add_action( 'admin_menu', 'my_book_plugin_menus' );

function my_book_list(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-list.php';
}
function my_book_add(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-add.php';
}
function my_book_edit(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-edit.php';
}



//==================== Auto Generate Table ====================
function my_book_table(){
  global $wpdb;
  return $wpdb->prefix.'my_books';  // wp_my_books
}

function my_book_generates_table_script(){
  global $wpdb;
  require_once ABSPATH.'wp-admin/includes/upgrade.php';

  $sql = "CREATE TABLE `" . my_book_table() . "` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `author` varchar(255) NOT NULL,
    `about` text NOT NULL,
    `book_image` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

  dbDelta( $sql );
}
register_activation_hook( __FILE__, 'my_book_generates_table_script' );



//==================== Auto Drop Table ====================
function drop_table_plugin_books(){
  global $wpdb;
  $wpdb->query("DROP TABLE IF EXISTS " . my_book_table() );
}
register_deactivation_hook( __FILE__, 'drop_table_plugin_books' ); // register_uninstall_hook();



?>