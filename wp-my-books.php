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
  $page_includes = array( 
    'book-list', 'add-new', 'book-edit', 'add-author', 'remove-author', 
    'add-student', 'remove-student', 'course-tracker', 'frontendpage' );
  $current_page = $_GET['page'];
  if( empty($current_page) ){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    // echo $actual_link; die;
    if( preg_match( '/my_book/', $actual_link ) ){
      $current_page = 'frontendpage'; // must be equal to $page_includes slug value
    }
  }

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



//==================== Activation: Auto Generate Table ====================
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

  // User Role Registration
  add_role( 'wp_book_user_key', 'My Book User', array( 'read' => true ) );

  // Dynamic page creation - Listing of created books
  // Create post object - wp_posts: ID = option_value
  $my_post = array(
    'post_title'    => 'Book Page', // title
    'post_content'  => '[book_page]', // shortcode
    'post_status'   => 'publish',
    'post_type'     => 'page',
    'post_name'     => 'my_book' // slug
  );
  
  // Insert the post into the database - wp_options: option_name, option_value = ID
  $book_id = wp_insert_post( $my_post );
  add_option( 'my_book_page_id', $book_id );
  
}
register_activation_hook( __FILE__, 'my_book_generates_table_script' );



// ==================== Shortcode: for book_page ====================
function my_book_page_functions(){
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/my_books_frontend_lists.php';
}
add_shortcode( 'book_page', 'my_book_page_functions' );


//==================== Deactivation: Auto Drop Table ====================
function drop_table_plugin_books(){
  global $wpdb;
  $wpdb->query("DROP TABLE IF EXISTS " . my_book_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_authors_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_students_table() );
  $wpdb->query("DROP TABLE IF EXISTS " . my_enroll_table() );

  // check if user_role exists, then remove user_role
  if( get_role('wp_book_user_key') ){
    remove_role( 'wp_book_user_key' );
  }

  // Delete wp_posts & wp_options
  if( !empty( get_option( 'my_book_page_id' ) ) ){
    wp_delete_post( get_option( 'my_book_page_id' ), true );
    delete_option( 'my_book_page_id' );
  }
}
register_deactivation_hook( __FILE__, 'drop_table_plugin_books' ); // register_uninstall_hook();



//==================== AJAX Requests Handler for Adding Book ====================
add_action( 'wp_ajax_mybooklibrary', 'my_book_ajax_handler' );
function my_book_ajax_handler(){
  global $wpdb;
  include_once MY_BOOK_PLUGIN_DIR_PATH.'/library/my_booklibrary.php';
  wp_die();
}



//==================== Template Layouts ====================
add_filter( 'page_template', 'owt_custom_page_layout' );
function owt_custom_page_layout($page_template){
  global $post;
  $page_slug = $post->post_name; // book page slug
  if( $page_slug == 'my_book' ){
    include_once MY_BOOK_PLUGIN_DIR_PATH.'/views/frontend-books-template.php';
  }
  return $page_template;
}



//==================== Getting Details from Another Table using linked IDs ====================
function get_author_details($author_id){
  global $wpdb;
  $author_details = $wpdb->get_row(
      $wpdb->prepare(
        "SELECT * FROM ".my_authors_table()." WHERE id = %d", $author_id
      ), ARRAY_A
  );
  return $author_details;
}



//==================== User Role Filter ====================
function owt_login_user_role_filter($redirect_to, $request, $user){
  global $user;
  if( isset($user->roles) && is_array($user->roles) ){
    if( in_array('wp_book_user_key', $user->roles) ){
      return $redirect_to = site_url().'/my_book';
    } else{
      return $redirect_to;
    }
  }
}
add_filter( 'login_redirect', 'owt_login_user_role_filter',10,3 );

function owt_logout_user_role_filter(){
  wp_redirect(site_url().'/my_book');
  exit();
}
add_filter( 'wp_logout', 'owt_logout_user_role_filter' );



?>