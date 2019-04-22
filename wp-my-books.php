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
  $slug = '';
  $page_includes = array( 'book-list', 'add-new', 'book-edit', 'add-author', 'remove-author', 'add-student', 'remove-student', 'course-tracker' );
  $current_page = $_GET['page'];
  if( in_array( $current_page, $page_includes ) ){
    // Styles
    wp_enqueue_style( 'bootstrap', MY_BOOK_PLUGIN_URL."/assets/css/bootstrap.css", '' );
    wp_enqueue_style( 'datatable', MY_BOOK_PLUGIN_URL."/assets/css/jquery.dataTables.min.css", '' );
    wp_enqueue_style( 'notifybar', MY_BOOK_PLUGIN_URL."/assets/css/jquery.notifyBar.css", '' );
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
}
add_action( 'init', 'my_book_include_assets' );



//==================== Menu and Submenu ====================
function my_book_plugin_menus(){
  add_menu_page( 'My Book', 'My Book', 'manage_options', 'book-list', 'my_book_list', 'dashicons-book-alt', 30 );
  add_submenu_page( 'book-list', 'Book List', 'Book List', 'manage_options', 'book-list', 'my_book_list' );
  add_submenu_page( 'book-list', 'Add New', 'Add New', 'manage_options', 'add-new', 'my_book_add' );
  
  // my extended submenus
  add_submenu_page( 'book-list', 'Add New Author', 'Add New Author', 'manage_options', 'add-author', 'my_author_add' );
  add_submenu_page( 'book-list', 'Manage Author', 'Manage Author', 'manage_options', 'remove-author', 'my_author_remove' );
  add_submenu_page( 'book-list', 'Add New Student', 'Add New Student', 'manage_options', 'add-student', 'my_student_add' );
  add_submenu_page( 'book-list', 'Manage Student', 'Manage Student', 'manage_options', 'remove-student', 'my_student_remove' );
  add_submenu_page( 'book-list', 'Course Tracker', 'Course Tracker', 'manage_options', 'course-tracker', 'course_tracker' );
  // end my extended submenus

  add_submenu_page( 'book-list', '', '', 'manage_options', 'book-edit', 'my_book_edit' );
}
add_action( 'admin_menu', 'my_book_plugin_menus' );

function my_book_list(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-list.php';
}
function my_book_add(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-add.php';
}
// my extended submenus callback functions
function my_author_add(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/author-add.php';
}
function my_author_remove(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/manage-author.php';
}
function my_student_add(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/student-add.php';
}
function my_student_remove(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/manage-student.php';
}
function course_tracker(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/course-tracker.php';
}
// end my extended submenus callback functions
function my_book_edit(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/book-edit.php';
}



//==================== Auto Generate Table ====================
function my_book_table(){
  global $wpdb;
  return $wpdb->prefix.'my_books';  // wp_my_books
}
function my_authors_table(){
  global $wpdb;
  return $wpdb->prefix.'my_authors'; // wp_my_authors;
}
function my_students_table(){
  global $wpdb;
  return $wpdb->prefix.'my_students'; // wp_my_students;
}
function my_enroll_table(){
  global $wpdb;
  return $wpdb->prefix.'my_enroll'; // wp_my_enroll;
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

  $sql2 = "CREATE TABLE `". my_authors_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `fb_link` text NOT NULL,
    `about` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta( $sql2 );
  
  $sql3 = "CREATE TABLE `". my_students_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `user_login_id` int(11) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta( $sql3 );

  $sql4 = "CREATE TABLE `". my_enroll_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `student_id` int(11) NOT NULL,
    `book_id` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta( $sql4 );
  
}
register_activation_hook( __FILE__, 'my_book_generates_table_script' );



//==================== Auto Drop Table ====================
function drop_table_plugin_books(){
  global $wpdb;
  $wpdb->query("DROP TABLE IF EXISTS " . my_book_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_authors_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_students_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_enroll_table() );
}
register_deactivation_hook( __FILE__, 'drop_table_plugin_books' ); // register_uninstall_hook();



//==================== AJAX Requests Handler for Adding Book ====================
add_action( 'wp_ajax_mybooklibrary', 'my_book_ajax_handler' );
function my_book_ajax_handler(){
  global $wpdb;
  if( $_REQUEST['param'] == 'save_book' ){
    $wpdb->insert( my_book_table(), array(
      'name' => $_REQUEST['name'],
      'author' => $_REQUEST['author'],
      'about' => $_REQUEST['about'],
      'book_image' => $_REQUEST['image_name']
    ) );
    echo json_encode( array('status' => 1, 'message' => 'Book created successfully') );
  } elseif( $_REQUEST['param'] == 'edit_book' ){
    $wpdb->update( my_book_table(), array(
      'name' => $_REQUEST['name'],
      'author' => $_REQUEST['author'],
      'about' => $_REQUEST['about'],
      'book_image' => $_REQUEST['image_name']
    ), array(
      'id' => $_REQUEST['book_id']
    ) );
    echo json_encode( array('status' => 1, 'message' => 'Book updated successfully') );
  } elseif( $_REQUEST['param'] == 'delete_book' ){
      $wpdb->delete( my_book_table(), array(
        'id' => $_REQUEST['id']
      ) );
    echo json_encode( array('status' => 1, 'message' => 'Book deleted successfully') );
  } elseif( $_REQUEST['param'] == 'save_author' ){
    $wpdb->insert( my_authors_table(), array(
      'name' => $_REQUEST['name'],
      'fb_link' => $_REQUEST['fb_link'],
      'about' => $_REQUEST['about']
    ) );
    echo json_encode( array('status' => 1, 'message' => 'Book created successfully') );
  }
  wp_die();
}




?>